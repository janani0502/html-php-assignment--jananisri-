<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db   = "gallerydb"; 
$conn = new mysqli($host, $user, $pass, $db); 
if (isset($_GET['id'])) { 
$id = $_GET['id']; 
$res = $conn->query("SELECT filename FROM images WHERE id=$id"); 
$row = $res->fetch_assoc(); 
$file = "uploads/" . $row['filename']; 
if (file_exists($file)) { unlink($file); } 
$conn->query("DELETE FROM images WHERE id=$id"); 
header("Location: gallery.php"); 
} 
?>