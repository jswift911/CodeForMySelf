jQuery(function ($) {

 let btn = $('.container button');

 btn.on('click', function () {
     $('.container').append('<div class="removeDiv"></div>');
     $('.removeDiv').on('click', function () {
         $(this).remove();
     });
 });

});