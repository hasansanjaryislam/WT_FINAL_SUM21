<?php
session_start();
$uname="";
$err_uname="";
$pass="";
$err_pass="";
$hasError = false;
$users = array("hasan"=>"1234","sanjary"=>"5678","islam"=>"4321");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["uname"]))
	{
		$hasError = true;
		$err_uname = "Username Required";
	}
	else
	{
		$uname = $_POST["uname"];
	}
	if(empty($_POST["pass"]))
	{
		$hasError = true;
		$err_pass = "Password Required";
	}
	else
	{
		$pass = $_POST["pass"];
	}
	if(!$hasError)
	{
		foreach($users as $u => $p)
		{
			$_SESSION["loggeduser"] =$uname;
			header("Location:dashboard.php");
		}
	}
	echo "invalied username";
}


?>
<html>
<body>
<form action ="" method ="post">
Username : <input type="text" name="uname" value="<?php echo $uname;?>"> <span><?php echo $err_uname; ?></span><br>
password : <input type="password" name="pass" value="<?php echo $pass;?>"> <span><?php echo $err_pass; ?></span><br>
<input type="submit" value="Login">
</form>
</body>
</html>