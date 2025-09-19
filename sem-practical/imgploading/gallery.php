<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db   = "gallerydb"; 
$conn = new mysqli($host, $user, $pass, $db); 
$result = $conn->query("SELECT * FROM images ORDER BY uploaded_at DESC"); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Image Gallery</title> 
<style> 
body { 
 
           font-family: 'Segoe UI', sans-serif; 
           background: #f4f6f9; 
           margin: 0; 
           padding: 0; 
       } 
       /* Header styling */ 
       header { 
           background: #444; 
           color: white; 
           padding: 15px 30px; 
           display: flex; 
           justify-content: center; 
           align-items: center; 
           gap: 15px; 
       } 
       header img { 
           height: 60px; 
           width: 60px; 
           border-radius: 50%; 
           object-fit: cover; 
       } 
       header h2 { 
           margin: 0; 
           font-size: 24px; 
       } 
       h2.title { 
           text-align: center; 
           margin-top: 20px; 
           font-size: 28px; 
           color: #333; 
       } 
       /* Upload button */ 
       .upload-btn { 
           display: inline-block; 
           margin: 20px auto; 
           background: #4CAF50; 
           color: white; 
           padding: 12px 20px; 
           text-decoration: none; 
           font-size: 16px; 
           border-radius: 8px; 
 
 
           transition: background 0.3s ease; 
       } 
       .upload-btn:hover { 
           background: #388E3C; 
       } 
       /* Gallery container */ 
       .gallery { 
           display: flex; 
           flex-wrap: wrap; 
           justify-content: center; 
           gap: 25px; 
           margin: 30px; 
       } 
       /* Image card */ 
       .img-box { 
           background: #fff; 
           padding: 15px; 
           width: 250px; 
           border-radius: 16px; 
           box-shadow: 0 8px 16px rgba(0,0,0,0.1); 
           transition: transform 0.3s ease, box-shadow 0.3s ease; 
           display: flex; 
           flex-direction: column; 
           align-items: center; 
       } 
       .img-box:hover { 
           transform: scale(1.05); 
           box-shadow: 0 12px 24px rgba(0,0,0,0.2); 
       } 
       .img-box img { 
           width: 100%; 
           height: 180px; 
           border-radius: 12px; 
           object-fit: cover; 
           margin-bottom: 10px; 
       } 
       /* Text section under image */ 
       .img-details { 
           text-align: center; 
           margin-bottom: 10px; 
       } 
 
.img-details p { 
margin: 3px 0; 
font-size: 14px; 
color: #555; 
} 
/* Delete button */ 
.delete-btn { 
background: #e53935; 
color: #fff; 
padding: 8px 14px; 
border-radius: 6px; 
text-decoration: none; 
font-size: 14px; 
transition: background 0.3s ease; 
} 
.delete-btn:hover { 
background: #b71c1c; 
} 
/* Footer styling */ 
footer { 
background: #444; 
color: white; 
padding: 15px; 
text-align: center; 
position: fixed; 
bottom: 0; 
width: 100%; 
} 
</style> 
</head> 
<body> 
<header> 
<h2>PSGR KRISHNAMMAL COLLEGE FOR WOMEN</h2> 
</header> 
<h2 class="title">Uploaded memories..!!</h2> 
<div style="text-align:center;"> 
<a class="upload-btn" href="index.php">Upload More</a> 
</div> 
<div class="gallery"> 
<?php while ($row = $result->fetch_assoc()) { ?> 
<div class="img-box"> 
<img src="uploads/<?php echo $row['filename']; ?>"> 
<!-- 4 lines of text --> 
<div class="img-details"> 
<p><strong>Title:</strong> <?php echo $row['title'] ?? 'Event'; ?></p> 
<p><strong>Date:</strong> <?php echo date("d M Y", 
strtotime($row['uploaded_at'])); ?></p> 
<p><strong>Uploaded By:</strong> <?php echo $row['uploaded_by'] ?? 
'Krishnammal College'; ?></p> 
<p><strong>Description:</strong> <?php echo $row['description'] ?? 'Just our 
memories '; ?></p> 
</div> 
<a class="delete-btn" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a> 
</div> 
<?php } ?> 
</div> 
<footer> 
&copy; 2025 PSGR Krishnammal College for Women. All rights reserved. 
</footer> 
</body> 
</html> 