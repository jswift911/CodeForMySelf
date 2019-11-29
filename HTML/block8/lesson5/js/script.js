jQuery(function ($) {


    $('.container').append('<ul><li>Значение1</li><li>Значение2</li><li>Значение3</li></ul>');

    $('.container li').html(function (ind,oldVal) {
        if (ind % 2 == 0 ) {
            return oldVal.toUpperCase();
        }
    })

});