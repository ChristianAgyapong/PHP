<?php
class CommissionEmployee {
    private string $firstName;
    private string $lastName;
    private string $socialSecurityNumber;
    private float $grossSales;
    private float $commissionRate;

    public function __construct(string $firstName, string $lastName, string $socialSecurityNumber, float $grossSales, float $commissionRate) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->socialSecurityNumber = $socialSecurityNumber;
        $this->setGrossSales($grossSales);
        $this->setCommissionRate($commissionRate);
    }

    public function getGrossSales(): float { return $this->grossSales; }
    public function setGrossSales(float $grossSales): void {
        if ($grossSales < 0.0) {
            throw new InvalidArgumentException("Gross sales must be ≥ 0.0");
        }
        $this->grossSales = $grossSales;
    }

    public function getCommissionRate(): float { return $this->commissionRate; }
    public function setCommissionRate(float $commissionRate): void {
        if ($commissionRate < 0.0 || $commissionRate > 1.0) {
            throw new InvalidArgumentException("Commission rate must be between 0.0 and 1.0");
        }
        $this->commissionRate = $commissionRate;
    }

    public function earnings(): float {
        return $this->grossSales * $this->commissionRate;
    }

    public function displayEmployeeInfo(): void {
        echo "Employee: {$this->firstName} {$this->lastName}\n";
        echo "Social Security Number: {$this->socialSecurityNumber}\n";
        echo "Gross Sales: $" . number_format($this->grossSales, 2) . "\n";
        echo "Commission Rate: " . ($this->commissionRate * 100) . "%\n";
        echo "Earnings: $" . number_format($this->earnings(), 2) . "\n";
    }
}
