jQuery(function ($) {

    let ul = $('ul');

    $.data(ul, 'data', 123);

    console.log($.data(ul, 'data'));

    let arr = [1,45,10,23,56];

    $.each(arr, function (ind, val) {
        console.log(val);
    });

});

