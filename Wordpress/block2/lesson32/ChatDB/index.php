<?php
require_once 'funcs.php';
require_once 'connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга (Чатик)</title>
</head>
<body>

<!--Регистрация-->
<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = safe($_POST['email']);
    $password = safe($_POST['password']);

    if (!isset_user($username)) {
        // Добавление (регистрацию) пользователя в БД
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        // Запрос добавление (регистрацию) пользователя в БД
        $result = mysqli_query($db, $query);
    } else {
        $isset_user = true;
    }


    if ($result) {
        $success_reg = "Регистрация прошла успещно";
    } elseif ($isset_user) {
        $error_reg = "Такой пользователь уже существует";
    } else {
        $error_reg = "Ошибка регистрации";
    }
}

?>

<form action="" method="post">
    <?php if (isset($success_reg)) {;?> <div style="color: green" class="success_reg"><?php echo $success_reg;?> </div> <?php } ;?>
    <?php if (isset($error_reg)) {;?> <div style="color: red" class="error_reg"><?php echo $error_reg;?> </div> <?php } ;?>
    <h2>Регистрация</h2>
    <input type="text" name="username" placeholder="Login" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button class="btn">Зарегистрироваться</button>
    <br><br>
    или
    <br><br>
    <a href="login.php">Войти</a>
</form>
<!--Регистрация конец-->
</body>
</html>
