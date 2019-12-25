<?php
session_start();
require_once 'connect.php';
if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;
    } else {
        $error_auth = "Ошибка";
    }
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Добро пожаловать, " . $username . " ";
    echo "<a href='logout.php'>Выйти</a>";
}
?>
<form action="" method="post">
    <h2>Авторизация</h2>
    <input type="text" name="username" placeholder="Login" required>
    <input type="password" name="password" placeholder="Password" required>
    <button class="btn">Войти</button>
    <a href="login.php">Зарегистрироваться</a>
</form>
