<?php
	require_once 'model/webtech_final_project.php';

	$ads_name="";
	$err_ads_name="";
	$ads_price="";
	$err_ads_price="";
	$ads_desc="";
	$err_ads_desc="";
	$ads_image="";
	$err_ads_image="";
	$err_db="";
	$err_db="";
	$hasError=false;
	
	//validations variables
	$err_db="";
	if(isset($_POST["add_ads"])){
		echo "submiited";
		//doo validations
		//if no error
		
		/*$name = basename($_FILES["p_image"]["name"]);
		$ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));
		$myfilename=uniqid().".$ext";
		$target = "storage/product_images/$myfilename";
		$tmp_path = $_FILES["p_image"]["tmp_name"];
		move_uploaded_file($tmp_path,$target);*/
		
		$fileType = strtolower(pathinfo(basename($_FILES["ads_image"]["ads_name"]),PATHINFO_EXTENSION));
		$target = "storage/ads_image/".uniqid().".$fileType";
		move_uploaded_file($_FILES["ads_image"]["tmp_ads_name"],$target);
		
		
		$rs = insertAds($_POST["ads_name"],$_POST["ads__price"],$_POST["ads_desc"],$_POST["ads_image"],$target);
		if($rs === true){
			header("Location: ad_table.php");
		}
		$err_db = $rs;
	
	}
	
	function insertAds($ads_name,$ads_price,$ads_desc,$ads_imgage){
		$query="insert into ads values (NULL,'$ads_name',$ads_id,$ads_price,'$ads_desc','$ads_image')";
		return execute($query);
	}
	function getad_table(){
		$query = "select * from ads";
		$rs = get($query);
		return $rs;
	}
	function getAds($ads_id){
		$query = "select * from ads where ads_id = $ads_id";
		$rs = get($query);
		return $rs[0];	
	}
	function updateAds($ads_name,$ads_id,$ads_price,$ads_desc,$ads_image)
	{
		$query = "update ads set ads_name='$ads_name', ads_price='$ads_price',ads_desc='$ads_desc',ads_image='$ads_image' where ads_id = $ads_id";
		return execute($query);
	}
?>