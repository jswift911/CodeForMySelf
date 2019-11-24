let a = [1,6,10,67,3,9,2,0,34,23,5];

// Задание 1
console.log(a.sort(function (a,b) {
    return a-b;
}));

console.log(a.sort(function (a,b) {
    return b-a;
}));

// Задание 2
a = [1,6,10,67,3,9,2,0,34,23,5];

a2 = a.slice(3);
console.log(a2);

// Задание 3

// Сумма элементов массива
sum = a.reduce(function (x,y) {
    return x+y;
},0);

console.log(sum);


//Среднее арифметическое

average = sum/a.length;

console.log(average);

/**
 * Максимальный элемент массива
 * @param array
 * @return {number}
 */
function arrayMax(array){
    return Math.max.apply(null, a);
}

console.log(arrayMax(a));

/**
 * Минимальный элемент массива
 * @param array
 * @return {number}
 */
function arrayMin(array){
    return Math.min.apply(null, a);
}

console.log(arrayMin(a));



