<?php

function debug($arr, $die = false) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
}

function redirect($http = false) {
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}

// Обертка для поиска и прочих данных
function h($str){
    return htmlspecialchars($str, ENT_QUOTES); // ENT_QOUTES - преобразовывает двойные кавычки
}