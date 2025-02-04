<?php

// Step A: Create the abstract Employee class
abstract class Employee {
    // Encapsulated class attributes
    protected $name;
    protected $employeeId;

    // Constructor to initialize name and employeeId
    public function __construct($name, $employeeId) {
        $this->name = $name;
        $this->employeeId = $employeeId;
    }

    // Getter methods for name and employeeId
    public function getName() {
        return $this->name;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    // Abstract method that must be implemented by subclasses
    abstract public function calculatePay();
}

// Step B: Implement the FullTimeEmployee subclass
class FullTimeEmployee extends Employee {
    // Encapsulated class attribute for salary
    private $salary;

    // Constructor to initialize name, employeeId, and salary
    public function __construct($name, $employeeId, $salary) {
        parent::__construct($name, $employeeId); // Call parent constructor to initialize name and employeeId
        $this->salary = $salary; // Set salary
    }

    // Getter method for salary
    public function getSalary() {
        return $this->salary;
    }

    // Implement the calculatePay() method
    public function calculatePay() {
        return "FullTimeEmployee Pay: {$this->salary}";
    }
}

// Step C: Instantiate a FullTimeEmployee object
$employee = new FullTimeEmployee("John Doe", "FT001", 50000);

// Step D: Display the employee's details
echo "Employee Name: " . $employee->getName() . "<br>";
echo "Employee ID: " . $employee->getEmployeeId() . "<br>";

// Step E: Call calculatePay() to test different salary values
echo $employee->calculatePay() . "<br>"; // Output: FullTimeEmployee Pay: 50000

// Test with a different salary
$employee2 = new FullTimeEmployee("Jane Smith", "FT002", 60000);
echo $employee2->calculatePay() . "<br>"; // Output: FullTimeEmployee Pay: 60000

?>
