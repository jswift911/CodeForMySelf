<?php

// 1. Дана строка 'minsk'. Используя функции для работы со строками,
// преобразуйте ее в строку 'MINSK'.

$str = 'minsk';
echo strtoupper($str);
echo "<br>";


// 2. Дана строка 'минск'. Используя функции для работы со строками,
// преобразуйте ее в строку 'Минск'. Будьте внимательны, в верхнем регистре должна быть только первая буква.

$str2 = 'минск';

function mb_ucfirst($str) {
    return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}

echo mb_ucfirst($str2);
echo "<br>";

// 3. Дана строка 'MINSK'. Сделайте из нее строку 'Minsk'.
// Попробуйте решить задачу в одну строку кода.

$str3 = 'MINSK';
echo ucfirst(strtolower($str3));