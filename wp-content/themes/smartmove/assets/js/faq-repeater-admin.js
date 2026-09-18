jQuery(function ($) {
    'use strict';

    $(document).on('click', '.smartmove-faq-add', function (e) {
        e.preventDefault();
        var repeater = $(this).closest('.smartmove-faq-repeater');
        var template = repeater.find('.smartmove-faq-row-template').html();
        repeater.find('.smartmove-faq-rows').append(template);
    });

    $(document).on('click', '.smartmove-faq-remove', function (e) {
        e.preventDefault();
        $(this).closest('.smartmove-faq-row').remove();
    });
});
