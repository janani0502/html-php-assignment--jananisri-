<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db   = "gallerydb"; 
$conn = new mysqli($host, $user, $pass, $db); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Uploading...</title> 
<style> 
body { 
font-family: 'Segoe UI', Arial, sans-serif; 
 
           background: linear-gradient(135deg, #e3f2fd, #bbdefb); 
           display: flex; 
           justify-content: center; 
           align-items: center; 
           height: 100vh; 
           margin: 0; 
       } 
       .container { 
           background: #fff; 
           padding: 40px; 
           border-radius: 16px; 
           box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15); 
           text-align: center; 
           max-width: 500px; 
           animation: fadeIn 0.8s ease-in-out; 
       } 
       .success-icon { 
           font-size: 60px; 
           color: #4CAF50; 
           margin-bottom: 20px; 
           animation: bounce 1s ease infinite alternate; 
       } 
       h2 { 
           color: #333; 
           margin-bottom: 20px; 
           font-size: 28px; 
       } 
       .btn-container { 
           display: flex; 
           justify-content: center; 
           gap: 20px; 
       } 
       a { 
           padding: 14px 24px; 
           background: #4CAF50; 
           color: #fff; 
           border-radius: 12px; 
           text-decoration: none; 
           font-size: 18px; 
           font-weight: bold; 
           transition: background 0.3s ease, transform 0.2s ease; 
 
} 
a:hover { 
background: #388E3C; 
transform: scale(1.05); 
} 
.divider { 
display: flex; 
align-items: center; 
justify-content: center; 
margin: 10px 0; 
color: #888; 
} 
@keyframes fadeIn { 
from { opacity: 0; transform: translateY(-20px); } 
to { opacity: 1; transform: translateY(0); } 
} 
@keyframes bounce { 
from { transform: translateY(0); } 
to { transform: translateY(-8px); } 
} 
</style> 
</head> 
<body> 
<div class="container"> 
<?php 
if (!empty($_FILES['image']['name'])) { 
$target_dir = __DIR__ . "/uploads/"; 
if (!is_dir($target_dir)) { 
mkdir($target_dir, 0777, true); 
} 
$file_name = basename($_FILES["image"]["name"]); 
$target_file = $target_dir . $file_name; 
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
$allowed_types = ["jpg", "jpeg", "png"]; 
if (in_array($imageFileType, $allowed_types)) { 
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { 
$stmt = $conn->prepare("INSERT INTO images (filename) VALUES (?)"); 
$stmt->bind_param("s", $file_name); 
$stmt->execute(); 
$stmt->close(); 
echo "<div class='success-icon'>
 ✅
 </div>"; 
echo "<h2>Image Uploaded Successfully!</h2>"; 
echo "<div class='btn-container'> 
<a href='gallery.php'>Go to Gallery</a> 
<a href='index.php'>Upload More</a> 
</div>"; 
} else { 
echo "<h2 style='color:red;'>
 ❌
 Error uploading file.</h2>"; 
} 
} else { 
echo "<h2 style='color:orange;'>⚠ Only JPG, JPEG & PNG allowed!</h2>"; 
} 
} else { 
echo "<h2 style='color:orange;'>⚠ No file selected!</h2>"; 
} 
$conn->close(); 
?> 
</div> 
</body> 
</html>