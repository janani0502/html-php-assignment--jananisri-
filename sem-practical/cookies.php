<?php 
session_start(); 
$products = [ 
1 => ["name" => "Laptop", "price" => 10000], 
2 => ["name" => "Smartphone", "price" => 8000], 
3 => ["name" => "Headphones", "price" => 2000], 
]; 
if (isset($_GET['remove'])) { 
$id = $_GET['remove']; 
unset($_SESSION['cart'][$id]); 
header("Location: checkout.php"); 
exit; 
}  
if (isset($_GET['clear'])) { 
unset($_SESSION['cart']); 
header("Location: checkout.php"); 
exit; 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>Checkout - Gadgets Store</title> 
<style> 
body { 
font-family: Arial, sans-serif; 
margin:0; 
padding:0; 
background:#f5f6fa; 
} 
.header { 
width: 100%; 
text-align: center; 
} 
.header img { 
width: 100%; 
max-height: 250px;   
object-fit: cover;   
display: block; 
 
} 
        .container { 
            width: 90%; 
            margin: 20px auto; 
            background:#fff; 
            padding:20px; 
            border-radius:10px; 
            box-shadow:0px 2px 8px rgba(0,0,0,0.1); 
        } 
        h2 { text-align: center; color:#2d3436; margin-bottom:20px; } 
        table { 
            width:100%; 
            border-collapse:collapse; 
            margin-bottom:20px; 
        } 
        th, td { 
            border:1px solid #b2bec3; 
            padding:10px; 
            text-align:center; 
        } 
        th { 
            background:#74b9ff; 
            color:#fff; 
        } 
        td a { 
            background:#d63031; 
            color:#fff; 
            padding:6px 12px; 
            border-radius:5px; 
            text-decoration:none; 
        } 
        td a:hover { background:#b71c1c; } 
        .actions { 
            text-align:center; 
            margin-top:20px; 
        } 
        .btn { 
            padding:10px 15px; 
            border:none; 
            border-radius:5px; 
            text-decoration:none; 
 
margin:5px; 
color:#fff; 
cursor:pointer; 
} 
.btn-clear { background:#636e72; } 
.btn-shop { background:#00b894; } 
</style> 
</head> 
<body> 
<div class="header"> 
<img 
src="https://img.freepik.com/free-vector/electronics-store-template-design_23-2151143831.jpg?s
 emt=ais_hybrid&w=740&q=80" alt="Banner"> 
</div> 
<div class="container"> 
<h2>Your Cart</h2> 
<?php if (!empty($_SESSION['cart'])): ?> 
<table> 
<tr> 
<th>Item</th> 
<th>Price ($)</th> 
<th>Quantity</th> 
<th>Total ($)</th> 
<th>Action</th> 
</tr> 
<?php 
$grandTotal = 0; 
foreach ($_SESSION['cart'] as $id => $qty): 
$item = $products[$id]; 
$total = $item['price'] * $qty; 
$grandTotal += $total; 
?> 
<tr> 
<td><?= $item['name'] ?></td> 
<td><?= $item['price'] ?></td> 
<td><?= $qty ?></td> 
<td><?= $total ?></td> 
<td><a href="checkout.php?remove=<?= $id ?>">Remove</a></td> 
</tr> 
<?php endforeach; ?> 
<tr> 
<td colspan="3"><strong>Grand Total</strong></td> 
<td colspan="2"><strong>$<?= $grandTotal ?></strong></td> 
</tr> 
</table> 
<?php else: ?> 
<p style="text-align:center;color:#636e72;">Your cart is empty.</p> 
<?php endif; ?> 
<div class="actions"> 
<a href="checkout.php?clear=1" class="btn btn-clear">Clear Cart</a> 
<a href="gadgets.php" class="btn btn-shop">Continue Shopping</a> 
</div> 
</div> 
</body> 
</html>
