<?php


class Worker
{

    public $name;
    public $age;
    public $salary;
    public $min_age = 18;
    public $max_age = 70;

    public function checkAge()
    {
        if ($this->age < 18 || $this->age > 70) {
            echo "Вы НЕ можете работать";
        } else {
            echo "Вы можете работать";
        }
    }

    public function checkAge2()
    {
        if ($this->age < $this->min_age || $this->age > $this->max_age) {
            echo "Вы НЕ можете работать";
        } else {
            echo "Вы можете работать";
        }
    }
}