<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) { 
header("Location: login.php"); 
exit(); 
} 
include 'db.php'; 
$result = mysqli_query($conn, "SELECT * FROM books"); 
mysqli_close($conn); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Public Library - View Books</title> 
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
width: 600px; 
} 
th, td { 
padding: 8px; 
border: 1px solid black; 
text-align: left; 
color: black; 
} 
a { 
color: black; 
text-decoration: none; 
} 
a:hover { 
text-decoration: underline; 
} 
p { 
margin-top: 20px; 
} 
</style> 
</head> 
<body> 
<h1>Public Library</h1> 
<h2>Books Available in Library</h2> 
<table> 
<tr> 
<th>Book Title</th> 
<th>Author</th> 
<th>Status</th> 
<th>Change Status</th> 
<th>Delete</th> 
</tr> 
<?php 
while ($book = mysqli_fetch_assoc($result)) { 
echo "<tr>"; 
echo "<td>" . htmlspecialchars($book['title']) . "</td>"; 
echo "<td>" . htmlspecialchars($book['author']) . "</td>"; 
echo "<td>" . ($book['available'] ? "Available" : "Not available") . "</td>"; 
echo "<td><a href='update.php?book_id=" . $book['book_id'] . "&available=" . 
($book['available'] ? 0 : 1) . "' onclick='return confirm(\"Change availability?\")'>" . 
($book['available'] ? "Mark Not Available" : "Mark Available") . "</a></td>"; 
echo "<td><a href='delete.php?book_id=" . $book['book_id'] . "' onclick='return 
confirm(\"Delete this book?\")'>Delete</a></td>"; 
echo "</tr>"; 
} 
?> 
</table> 
<p><a href="add_book.php">Add Book</a> | <a href="logout.php">Logout</a></p> 
</body> 
</html> 