jQuery(function ($) {

    let arr = [1,45,10,23,56];

    let arr2 = ['Раз','Два','Три'];

    console.log($.merge(arr,arr2));

    let a = [1,6,10,67,3,9,2,0,34,23,5];

    let newArr = $.map(a, function (el,idx) {
        if (idx % 2 == 0) {
            return el;
        }
    });

    console.log(newArr);
});

