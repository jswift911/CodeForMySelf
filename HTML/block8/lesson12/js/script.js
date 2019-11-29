jQuery(function ($) {

    $('button').click(function (e) {
        e.preventDefault();

        $('.myForm').append('<span>Отправка</span>').fadeIn(1000, function () {

            //let result = 'name=' + $('input[name=name]').val() + 'text='+ $('input[name=text]').val();

            let result = $('.myForm').serializeArray();

            // $.ajaxSetup({
            //
            //     url: 'server.php',
            //     type: 'POST',
            //     dataType: 'json',
            //     context: document.getElementsByClassName('.myForm'),
            //
            //     beforeSend : function (JqHXR) {
            //
            //     },
            //
            //     cache: true,
            //     complete: function (JqHXR, status) {
            //         alert(status);
            //     },
            //
            //     contentType: 'application/x-www-form-urlencoded',
            //     processData: true,
            //     success: function (data, status, JqHXR) {
            //
            //         $(this).find('span').fadeOut(300, function () {
            //             $(this).text('Добавлено!').fadeIn(300);
            //         });
            //         $(this).delay(1000).fadeOut(1000, function () {
            //             $('.myForm').append('<h3>'+ date.name  +'</h3>' + '<p>'+ data.text +'</p>');
            //         });
            //     },
            //     error: function () {
            //         alert('ERROR');
            //     }
            //
            // });
            //
            //
            // $.ajax({
            //
            //     data: result,
            //
            // });

            let JqHXR = $.get('server.php', result, function () {

            }, 'json');

            JqHXR.done(function () {
                alert('done');
            });

            JqHXR.fail(function () {
                alert('fail');
            });

            JqHXR.always(function () {
                alert('always');
            });

            JqHXR.then(function () {
                alert('then');
            }, function () {
                alert('fail');
            });


        })
    })


});