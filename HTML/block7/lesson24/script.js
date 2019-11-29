window.onload = function () {

    let submit = document.getElementById('btn');

    submit.onclick = function (e) {
        e = e || window.event;
        let request = new XMLHttpRequest();

        request.open('POST', 'server.php');

        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.setRequestHeader("MyHead", "someString");


        request.send("name=Ben");

        e.preventDefault();
        return false;
    }

};