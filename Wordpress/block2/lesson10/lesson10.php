<?php


//1. Дан массив с элементами 'Привет, ', 'мир' и '!'. Необходимо вывести на экран фразу 'Привет, мир!'.
//   Попробуйте написать 2 варианта решения. Исходный массив:

	$arr = ['Привет, ', 'мир', '!'];

	echo $arr[0] . $arr[1] . $arr[2] . "<br>";
	echo implode('', $arr) . "<br>";



// 2. Создайте массив $arr с элементами 1, 2, 3, 4, 5 двумя различными способами.

    $arr2 = [1,2,3,4,5];
    $arr3 = array(1,2,3,4,5);
    print_r($arr2);
    echo "<br>";
    print_r($arr3);
    echo "<br>";


// 3. В переменной $date лежит дата в формате '31-12-2000'. Преобразуйте эту дату в формат '2000.12.31'.

        $date = '31-12-2000';
        echo implode('.', array_reverse(explode('-', $date)));
        echo "<br>";


// 4. Создайте массив, заполненный числами от 1 до 100. Попробуйте это сделать, используя специальную функцию.

        $arr4 = range(1,100);
        echo "<pre>";
        print_r($arr4);
        echo "</pre>";
