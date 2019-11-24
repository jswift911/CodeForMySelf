let string = document.getElementById('string').innerHTML;

// Задание 1
string = string.replace(/ /g, '+');

document.getElementById('string').innerHTML = string;

// задание 2

let stringToArray = document.getElementById('string2').innerHTML;

stringToArray = stringToArray.split(' ');

document.getElementById('string2').innerHTML = stringToArray;