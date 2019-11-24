let str = '<table border="1px" width="30px">';
for (let i = 1; i <= 3; i++) {

    str += '<tr>';

    for (let j = 1; j <= 4; j++) {
        str += '<td>';
            str += i * j;
        str += '</td>';
    }

    str += '</tr>';
}

str += '</table>';

let el = document.getElementById('table');
el.innerHTML = el.innerHTML + str;