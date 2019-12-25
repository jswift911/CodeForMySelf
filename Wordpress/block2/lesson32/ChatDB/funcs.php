<?php

function clear() {
    global $db;
    foreach ($_POST as $key=>$value) {
        $_POST[$key] = mysqli_real_escape_string($db, $value);
    }
}

function save_mess() {
    global $db;
    clear();
    extract($_POST);
    $name = safe($_SESSION['username']);
    $query = "INSERT INTO gb (name,text) VALUES ('$name','$text')";
    mysqli_query($db, $query);
}

function get_mess() {
    global $db;
    $query = "SELECT * FROM gb ORDER BY id DESC";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function print_arr($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>'; // true буферизирует данные
}

function safe($data) {
    return htmlspecialchars(strip_tags($data)); // Защита от SQL-инъекций
}

function is_apostrof($username) {
    return str_replace('\\', '',$username); // Если в логине апостроф - удалить экранирующий слэш для нормального отображения
}

// Проверка есть ли пользователь в БД
function isset_user($username){
    global $db;
    $query = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
    $res = mysqli_query($db, $query);
    return mysqli_num_rows($res);
}