// Задание 1

let days = {
    0: 'Воскресенье',
    1: 'Понедельник',
    2: 'Вторник',
    3: 'Среда',
    4: 'Четверг',
    5: 'Пятница',
    6: 'Суббота',
};

let daysObj = new Object(days);
console.log(daysObj['0']);


// Задание 2

let date = new Date();
let day = date.getDay();
console.log(daysObj[day]);
