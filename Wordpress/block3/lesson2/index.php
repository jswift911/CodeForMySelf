<?php
error_reporting(-1);

require_once 'classes/Worker.php';

$worker1 = new Worker();
$worker2 = new Worker();

$worker1->name = 'Иван';
$worker1->age = 25;
$worker1->salary = 1000;

$worker2->name = 'Вася';
$worker2->age = 26;
$worker2->salary = 2000;

echo "Сумма зарплат: ";
echo $worker1->salary + $worker2->salary;
echo  "<br>";
echo "Сумма возрастов: ";
echo $worker1->age + $worker2->age;