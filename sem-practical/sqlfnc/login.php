<?php 
session_start(); 
include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$pw = $_POST['password']; 
$res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'"); 
if (mysqli_num_rows($res) > 0) { 
$user = mysqli_fetch_assoc($res); 
if (password_verify($pw, $user['password'])) { 
$_SESSION['user_id'] = $user['user_id']; 
$_SESSION['user_name'] = $user['name']; 
header("Location: view_books.php"); 
exit(); 
} else { 
$error = "Incorrect password!"; 
} 
} else { 
$error = "User not found!"; 
} 
} 
mysqli_close($conn); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Public Library - Login</title> 
<style> 
body { 
background-color: white; 
color: black; 
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
input[type="email"], 
input[type="password"] { 
width: 100%; 
padding: 8px; 
border: 1px solid ; 
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
p { 
margin-top: 20px; 
} 
</style> 
</head> 
<body> 
<h1>Public Library</h1> 
<h2>Login</h2> 
<?php if (!empty($_SESSION['message'])) { echo $_SESSION['message']; 
unset($_SESSION['message']); } ?> 
<?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?> 
<form method="post"> 
<table> 
<tr><td>Email</td><td><input name="email" type="email" required></td></tr> 
<tr><td>Password</td><td><input name="password" type="password" required></td></tr> 
<tr><td colspan="2"><input type="submit" value="Login"></td></tr> 
</table> 
</form> 
<p>No account? <a href="register.php">Register here</a>.</p> 
</body> 
</html> 