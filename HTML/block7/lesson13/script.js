window.onload = function () {
    let w1 = null;
    let openWindow = document.getElementById('openWindow');
    openWindow.onclick = function () {

//'https://www.google.com',
        w1 = window.open(
            'https://www.google.com',
            'w1',
            'width=300, height=300, resizable=no, scrollbars=yes, status=no, left=200, top=300, menubar=no, toolbar=no, location=no',
        )
    };

    let closeWindow = document.getElementById('closeWindow');
    
    closeWindow.onclick = function () {
        if (typeof w1 === 'object') {
            w1.close();
        }
    }

};