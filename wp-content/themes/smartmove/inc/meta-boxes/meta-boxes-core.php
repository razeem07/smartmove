<?php
/**
 * Shared framework for the theme's native custom meta boxes
 * (replaces Advanced Custom Fields).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Nonce + capability + autosave/revision guard for every save handler.
 */
function smartmove_verify_save( $post_id, $nonce_name, $nonce_action ) {
    if ( ! isset( $_POST[ $nonce_name ] ) || ! wp_verify_nonce( $_POST[ $nonce_name ], $nonce_action ) ) {
        return false;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return false;
    }
    if ( wp_is_post_revision( $post_id ) ) {
        return false;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return false;
    }
    return true;
}

/**
 * Field renderers. Each prints its own <p> wrapper with a label.
 */
function smartmove_field_text( $key, $label, $value ) {
    ?>
    <p class="smartmove-mb-field">
        <label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong></label><br>
        <input type="text" class="widefat" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>">
    </p>
    <?php
}

function smartmove_field_textarea( $key, $label, $value, $rows = 4 ) {
    ?>
    <p class="smartmove-mb-field">
        <label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong></label><br>
        <textarea class="widefat" rows="<?php echo esc_attr( $rows ); ?>" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
    </p>
    <?php
}

/**
 * Icon fields store a Font Awesome class string (e.g. "fa fa-life-ring"),
 * not an image. Show a live preview next to the input.
 */
function smartmove_field_icon( $key, $label, $value ) {
    ?>
    <p class="smartmove-mb-field smartmove-icon-field">
        <label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong> <span class="description">(Font Awesome class)</span></label><br>
        <span class="smartmove-icon-preview"><i class="<?php echo esc_attr( $value ); ?>"></i></span>
        <input type="text" class="smartmove-icon-input" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>" placeholder="fa fa-life-ring">
    </p>
    <?php
}

function smartmove_section_open( $title ) {
    ?>
    <details class="smartmove-mb-section" open>
        <summary><?php echo esc_html( $title ); ?></summary>
        <div class="smartmove-mb-section-body">
    <?php
}

function smartmove_section_close() {
    ?>
        </div>
    </details>
    <?php
}

function smartmove_subsection_open( $title ) {
    ?>
    <details class="smartmove-mb-subsection" open>
        <summary><?php echo esc_html( $title ); ?></summary>
        <div class="smartmove-mb-subsection-body">
    <?php
}

function smartmove_subsection_close() {
    ?>
        </div>
    </details>
    <?php
}

/**
 * Repeatable FAQ list (question/answer pairs) with add/remove rows via JS.
 * Stored as a single postmeta array: [ ['question'=>..., 'answer'=>...], ... ].
 */
function smartmove_render_faq_row( $meta_key, $question, $answer ) {
    ?>
    <div class="smartmove-faq-row">
        <p class="smartmove-mb-field">
            <label><strong>Question</strong></label><br>
            <input type="text" class="widefat" name="<?php echo esc_attr( $meta_key ); ?>_question[]" value="<?php echo esc_attr( $question ); ?>" placeholder="e.g. Is insurance included?">
        </p>
        <p class="smartmove-mb-field">
            <label><strong>Answer</strong></label><br>
            <textarea class="widefat" rows="3" name="<?php echo esc_attr( $meta_key ); ?>_answer[]" placeholder="Answer"><?php echo esc_textarea( $answer ); ?></textarea>
        </p>
        <button type="button" class="button smartmove-faq-remove">Remove FAQ</button>
        <hr>
    </div>
    <?php
}

function smartmove_field_faq_repeater( $meta_key, $faqs ) {
    if ( ! is_array( $faqs ) ) {
        $faqs = array();
    }
    ?>
    <div class="smartmove-faq-repeater" data-meta-key="<?php echo esc_attr( $meta_key ); ?>">
        <div class="smartmove-faq-rows">
            <?php foreach ( $faqs as $faq ) : ?>
                <?php smartmove_render_faq_row( $meta_key, isset( $faq['question'] ) ? $faq['question'] : '', isset( $faq['answer'] ) ? $faq['answer'] : '' ); ?>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-primary smartmove-faq-add">+ Add FAQ</button>
        <script type="text/template" class="smartmove-faq-row-template">
            <?php smartmove_render_faq_row( $meta_key, '', '' ); ?>
        </script>
    </div>
    <?php
}

function smartmove_save_faq_repeater( $post_id, $meta_key ) {
    $questions = isset( $_POST[ $meta_key . '_question' ] ) ? (array) $_POST[ $meta_key . '_question' ] : array();
    $answers   = isset( $_POST[ $meta_key . '_answer' ] ) ? (array) $_POST[ $meta_key . '_answer' ] : array();

    $faqs = array();
    foreach ( $questions as $i => $question ) {
        $question = sanitize_text_field( wp_unslash( $question ) );
        $answer   = isset( $answers[ $i ] ) ? sanitize_textarea_field( wp_unslash( $answers[ $i ] ) ) : '';
        if ( '' === $question && '' === $answer ) {
            continue;
        }
        $faqs[] = array( 'question' => $question, 'answer' => $answer );
    }

    update_post_meta( $post_id, $meta_key, $faqs );
}

/**
 * Only load wp.media + the meta box JS/CSS on the edit screens that
 * actually need them, not admin-wide.
 */
function smartmove_maybe_enqueue_metabox_assets( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }

    global $post;
    if ( ! $post ) {
        return;
    }

    $pages_with_metaboxes = array( 7, 178, 257, 276, 407 );
    $post_types_with_metaboxes = array( 'fleet', 'member', 'service' );

    $applies = ( 'page' === $post->post_type && in_array( $post->ID, $pages_with_metaboxes, true ) )
        || in_array( $post->post_type, $post_types_with_metaboxes, true );

    if ( ! $applies ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_style( 'smartmove-admin-meta-boxes', get_template_directory_uri() . '/assets/css/admin-meta-boxes.css', array(), '1.0' );
    wp_enqueue_script( 'smartmove-admin-meta-boxes', get_template_directory_uri() . '/assets/js/admin-meta-boxes.js', array( 'jquery' ), '1.0', true );

    if ( in_array( $post->post_type, array( 'fleet', 'service' ), true ) ) {
        wp_enqueue_script( 'smartmove-faq-repeater-admin', get_template_directory_uri() . '/assets/js/faq-repeater-admin.js', array( 'jquery' ), '1.0', true );
    }
}
add_action( 'admin_enqueue_scripts', 'smartmove_maybe_enqueue_metabox_assets' );

/**
 * Disable WordPress's generic "Custom Fields" panel everywhere the new
 * meta boxes replace it.
 */
function smartmove_remove_generic_custom_fields_box() {
    $post_types = array( 'page', 'fleet', 'testimonial', 'member', 'service', 'partner', 'brand' );
    foreach ( $post_types as $post_type ) {
        remove_post_type_support( $post_type, 'custom-fields' );
    }
}
add_action( 'init', 'smartmove_remove_generic_custom_fields_box', 20 );

require __DIR__ . '/meta-box-media-picker.php';
require __DIR__ . '/meta-box-homepage.php';
require __DIR__ . '/meta-box-aboutpage.php';
require __DIR__ . '/meta-box-fleetspage.php';
require __DIR__ . '/meta-box-servicespage.php';
require __DIR__ . '/meta-box-contactpage.php';
require __DIR__ . '/meta-box-fleet-cpt.php';
require __DIR__ . '/meta-box-member-cpt.php';
require __DIR__ . '/meta-box-service-cpt.php';
