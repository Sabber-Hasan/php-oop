<?php
class Employee {
    public $name;
    public $age;
    private $salary;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

}

$emp = new Employee("John", 25, 50000);
echo "Salary: " . $emp->getSalary() . "<br>"; 
echo "Name: " . $emp->name . "<br>" . " Age: " . $emp->age;
// $emp->setSalary(55000);
// echo $emp->getSalary();
    
    
?>