# Calculadora de préstamos

Este proyecto implementa un calculador de préstamos utilizando PHP con el patrón de diseño MVC (Modelo-Vista-Controlador).

## Descripción

El calculador de préstamos permite a los usuarios ingresar el monto del préstamo, la tasa de interés anual y el plazo del préstamo en meses. Luego, calcula la cuota mensual utilizando la fórmula de cuotas niveladas y muestra el resultado al usuario.

## Estructura de directorios

- **Controller**: Contiene los controladores PHP.
- **Model**: Contiene los modelos PHP.
- **View**: Contiene las vistas HTML.
- **style.css**: Archivo CSS para estilos.
- **README.md**: Este archivo.

## Instalación

1. Instala XAMPP 
2. Levanta Apache Web Server
3. Levanta MySQL y crea una base de datos llamada 'celaque'
4. Modifica el connection string de ser necesario con tus credenciales
5. Ejecuta en MySQL el siguiente store procedure: 
```
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculate_monthly_payment`(
  IN principal DECIMAL(15,10),
  IN annual_interest DECIMAL(15,10),
  IN term INT,
  OUT monthly_payment DECIMAL(15,10)
)
BEGIN
  DECLARE monthly_interest DECIMAL(15,10);

  SET monthly_interest = annual_interest / 12 / 100;

  SET monthly_payment = (principal * monthly_interest * POW(1 + monthly_interest, term)) / (POW(1 + monthly_interest, term) - 1);
END$$
DELIMITER ;
```
5. Ingresa a http://localhost/celaque/view/loan_form.php
6. Prueba el funcionamiento





