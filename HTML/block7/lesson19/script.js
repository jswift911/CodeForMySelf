window.onload = function () {

    // Задание 1
    let img = document.querySelectorAll('img');

    for (let i = 0; i < img.length; i++) {
        img[i].onclick = function () {
            alert(img[i].src);
        }
    }

    let input = document.querySelectorAll('input');
    let p = document.getElementById('test');

    for (let i = 0; i < input.length; i++) {

        if (!input[i].onfocus) {
            p.innerText += ' ' + input[i].value;
        }

        input[i].onfocus = function () {
            p.innerText = '';
        };

    }

};