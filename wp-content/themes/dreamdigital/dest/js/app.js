var $ = jQuery;
$(document).ready(function () {
    $('.faq .faq_item').click(function () {
        $(this).toggleClass('active')
        $(this).children('.post_content ').slideToggle(200)
        if ($(this).hasClass('active')) {
            $(this).children('.post_title').children('.mark').html('-')
        } else {
            $(this).children('.post_title').children('.mark').html('+')
        }
    })

    $('a[href^="#"').on('click', function () {
        let href = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(href).offset().top
        });
        return false;
    });

    $('.product_filter_cat').click(function (e) {
        e.preventDefault()
        $('.product_filter_cat').removeClass('active')
        $(this).addClass('active')
        var term = $(this).data('term-slug')
        $('.seo_g_t_products_item').each(function () {
            var prod_term = $(this).data('term-slug')
            if (term == 'all') {
                if (!$(this).hasClass('hide_prod')) {
                    $(this).fadeIn(200)
                } else {
                    $(this).fadeOut(0)
                }
            } else {
                if (prod_term != term) {
                    $(this).fadeOut(0)
                } else {
                    $(this).fadeIn(200)
                }
            }
        })
    })
});
