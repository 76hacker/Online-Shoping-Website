CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

<?php
$conn = mysqli_connect("localhost","root","","shop_db");

if(!$conn){
    die("Connection Failed");
}
?>

<h1>Online Shopping Website</h1>

<a href="login.php">Login</a><br>
<a href="register.php">Register</a><br>
<a href="products.php">View Products</a>

[10:16 pm, 13/04/2026] Ashish Malpure: <?php include 'db.php'; ?>

<h2>Register</h2>

<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button name="register">Register</button>
</form>

<?php
if(isset($_POST['register'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    mysqli_query($conn,"INSERT INTO users(username,password) VALUES('$u','$p')");
    echo "Registered Successfully";
}
?>
[10:16 pm, 13/04/2026] Ashish Malpure: <?php include 'db.php'; ?>

<h2>Login</h2>

<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");

    if(mysqli_num_rows($res)>0){
        echo "Login Successful";
    } else {
        echo "Invalid Login";
    }
}
?>

 <h2>Products</h2>

<h3>Shirt - ₹500</h3>
<a href="cart.php?product=Shirt&price=500">Add to Cart</a><br><br>

<h3>Shoes - ₹1000</h3>
<a href="cart.php?product=Shoes&price=1000">Add to Cart</a>

<?php
if(isset($_GET['product'])){
    $product = $_GET['product'];
    $price = $_GET['price'];

    echo "<h2>Added to Cart</h2>";
    echo "Product: $product <br>";
    echo "Price: ₹$price <br>";
}
?>

<a href="products.php">Back to Products</a>