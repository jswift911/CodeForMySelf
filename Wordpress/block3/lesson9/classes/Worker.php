<?php


class Worker extends User
{

    private $salary;


    public function __construct($name, $age, $salary)
    {
        parent::__construct($name, $age);
        $this->salary = $salary;
    }


    public function getSalary()
    {
        return $this->salary;
    }


    public function setSalary($salary)
    {
        $this->salary = $salary;
    }


}