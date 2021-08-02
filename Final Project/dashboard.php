<?php include 'Admin_header.php';
$uname=$_GET["uname"];
?>
		<div class="text-center">
			<a href="Customer.php" class="btn btn-primary">Customer</a>
			<a href="Householder.php" class="btn btn-warning">Householder</a>
			<a href="Ads.php" class="btn btn-danger">Ads</a>
			<a href="ReviewRating.php" class="btn btn-warning">Reviews & Rating</a>
			<a href="FAQs.php" class="btn btn-info">FAQs</a>
			<a href="Admin_login.php" class="btn btn-danger">Logout</a>	
		</div>
<?php include 'Admin_footer.php';?>