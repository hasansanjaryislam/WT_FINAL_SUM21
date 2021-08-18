<?php
	require_once 'model/webtech_final_project.php';
	$c_id="";
	$err_c_id="";
	$c_name="";
	$err_c_name="";
	$c_uname="";
	$err_c_uname="";
	$c_pass="";
	$err_c_pass="";
	$c_dob="";
	$err_c_dob="";
	$c_gender="";
	$err_c_gender="";
	$c_email="";
	$err_c_email="";
	$c_address="";
	$err_c_address="";
	$c_phone="";
	$err_c_phone="";
	$c_nid="";
	$err_c_nid="";
	$err_db="";
	$err_db="";
	$hasError=false;

	if(isset($_POST["add_customer"])){

		$rs = insertCustomer($_POST["c_name"],$_POST["c_uname"],$_POST["c_pass"],$_POST["c_dob"],$_POST["c_gender"],$_POST["c_email"],$_POST["c_address"],$_POST["c_phone"],$_POST["c_nid"]);
		if($rs === true){
			header("Location: customer_table.php");
		}
		$err_db = $rs;
		
	}
	else if (isset($_POST["edit_customer"])){

		$rs = updateCustomer($_POST["c_name"],$_POST["c_id"],$_POST["c_uname"],$_POST["c_pass"],$_POST["c_dob"],$_POST["c_gender"],$_POST["c_email"],$_POST["c_address"],$_POST["c_phone"],$_POST["c_nid"]);
		if($rs === true){
			header("Location: customer_table.php");
		}
		$err_db = $rs;
	}
	
	function insertCustomer($c_name,$c_uname,$c_pass,$c_dob,$c_gender,$c_email,$c_address,$c_phone,$c_nid){
		$query="insert into customer values (NULL,'$c_name','$c_uname','$c_pass','$c_dob','$c_gender','$c_email','$c_address','$c_phone','$c_nid')";
		return execute($query);
	}
	
	function getcustomer_table(){
		$query = "select * from customer";
		$rs = get($query);
		return $rs;
	}
	function getCustomer($c_id){
		$query = "select * from customer where c_id = $c_id";
		$rs = get($query);
		return $rs[0];	
	}
	function updateCustomer($c_name,$c_id,$c_uname,$c_pass,$c_dob,$c_gender,$c_email,$c_address,$c_phone,$c_nid)
	{
		$query = "update customer set c_name='$c_name',c_uname='$c_uname',c_pass='$c_pass',c_dob='$c_dob',c_gender='$c_gender',c_email='$c_email',c_address='$c_address',c_phone='$c_phone',c_nid='$c_nid' where c_id = $c_id";
		return execute($query);
	}
?>