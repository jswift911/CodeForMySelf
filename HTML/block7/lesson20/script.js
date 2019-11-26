window.onload = function () {

    let a = document.querySelectorAll('a');

    for (let i = 0; i < a.length; i++) {
        a[i].addEventListener("mouseover", mouseOver);
        function mouseOver(e) {
            e = e || window.event;
            a[i].innerText += `   (${a[i].href})`;
            a[i].removeEventListener("mouseover", mouseOver);
        }
    }

};