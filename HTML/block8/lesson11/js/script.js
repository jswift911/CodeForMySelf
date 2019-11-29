jQuery(function ($) {

    $('button').click(function (e) {
        e.preventDefault();

        $('.myForm').append('<span>Отправка</span>').fadeIn(1000, function () {

            //let result = 'name=' + $('input[name=name]').val() + 'text='+ $('input[name=text]').val();

            let result = $('.myForm').serializeArray();

            $.ajax({

                url: 'server.php',
                type: 'POST',
                data: result,
                dataType: 'json',
                context: document.getElementsByClassName('.myForm'),
                success: function (data, status, JqHXR) {

                  $(this).find('span').fadeOut(300, function () {
                      $(this).text('Добавлено!').fadeIn(300);
                  });
                  $(this).delay(1000).fadeOut(1000, function () {
                      $('.myForm').append('<h3>'+ date.name  +'</h3>' + '<p>'+ data.text +'</p>');
                  });
                },
                error: function () {

                }

            })

        })
    })



});