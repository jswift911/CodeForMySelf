
// Задание 1

let salary = {
    Petya: 30000,
    Kolya: 40000

};

let salaries = new Object(salary);


console.log(salaries.Petya);
console.log(salaries.Kolya);

// Задание 2

let obj = {a: 1, b: 2, c: 3};

let obj1 = Object(obj);


console.log(obj1.c);
console.log(obj1['c']);
