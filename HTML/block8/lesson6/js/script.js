jQuery(function ($) {

        $('h1').animate( { fontSize:"1.5em" } , 2000 );

        let block = $('.block');

        block.hide(1000).show(1000).queue(function () {
                $(this).css({'backgroundColor':'red'});
                $(this).dequeue();
        }).slideUp(1000);

});