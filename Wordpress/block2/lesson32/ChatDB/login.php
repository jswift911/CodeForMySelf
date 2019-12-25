<?php
session_start();
require_once 'connect.php';
require_once 'funcs.php';
if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = safe($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;
    } else {
        $error_auth = "Ошибка! Проверьте правильность логина и пароля";
    }
}
if (isset($_SESSION['username'])) {
    header('Location: chat.php');
}
?>
<form action="" method="post">
    <?php if (isset($error_auth)) {;?> <div style="color: red" class="error_auth"><?php echo $error_auth;?> </div> <?php } ;?>
    <h2>Авторизация</h2>
    <input type="text" name="username" placeholder="Login" required>
    <input type="password" name="password" placeholder="Password" required>
    <button class="btn">Войти</button>
    <br><br>
    <a href="index.php">Назад</a>
</form>
