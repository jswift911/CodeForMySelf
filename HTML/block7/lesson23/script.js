window.onload = function () {

    let submit = document.getElementById('btn');

    submit.onclick = function (e) {
        e = e || window.event;
        document.getElementById('myForm').submit();
        console.log(e);
    }

};