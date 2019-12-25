<?php
error_reporting(-1);

require_once 'classes/User.php';
require_once 'classes/Worker.php';

$worker1 = new Worker('Иван', 25, 1000);
$worker2 = new Worker('Вася', 26, 2000);

echo "Сумма зарплат: ";
echo $worker1->getSalary() + $worker2->getSalary();
