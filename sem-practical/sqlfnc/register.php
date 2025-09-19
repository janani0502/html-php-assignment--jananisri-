<?php 
session_start(); 
include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = mysqli_real_escape_string($conn, $_POST['name']); 
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$pw = password_hash($_POST['password'], PASSWORD_BCRYPT); 
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pw')"; 
if (mysqli_query($conn, $sql)) { 
$_SESSION['message'] = "Registration successful! Please login."; 
header("Location: login.php"); 
exit(); 
} else { 
echo "Error: " . mysqli_error($conn); 
} 
} 
mysqli_close($conn); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Public Library - Register</title> 
<style> 
body { 
font-family: Arial, sans-serif; 
padding: 20px; 
text-align: center; 
} 
table { 
margin: 0 auto; 
border-collapse: collapse; 
width: 400px; 
} 
td { 
padding: 8px; 
text-align: left; 
} 
input[type="text"], 
input[type="email"], 
input[type="password"] { 
width: 100%; 
padding: 8px; 
border: 1px solid #ccc; 
border-radius: 4px; 
box-sizing: border-box; 
} 
input[type="submit"] { 
border: none; 
padding: 10px 18px; 
font-weight: bold; 
border-radius: 4px; 
width: 100%; 
cursor: pointer; 
background-color: black; 
color: white; 
} 
</style> 
</head> 
<body> 
<h1>Public Library</h1> 
<h2>Register</h2> 
<form method="post"> 
<table> 
<tr><td>Name</td><td><input name="name" type="text" required></td></tr> 
<tr><td>Email</td><td><input name="email" type="email" required></td></tr> 
<tr><td>Password</td><td><input name="password" type="password" required></td></tr> 
<tr><td colspan="2"><input type="submit" value="Register"></td></tr> 
</table> 
</form> 
<p>Already have an account? <a href="login.php">Login here</a>.</p> 
</body> 
</html> 