<?php


class Worker
{

    public $name;
    public $age;
    public $salary;

    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->checkAge();
    }

    public function checkAge()
    {
        if ($this->age < 18 || $this->age > 70) {
            echo "{$this->name} НЕ может работать";
        } else {
            echo "{$this->name} может работать";
        }
    }

}