jQuery(function ($) {

    let attrib = $('[name=btn]');
    console.log(attrib);

    let containerFirstDiv = $('.container div:first');
    console.log(containerFirstDiv);

    let containerLastDiv = $('.container div:last');
    console.log(containerLastDiv);

    let containerThirdDiv = $('.container div:eq(2)');
    console.log(containerThirdDiv);

    let a = $('.container div a:last-child:last');
    console.log(a);

    let empty = $('div:empty');
    console.log(empty);

});