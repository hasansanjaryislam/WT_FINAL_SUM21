<?php
	include 'model/webtech_final_project.php';
	
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$confirm_pass="";
	$err_confirm_pass="";
	$email="";
	$err_email="";
	$gender="";
	$err_gender="";
	$phone="";
	$err_phone="";
	$nid="";
	$err_nid="";
	$address="";
	$err_address="";
	$dob="";
	$err_dob="";
	$err_db="";
	$hasError=false;
	if(isset($_POST["sign_up"])){
	if(empty($_POST["name"]))
	{
		$hasError = true;
		$err_name = "Name required";
	}
	else if(strlen($_POST["name"])<= 2)
	{
		$hasError = true;
		$err_name = "Name must be greater than 2 characters";
	}
	else
	{
		$name = $_POST["name"];
	}
	
	    if(empty($_POST["uname"]))
   {
	  $hasError=true; 
	  $err_uname="User name required";
   }
   elseif(strlen($_POST["uname"])<6)
   {
	  $hasError=true;  
	  $err_uname="User name Must be at least 6 characters";
   }
   else
   {
	 $uname=$_POST["uname"];  
	 
   }
   	if(empty($_POST["pass"]))
	{
		$hasError = true;
		$err_pass = "Password required";
	}

	else if((strlen($_POST["pass"])< 8))
	{
		$hasError = true;
		$err_pass = "Password requires minimum 8 characters";
	}
	if((strlen($_POST["pass"])>= 8))
	{
	
	$passvariable = $_POST["pass"];
	$uppercase = preg_match('@[A-Z]@',$passvariable);
	$lowercase = preg_match('@[a-z]@',$passvariable);
	if(!$uppercase)
	{
	$hasError = true;
	$err_pass = "Password requires uppercase letters";
	}
	else if(!$lowercase)
	{
	$hasError = true;
	$err_pass = "Password requires lowercase letters";
	}
	if(strpos($_POST["pass"],'#') == false && (strpos($_POST["pass"],'?') == false))
	{
		$hasError = true;
		$err_pass = "Password requires minimum 1 '#' and '?'";
	}
	
	
	else
	{
		$pass = $_POST["pass"];
	}
	}

/*	if(empty($_POST["confirm_pass"]))
	{
		$hasError = true;
		$err_confirm_pass = "Password required again";
	}

	else if((strlen($_POST["confirm_pass"])< 8))
	{
		$hasError = true;
		$err_confirm_pass = "Password requires minimum 8 characters";
	}
	if((strlen($_POST["confirm_pass"])>= 8))
	{
	
	$passvariable = $_POST["confirm_pass"];
	$uppercase = preg_match('@[A-Z]@',$passvariable);
	$lowercase = preg_match('@[a-z]@',$passvariable);
	if(!$uppercase)
	{
	$hasError = true;
	$err_confirm_pass = "Password requires uppercase letters";
	}
	else if(!$lowercase)
	{
	$hasError = true;
	$err_confirm_pass = "Password requires lowercase letters";
	}
	if(strpos($_POST["confirm_pass"],'#') == false && (strpos($_POST["confirm_pass"],'?') == false))
	{
		$hasError = true;
		$err_confirm_pass = "Password requires minimum 1 '#' and '?'";
	}
	
	
	else
	{
		$confirm_pass = $_POST["confirm_pass"];
	}
	}
*/	
    if(empty($_POST["email"])){
    $err_email="Please enter email";
    }

    else
	{
    $s=strpos($_POST["email"],"@");
    if($s!=false)
	{
    $t=strpos($_POST["email"],".", $s+1);
    if($t!=false)
	{
    $email=$_POST["email"];
    }
    else{
    $err_email="Invalid email";
    }
    }
    else{
    $err_email="Invalid email";
    }
    }	

  if(!isset($_POST["gender"]))
   {
	 $hasError=true;   
	$err_gender="gender name required"; 
   }
   else
   {
	 $gender=$_POST["gender"];   
   }
   		if(empty($_POST["phone"]))
   {
	  $hasError=true; 
	  $err_phone="Phone number required";
   }
    elseif(is_numeric($_POST["phone"])==false){
                $err_phone="Please enter digit";
            }
   else
   {
	 $phone=$_POST["phone"];  
   }
		if(empty($_POST["nid"]))
   {
	  $hasError=true; 
	  $err_nid="NID required";
   }
    elseif(is_numeric($_POST["nid"])==false){
                $err_nid="Please enter digit";
            }
   else
   {
	 $nid=$_POST["nid"];  
   }
   
   	if(empty($_POST["address"]))
   {
	  $hasError=true; 
	  $err_address="Address required";
   }
   else
   {
	 $bio=$_POST["address"];  
   }
			if(empty($_POST["dob"]))
   {
	  $hasError=true; 
	  $err_dob="dob required";
   }
   else
   {
	 $dob=$_POST["dob"];  
   }
	

		if(!$hasError){
			$rs = insertUser($name,$uname,$pass,$email,$gender,$phone,$nid,$address,$dob);
			if($rs === true){
				header("Location: Admin_login.php");
			}
			$err_db = $rs;
		}
	}

	elseif(isset($_POST["btn_Admin_login"])){
		
		if(empty($_POST["uname"])){
			$hasError  = true;
			$err_uname = "Username Required";
		}
		else{
			$uname = $_POST["uname"];
		}
		if(empty($_POST["pass"])){
			$hasError  = true;
			$err_pass = "Password Required";
		}
		else{
			$pass = $_POST["pass"];
		}

		if(!$hasError){
			if(authenticateUser($uname,$pass)){
				header("Location:dashboard.php?uname=$uname");
			}
			$err_db  = "Username and password invalid";
		}
		
	}
	function insertUser($name,$uname,$pass,$email,$gender,$phone,$nid,$address,$dob){
		echo $name;
		echo $uname;
		echo $pass;
		echo $email;
		echo $gender;
		echo $phone;
		echo $nid;
		echo $address;
		echo $dob;
		$query = "insert into admin values (NULL,'$name','$uname','$pass','$email','$gender','$phone','$nid','$address','$dob')";
		return execute($query);
		
	}
	function authenticateUser($uname,$pass){
		$query = "select * from admin where uname='$uname' and pass='$pass'";
		$rs = get($query);
		if(count($rs) > 0){
			return true;
		}
		return false;
		
	}
?>