<?php
require_once 'funcs.php';
require_once 'connect.php';
//if (!empty($_POST)) {
//    save_mess();
//    header("Location: {$_SERVER['PHP_SELF']}"); // Редирект на текущий файл
//    die();
//}

$messages = get_mess();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга (Чатик)</title>

    <style>
        .message {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>

</head>
<body>

<!--Регистрация-->
<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($db, $query);

    if ($result) {
        $success_reg = "Регистрация прошла успещно";
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
    <a href="login.php">Войти</a>
</form>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        <label for="name">Имя:</label><br>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="text">Текст:</label><br>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
    </p>
    <button type="submit">Написать</button>
</form>

<hr>
<!--Регистрация конец-->


<?php if (!empty($messages)) : ?>
    <?php foreach ($messages as $message) : ?>
        <div class="message">
            <p>Автор: <?= $message['name']; ?> | Дата: <?= $message['date']; ?></p>
            <div><?= nl2br(htmlspecialchars($message['text'])); ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
