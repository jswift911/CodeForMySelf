<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Урок 23 по PHP</title>
</head>
<body>
<?php if (empty($_POST)):?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="display: flex; flex-direction: column; width: 20%">
    Имя: <input name="name" type="text">
    Фамилия: <input name="surname" type="text">
    Дата рождения: <input name="birthday" type="text">
    <button type="submit">Отправить</button>
</form>
<?php else :?>
    <p><?php echo "Имя: " . $_POST['name'];?></p>
    <p><?php echo "Фамилия: " . $_POST['surname'];?></p>
    <p><?php echo "Дата рождения: " . $_POST['birthday'];?></p>
<?php endif;?>
</body>
</html>
