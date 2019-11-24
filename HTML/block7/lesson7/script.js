function displayTime() {
    let now = new Date();
    let div = document.getElementById('clock');

    div.innerHTML = now.toLocaleTimeString();

    setTimeout(displayTime, 1000);
}

displayTime();


function displayTime2() {
    let now = new Date();
    let div = document.getElementById('timer');
    let sDate = new Date(2019, 11, 31);
    let timer = sDate.getTime() - now.getTime();
    let days = parseInt(timer / (24 * 60 * 60 * 1000));
    let hours = parseInt(timer / (60 * 60 * 1000)) % 24;
    let min = parseInt(timer / (60 * 1000)) % 60;
    let sec = parseInt(timer / (1000)) % 60;

    div.innerHTML = `${days} : ${hours} : ${min} : ${sec}`;

    setTimeout(displayTime2, 1000);
}

displayTime2();