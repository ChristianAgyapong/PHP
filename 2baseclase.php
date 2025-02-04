<?php

// Base class
class CommissionEmployee {
    protected $firstName;
    protected $lastName;
    protected $socialSecurityNumber;
    protected $grossSales;
    protected $commissionRate;

    // Constructor
    public function __construct($firstName, $lastName, $socialSecurityNumber, $grossSales, $commissionRate) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->socialSecurityNumber = $socialSecurityNumber;
        $this->grossSales = $grossSales;
        $this->commissionRate = $commissionRate;
    }

    // Calculate earnings
    public function earnings() {
        return $this->grossSales * $this->commissionRate;
    }

    // Display employee details
    public function display() {
        echo "Employee: {$this->firstName} {$this->lastName}\n";
        echo "SSN: {$this->socialSecurityNumber}\n";
        echo "Gross Sales: \${$this->grossSales}\n";
        echo "Commission Rate: {$this->commissionRate}\n";
        echo "Earnings: \${$this->earnings()}\n";
    }
}

// Derived class
class BasePlusCommissionEmployee extends CommissionEmployee {
    private $baseSalary;

    // Constructor
    public function __construct($firstName, $lastName, $socialSecurityNumber, $grossSales, $commissionRate, $baseSalary) {
        parent::__construct($firstName, $lastName, $socialSecurityNumber, $grossSales, $commissionRate);
        $this->baseSalary = $baseSalary;
    }

    // Calculate total earnings
    public function earnings() {
        return $this->baseSalary + parent::earnings();
    }

    // Update base salary with validation
    public function setBaseSalary($newSalary) {
        if ($newSalary > 0) {
            $this->baseSalary = $newSalary;
        } else {
            echo "Base salary must be positive.\n";
        }
    }

    // Display employee details
    public function display() {
        parent::display();
        echo "Base Salary: \${$this->baseSalary}\n";
        echo "Total Earnings: \${$this->earnings()}\n";
    }
}

// Task A: Create a Commission-Only Employee
$commissionEmployee = new CommissionEmployee("John", "Doe", "123-45-6789", 5000, 0.1);
echo "--- Commission-Only Employee ---\n";
$commissionEmployee->display();

echo "\n";

// Task B: Create a Base Salary + Commission Employee
$basePlusEmployee = new BasePlusCommissionEmployee("Jane", "Smith", "987-65-4321", 7000, 0.08, 3000);
echo "--- Base Salary + Commission Employee ---\n";
$basePlusEmployee->display();

echo "\n";

// Task C: Calculate and Display Earnings for Each Employee (already done in display())

// Task D: Update baseSalary and print updated earnings
$basePlusEmployee->setBaseSalary(3500);
echo "--- Updated Base Salary + Commission Employee ---\n";
$basePlusEmployee->display();

?>
