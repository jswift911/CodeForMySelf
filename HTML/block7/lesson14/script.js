window.onload = function () {
    //window.location = 'http://google.com/index.php?param1=sometext&m2=sometext2';
    let url = 'http://google.com/index.php?param1=sometext&m2=sometext2';

    function urlArgs() {
        let args = {};
        // let query = url.search.substring(1);
        let query = url.split('?')[1];
        let parts = query.split("&");

        for (let i = 0; i < parts.length; i++) {
            let pos = parts[i].indexOf('=');

            if (pos == -1) {
                continue;
            }

            let name = parts[i].substring(0, pos);
            let value = parts[i].substring(pos + 1);

            args[name] = value;
        }

        return args;
    }

    let obj = urlArgs();

    console.log(obj);
    console.log(obj.param1);
    console.log(obj.m2);
};

// let b = document.getElementById('openWindow');
//
// b.onclick = function () {
//   window.location.replace('http://google.com/index.php?param1=sometext&m2=sometext2');
// };