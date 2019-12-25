<?php
session_start();
require_once 'funcs.php';
require_once 'connect.php';
if (!isset($_SESSION['username'])) die('Вы не авторизованы!' . "<br>" . "<a href='login.php'>Авторизироваться</a>");

if (isset_user($_SESSION['username'])) {
    $isset_user = true;
}

if (!empty($_POST) && $isset_user) {
    save_mess();
    header("Location: {$_SERVER['PHP_SELF']}"); // Редирект на текущий файл
    die();
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Добро пожаловать, " . "<b>" . is_apostrof($username) . "</b>" . " ";
    echo "<a href='logout.php'>Выйти</a>";
}

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

        .not_auth {
            color: red;
        }
    </style>

</head>
<body>

<?php if (isset($_SESSION['username'])) :;?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        <label for="text">Текст:</label><br>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
    </p>
    <button type="submit">Написать</button>
</form>

<hr>


<?php if (!empty($messages)) : ?>
    <?php foreach ($messages as $message) : ?>
        <div class="message">
            <p>Автор: <?= $message['name']; ?> | Дата: <?= $message['date']; ?></p>
            <div><?= nl2br(htmlspecialchars($message['text'])); ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php else :;?>
    <h3 class="not_auth">Вы не авторизованы!</h3>
<?php endif;?>
</body>
</html>
