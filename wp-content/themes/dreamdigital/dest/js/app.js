var $ = jQuery;
$(document).ready(function () {
    var featured_services_swiper = new Swiper(".featured_services_swiper", {
        slidesPerView         : 3,
        spaceBetween          : 30,
        loop                  : true,
        loopFillGroupWithBlank: true,
        navigation            : {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints           : {
            1110: {
                slidesPerView: 3,
            },
            768 : {
                slidesPerView: 2,
            },
            320 : {
                slidesPerView: 1,
                spaceBetween : 10,
            }
        }
    });

    var user_reviews_swiper = new Swiper(".user_reviews_swiper", {
        slidesPerView         : 3,
        spaceBetween          : 30,
        loop                  : true,
        loopFillGroupWithBlank: true,
        navigation            : {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints           : {
            1110: {
                slidesPerView: 3,
            },
            768 : {
                slidesPerView: 2,
            },
            320 : {
                slidesPerView: 1,
                spaceBetween : 10,
            }
        }
    });

    var user_reviews_swiper = new Swiper(".single_blog_related_swiper", {
        slidesPerView         : 3,
        spaceBetween          : 30,
        loop                  : true,
        loopFillGroupWithBlank: true,
        navigation            : {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints           : {
            1110: {
                slidesPerView: 3,
            },
            768 : {
                slidesPerView: 2,
            },
            320 : {
                slidesPerView: 1,
                spaceBetween : 10,
            }
        }
    });

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

    $('.book_demo_btn').click(function (e) {
        e.preventDefault()
        $('.book_demo').fadeIn(200)
    })
    $(document).mouseup(function (e) {
        var div = $(".b_a_d_wrap")
        if (!div.is(e.target) && div.has(e.target).length === 0) {
            $('.book_demo').fadeOut(200)
        }
    });
    $(document).on('keyup', function (e) {
        if (e.key == "Escape") {
            $('.book_demo').fadeOut(200)
        }
    });
    $('.hide_book_demo').click(function (e) {
        $('.book_demo').fadeOut(200)
    })

    $('.prod_btn_open').click(function (e) {
        e.preventDefault()
        var prod_id = $(this).data('prod-id'),
            data = {
                'action' : 'get_prod_info',
                'prod_id': prod_id
            };
        $.post(myAjax.ajaxurl, data, function (response) {
            $('.product_more_details').fadeIn(200).html(response)
        });
    })
    $(document).mouseup(function (e) {
        var div = $(".p_m_d_wrap")
        if (!div.is(e.target) && div.has(e.target).length === 0) {
            $('.product_more_details').fadeOut(200)
        }
    });
    $(document).on('keyup', function (e) {
        if (e.key == "Escape") {
            $('.product_more_details').fadeOut(200)
        }
    });
    document.addEventListener("DOMNodeInserted", function (event) {
        $('.hide_p_m_d').click(function (e) {
            $('.product_more_details').fadeOut(200)
        })
    }, false);

    $('#share_copy').click(function (e) {
        e.preventDefault()
        var dummy = document.createElement('input'),
            text = window.location.href;
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        $(this).css('opacity', '.4')
    })

    $('.header_menu_btn').click(function (e) {
        $(this).toggleClass('active')
        $('.header_menu_mob').toggleClass('active')
    })
});
