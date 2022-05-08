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
});
