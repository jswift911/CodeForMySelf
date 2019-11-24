let arr = [1,2,3];
let arr2 = [1,2,3,4];

let str = '<table border="1px" width="30px">';
for (let i = 1; i <= arr.length; i++) {

    str += '<tr>';

    for (let j = 1; j <= arr2.length; j++) {
        str += '<td>';
            str += i * j;
        str += '</td>';
    }

    str += '</tr>';
}

str += '</table>';

let el = document.getElementById('table');
el.innerHTML = el.innerHTML + str;

// let table = new Array(3);
//
// for (let i = 0; i<table.length; i++) {
//     table[i] = new Array(4);
// }
//
// for (let row = 0; row < table.length; row++) {
//     for (let col = 0; col < table[row].length; col++) {
//         table[row][col] = row*col;
//     }
// }
//
