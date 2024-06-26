<?php
require_once('../Model/LoanModel.php');

class LoanController {
    public function calculateLoan($principal, $annualInterest, $term) {
        $model = new LoanModel();
        $result = $model->calculateMonthlyPaymentSP($principal, $annualInterest, $term);
        header("Location: ../View/loan_form.php?result=$result&montopresta=$principal&tasaInteres=$annualInterest&plazo=$term");
        exit();
    }
}

$controller = new LoanController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->calculateLoan($_POST['principal'], $_POST['annualInterest'], $_POST['term']);
}

?>
