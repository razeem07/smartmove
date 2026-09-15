jQuery(function ($) {
    'use strict';

    // Image picker (wp.media)
    $(document).on('click', '.smartmove-image-select', function (e) {
        e.preventDefault();
        var wrap = $(this).closest('.smartmove-image-field');
        var frame = wp.media({
            title: 'Select Image',
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            var previewUrl = (attachment.sizes && attachment.sizes.medium) ? attachment.sizes.medium.url : attachment.url;
            wrap.find('.smartmove-image-id').val(attachment.id);
            wrap.find('.smartmove-image-preview').attr('src', previewUrl).show();
            wrap.find('.smartmove-image-select').text('Change Image');
            wrap.find('.smartmove-image-remove').show();
        });
        frame.open();
    });

    $(document).on('click', '.smartmove-image-remove', function (e) {
        e.preventDefault();
        var wrap = $(this).closest('.smartmove-image-field');
        wrap.find('.smartmove-image-id').val('');
        wrap.find('.smartmove-image-preview').hide().attr('src', '');
        wrap.find('.smartmove-image-select').text('Select Image');
        $(this).hide();
    });

    // Live icon preview
    $(document).on('keyup', '.smartmove-icon-input', function () {
        var val = $(this).val();
        $(this).closest('.smartmove-icon-field').find('.smartmove-icon-preview i').attr('class', val);
    });
});
