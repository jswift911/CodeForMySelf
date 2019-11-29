jQuery(function ($) {

    $('.container a').hover(
        () => {
            $('.container a').css({'border': '1px solid red'});
        },
        () => {
            $('.container a').css({'border': 'none'});
        });

    $('.container input[name=name]').keyup(function() {
        let email = $('.container input[name=email]');
        email.val($(this).val());
    });


    let inputs = $('.container input');

    if (inputs.val() == '') {
        $('.container button').click(function (e) {
            e.preventDefault();
        });
    } else {
        $('.container button').submit();
    }

});