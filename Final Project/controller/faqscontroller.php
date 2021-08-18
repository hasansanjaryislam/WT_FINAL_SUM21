<?php
	require_once 'model/webtech_final_project.php';
	$f_id="";
	$err_f_id="";
	$f_details="";
	$err_f_details="";
	$c_id="";
	$err_c_id="";
	$f_reply="";
	$err_f_reply="";
	$err_db="";
	$err_db="";
	$hasError=false;

	if(isset($_POST["replyfaqs"])){

		$rs = insertFaqs($_POST["f_reply"]);
		if($rs === true){
			header("Location: faqs_table.php");
		}
		$err_db = $rs;
		
	}
	else if (isset($_POST["reply"])){

		$rs = updateFaqs($_POST["f_reply"]);
		if($rs === true){
			header("Location: faqs_table.php");
		}
		$err_db = $rs;
	}
	
	function insertFaqs($f_reply){
		$query="insert into faq values (NULL,'$f_reply')";
		return execute($query);
	}
	
	function getfaqs_table(){
		$query = "select * from faq";
		$rs = get($query);
		return $rs;
	}
	function getFaqs($f_id){
		$query = "select * from faq where f_id = $f_id";
		$rs = get($query);
		return $rs[0];	
	}
	function updateFaqs($f_reply)
	{
		$query = "update faq set f_reply='$h_reply' where h_id = $h_id";
		return execute($query);
	}
?>