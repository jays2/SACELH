<?php

class LoanModel {
    public function calculateMonthlyPayment($principal, $annualInterest, $term) {
        $monthlyInterest = $annualInterest / 12 / 100;
        $numerator = $principal * $monthlyInterest * pow(1 + $monthlyInterest, $term);
        $denominator = pow(1 + $monthlyInterest, $term) - 1;
        return $numerator / $denominator;
    }
}
?>
