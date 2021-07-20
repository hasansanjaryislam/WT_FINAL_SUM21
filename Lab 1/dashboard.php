<?php
session_start();
if(!isset($_SESSION["loggeduser"]))
{
	header("loggeduser:index.php");
}
?>
<html>
<body>
<h1 align="center">Welcome <?php echo $_SESSION["loggeduser"];?></h1>
<a href="add_product.php">Add Product</a>
<a href=""All Products</a>
<a href=""All Users</a>
<a href=""All Categories</a>
</body>
</html>