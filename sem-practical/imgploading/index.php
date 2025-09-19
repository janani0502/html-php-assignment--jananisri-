<!DOCTYPE html> 
<html> 
<head> 
<title>Upload Image</title> 
<style> 
body { 
font-family: 'Segoe UI', sans-serif; 
background: url('background.jpg') no-repeat center center fixed; 
background-size: cover; 
text-align: center; 
margin: 0; 
padding: 0; 
} 
header { 
background: rgba(0, 0, 0, 0.6); 
color: white; 
padding: 20px; 
display: flex; 
justify-content: center; 
align-items: center; 
gap: 15px; 
} 
header img { 
height: 50px; 
width: 50px; 
border-radius: 50%; 
} 
h2, h3 { 
margin: 10px; 
} 
form { 
background: rgba(255, 255, 255, 0.85); 
padding: 30px; 
margin: 60px auto; 
width: 400px; 
border-radius: 20px; 
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); 
 
           transition: transform 0.3s ease, box-shadow 0.3s ease; 
       } 
       form:hover { 
           transform: scale(1.05); 
           box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4); 
       } 
       input[type="file"] { 
           margin: 15px 0; 
           padding: 10px; 
           width: 90%; 
           border: 1px solid #ccc; 
           border-radius: 8px; 
       } 
       button, a { 
           background: #4CAF50; 
           color: #fff; 
           padding: 12px 20px; 
           text-decoration: none; 
           border-radius: 10px; 
           display: inline-block; 
           margin-top: 15px; 
           border: none; 
           font-size: 16px; 
           cursor: pointer; 
           transition: background 0.3s ease; 
       } 
       button:hover, a:hover { 
           background: #388E3C; 
       } 
       a { 
           display: block; 
           margin-top: 20px; 
       } 
       footer { 
           background: rgba(0, 0, 0, 0.6); 
           color: white; 
           padding: 15px; 
           position: fixed; 
           bottom: 0; 
           width: 100%; 
           display: flex; 
 
justify-content: center; 
align-items: center; 
gap: 10px; 
} 
footer img { 
height: 30px; 
width: 30px; 
border-radius: 50%; 
} 
</style> 
</head> 
<body> 
<header> 
<h2>PSGR KRISHNAMMAL COLLEGE FOR WOMEN</h2> 
</header> 
<h3>OUR MEMORIES</h3> 
<form action="upload.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="image" required><br> 
<button type="submit">Upload</button> 
</form> 
<a href="gallery.php">View Gallery</a> 
<footer> 
<p>&copy; 2025 PSGR Krishnammal College for Women. All rights reserved.</p> 
</footer> 
</body> 
</html> 