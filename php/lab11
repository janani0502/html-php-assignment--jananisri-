<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
11. EXCEPTION 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Division Form</title> 
</head> 
<body> 
<form method="post"> 
<label for="dividend">Enter dividend:</label> 
<input type="number" id="dividend" name="dividend" required><br><br> 
<label for="divisor">Enter divisor:</label> 
<input type="number" id="divisor" name="divisor" required><br><br> 
<button type="submit">Divide</button> 
</form> 
<?php 
class DivideByZeroException extends Exception { } 
class DivideByNegativeNoException extends Exception { } 
function checkdivisor($dividend, $divisor){ 
try { 
if ($divisor == 0) { 
throw new DivideByZeroException; 
} 
else if ($divisor < 0) { 
throw new DivideByNegativeNoException; 
} 
else { 
$result = $dividend / $divisor; 
echo "Result of division = $result </br>"; 
} 
} 
catch (DivideByZeroException $dze) { 
echo "Divide by Zero Exception! </br>"; 
} 
catch (DivideByNegativeNoException $dnne) { 
echo "Divide by Negative Number Exception </br>"; 
} 
catch (Exception $ex) { 
echo "Unknown Exception"; 
} 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$dividend = $_POST["dividend"]; 
$divisor = $_POST["divisor"]; 
checkdivisor($dividend, $divisor); 
} 
?> 
</body> 
</html> 
