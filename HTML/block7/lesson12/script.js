window.onload = function () {
    let wrap = document.getElementById('popup_overlay');
    let closeB = document.getElementById('popup_close');
    closeB.onclick = popupClose;

    let inP = document.getElementById('popupIn');
    inP.onclick = popup;

    let tIn, tOut;

    function popup() {
        wrap.style.display = 'block';

        popupIn(1);
    }
    
    function popupClose() {
        popupOut(0);
    }

    function popupIn(x) {
        let op = (wrap.style.opacity) ? parseFloat(wrap.style.opacity) : 0;

        if (op < x) {
            clearInterval(tOut);
            op += 0.05;
            wrap.style.opacity = op;

            //setTimeout(popupIn, 50, x);
            tIn = setTimeout(function () {
                popupIn(x);
            }, 50);
        }
    }

    function popupOut(x) {
        let op = (wrap.style.opacity) ? parseFloat(wrap.style.opacity) : 0;

        // 0.05 0.1 0.15
        if (op > x) {
            clearInterval(tIn);
            op -= 0.05;
            wrap.style.opacity = op;

            //setTimeout(popupIn, 50, x);
            tOut = setTimeout(function () {
                popupOut(x);
            }, 50);
        }
        if (wrap.style.opacity == x)  {
            wrap.style.display = 'none';
        }
    }


    setTimeout(popup, 1000);

    let h1 = document.getElementById('changed');
    
    function changeColor() {

        h1.onclick = function () {
            clearTimeout(intStop);
        };

        if (h1.style.color == 'black') {
            h1.style.color = 'red';
        } else {
            h1.style.color = 'black';
        }
    }

   let intStop = setInterval(changeColor, 500);
};