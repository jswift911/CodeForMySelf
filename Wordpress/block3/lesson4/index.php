<?php
error_reporting(-1);

require_once 'classes/Worker.php';

$worker1 = new Worker('Иван', 25, 1000);
echo "<br>";
$worker2 = new Worker('Вася', 26, 2000);
echo "<br>";
$worker3 = new Worker('Николай', 15, 500);