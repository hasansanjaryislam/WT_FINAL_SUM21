<?php
session_start();
if(!isset($_SESSION["loggeduser"]))
{
	header("Location : index.php");
}
?>
<html>
<body>
<h1 align="center">Welcome <?php echo $_SESSION["loggeduser"];?></h1>
<a href="">Add Product</a>
<a href="">All Products</a>
<a href="">Add Users</a>
<a href="">Add Categories</a>
<br>
<form action="" method="post">
Id: <input type="text" name="uname" value=""><br>
Name: <input type="text" name="uname" value=""><br>
Quantity: <input type="text" name="uname" value=""><br>
Price: <input type="text" name="uname" value=""><br>
Decription: <input type="text" name="uname" value=""><br>

<input type="submit" value="Add">
</form>
</body>
</html>
