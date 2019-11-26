window.onload = function () {

    let div = document.querySelectorAll('div');

    for (let i = 0; i < div.length; i++) {
        div[i].addEventListener("click", red);


        function red() {
            if (div[i].style.backgroundColor != 'red') {
                div[i].style.backgroundColor = 'red';
                div[i].addEventListener("click", green);
                div[i].removeEventListener("click", red);
            }
        }

        function green() {
            if (div[i].style.backgroundColor != 'green') {
                div[i].style.backgroundColor = 'green';
                div[i].addEventListener("click", red);
                div[i].removeEventListener("click", green);
            }
        }
    }

};