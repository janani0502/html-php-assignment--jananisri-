<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) { 
header("Location: login.php"); 
exit(); 
} 
include 'db.php'; 
if (isset($_GET['book_id'])) { 
$book_id = intval($_GET['book_id']); 
$sql = "DELETE FROM books WHERE book_id = $book_id"; 
if (mysqli_query($conn, $sql)) { 
header("Location: view_books.php"); 
exit(); 
} else { 
echo "Error deleting book: " . mysqli_error($conn); 
} 
} 
mysqli_close($conn); 
?> 