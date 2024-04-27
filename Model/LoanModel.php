<?php
require_once('db_connection.php');

class LoanModel {

    //Function to use if DB is not available
    public function calculateMonthlyPayment($principal, $annualInterest, $term) {
        $monthlyInterest = $annualInterest / 12 / 100;
        $numerator = $principal * $monthlyInterest * pow(1 + $monthlyInterest, $term);
        $denominator = pow(1 + $monthlyInterest, $term) - 1;
        return $numerator / $denominator;
    }

    public function calculateMonthlyPaymentSP($principal, $annualInterest, $term) {
        // Create a new instance of the Database class
        $db = new Database();

        // Prepare the stored procedure call
        $stmt = $db->conn->prepare("CALL calculate_monthly_payment(?, ?, ?, @monthly_payment)");
        $stmt->bind_param("ddd", $principal, $annualInterest, $term);

        // Execute the stored procedure
        $stmt->execute();

        // Get the output parameter
        $result = $db->conn->query("SELECT @monthly_payment AS monthly_payment");
        $row = $result->fetch_assoc();
        $monthlyPayment = $row['monthly_payment'];

        // Close connections and return result
        $stmt->close();
        $db->conn->close();

        return $monthlyPayment;
    }
}
?>
