jQuery(function ($) {

    let arr = [];

    let li = $('li');
    li.each(function (idx, el) {

        arr.push($(el).text())

    });
    console.log(arr);
});

