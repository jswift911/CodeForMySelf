<?php
// 1. Создайте пользовательскую функцию maxInt(), которая будет принимать два параметра (числа)
// и должна возвращать максимальное из переданных ей чисел. В случае, если числа равны,
// функция должна возвращать сообщение об этом.

    function maxInt($a, $b) {
        if ($a > $b) {
            return $a;
        } elseif ($a === $b) {
            return 'Числа равны';
        }
        return $b;
    }

echo maxInt(5, 10);


    echo "<br>";

// 2. Напишите функцию, которая принимает параметром число от 1 до 12
// и возвращает название месяца, соответствующее переданному числу.

function getMonth($monthNumber) {

    $months = [
        "1"=>"Январь",
        "2"=>"Февраль",
        "3"=>"Март",
        "4"=>"Апрель",
        "5"=>"Май",
        "6"=>"Июнь",
        "7"=>"Июль",
        "8"=>"Август",
        "9"=>"Сентябрь",
        "10"=>"Октябрь",
        "11"=>"Ноябрь",
        "12"=>"Декабрь"
    ];

    if ($monthNumber > 12 || $monthNumber < 1) {
        return 'Введите число от 1 до 12 !!!';
    }

    return $months[$monthNumber];

}

echo getMonth(11);