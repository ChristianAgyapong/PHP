<?php
require_once "CommissionEmployee.php";

// Create an instance of CommissionEmployee
$employee = new CommissionEmployee("John", "Doe", "123-45-6789", 5000.0, 0.1);

// Update grossSales and commissionRate
$employee->setGrossSales(7000.0);
$employee->setCommissionRate(0.12);

// Display updated employee details
$employee->displayEmployeeInfo();
