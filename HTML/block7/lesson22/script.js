
    function getScroll(w) {
        w = w || window;

        if (w.pageXOffset != null) {
            return {x:w.pageXOffset, y:w.pageYOffset};
        }
    }

    function drag(el, event) {
        let scroll = getScroll();
        console.log(scroll);

        let startX = event.clientX + scroll.x;
        let startY = event.clientY + scroll.y;

        let elX = el.offsetLeft;
        let elY = el.offsetTop;

        let deltaX = startX - elX;
        let deltaY = startY - elY;

        if(document.addEventListener) {
            document.addEventListener('mousemove', moveHandler, true);
            document.addEventListener('mouseup', upHandler, true);
        }
        
        if (event.stopPropagation)  {
            event.stopPropagation();
        }

        if (event.preventDefault) {
            event.preventDefault();
        }

        function moveHandler(e) {
            let scroll = getScroll();
            el.style.left = (e.clientX + scroll.x - deltaX) + 'px';
            el.style.top = (e.clientY + scroll.x - deltaY) + 'px';

            if(e.stopPropagation) {
                e.stopPropagation();
            }
        }

        function upHandler(e) {
            if(document.removeEventListener) {
                document.removeEventListener('mousemove', moveHandler, true);
                document.removeEventListener('mouseup', upHandler, true);
            }

            if(e.stopPropagation) {
                e.stopPropagation();
            }
        }
    }

