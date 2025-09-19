<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) { 
header("Location: login.php"); 
exit(); 
} 
include 'db.php'; 
$message = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$title = mysqli_real_escape_string($conn, $_POST['title']); 
$author = mysqli_real_escape_string($conn, $_POST['author']); 
$sql = "INSERT INTO books (title, author) VALUES ('$title', '$author')"; 
if (mysqli_query($conn, $sql)) { 
$message = "Book added successfully!"; 
} else { 
$message = "Error adding book: " . mysqli_error($conn); 
} 
} 
mysqli_close($conn); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Public Library - Add Book</title> 
<style> 
body { 
background-color: white; 
color: black; 
font-family: Arial, sans-serif; 
padding: 20px; 
text-align: center; 
} 
table { 
margin: 0 auto 20px auto; 
border-collapse: collapse; 
width: 400px; 
} 
td { 
padding: 8px; 
text-align: left; 
} 
input[type="text"] { 
width: 100%; 
padding: 8px; 
border-radius: 4px; 
border: 1px solid ; 
box-sizing: border-box; 
} 
input[type="submit"] { 
background-color: black; 
color: white; 
border: none; 
padding: 10px 18px; 
font-weight: bold; 
border-radius: 4px; 
width: 100%; 
cursor: pointer; 
} 
input[type="submit"]:hover { 
background-color: black; 
} 
p { 
margin-top: 20px; 
color: white; 
} 
</style> 
</head> 
<body> 
<h1>Public Library</h1> 
<h2>Add Book</h2> 
<?php if ($message) echo "<p>$message</p>"; ?> 
<form method="post" action=""> 
<table> 
<tr><td>Title</td><td><input name="title" type="text" required></td></tr> 
<tr><td>Author</td><td><input name="author" type="text" required></td></tr> 
<tr><td colspan="2"><input type="submit" value="Add Book"></td></tr> 
</table> 
</form> 
<p><a href="view_books.php">View Books</a> | <a href="logout.php">Logout</a></p> 
</body> 
</html>