<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Celaque</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Cálculadora Celaque S.A.</h1>
    <form action="../Controller/LoanController.php" method="post">
        <label for="principal">Monto del préstamo:</label>
        <input type="text" name="principal" id="principal" required pattern="[0-9]+(\.[0-9]+)?"><br><br>
        
        <label for="annualInterest">Tasa de interés anual (%):</label>
        <input type="text" name="annualInterest" id="annualInterest" required pattern="[0-9]+(\.[0-9]+)?"><br><br>
        
        <label for="term">Plazo del préstamo en meses:</label>
        <input type="text" name="term" id="term" required pattern="[0-9]+"><br><br>
        
        <button type="submit">Calcular</button>
    </form>
    
    <?php if(isset($_GET['result'])): ?>
        <p>La cuota mensual es: <?php echo $_GET['result']; ?></p>
    <?php endif; ?>
</body>
</html>
