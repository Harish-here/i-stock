<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
global $msg;
if(isset($_POST['submit'])){
	$task=(isset($_POST['task']))? trim($_POST['task']):" ";}


function product_task($task)
{include 'connect.php';
	$name=(isset($_POST['name']))? trim($_POST['name']):" ";
	$color=(isset($_POST['color']))? trim($_POST['color']):" ";
	$size=(isset($_POST['size']))? trim($_POST['size']):" ";
	$stock=(isset($_POST['stock']))? trim($_POST['stock']):" ";
	$change=(isset($_POST['change']))? trim($_POST['change']):" ";
switch($task)
{
case 'add_stock':if(isset($stock)&&!empty($stock))
{        $q1="SELECT stock FROM product_details WHERE name='$name' AND color='$color' AND size='$size' ";
         $r1=mysqli_query($dbc,$q1);
	 while($row=mysqli_fetch_assoc($r1)){
		$stock = $row['stock'] + $stock;
	 }
	$q="UPDATE product_details SET stock='$stock' WHERE name='$name' AND color='$color' AND size='$size'";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$msg="stock added";
	}
	else{
		$msg="stock not addded";
	}
		
}
break;
case 'update_stock' : if(isset($stock)&&!empty($stock))
{        $q1="SELECT stock FROM product_details WHERE name='$name' AND color='$color' AND size='$size' ";
         $r1=mysqli_query($dbc,$q1);
	 while($row=mysqli_fetch_assoc($r1)){
		$stock = $row['stock'] - $stock;
	 }
	$q="UPDATE product_details SET stock='$stock' WHERE name='$name' AND color='$color' AND size='$size'";
	$r=mysqli_query($dbc,$q);
	
	
		$msg="stock updated";
	}
	else{
		$msg="stock not updated";
	}
		

break;
case 'add_size' : if(isset($size)&&!empty($size))
{
	$q3="INSERT INTO product_size(idproduct_size,size) VALUES(NULL,'$size')";
	$r3=mysqli_query($dbc,$q3);
	if($r3)
	{
		$msg="size is added";
	}else{
		$msg="size not added";
	}
}
break;
case 'delete_size':if(isset($size)&&!empty($size))
{
	$q="DELETE FROM product_size WHERE size='$size' ";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$msg="specified size is deleted";
	}
	else{
		$msg="size is not deleted";
	}
}
break;
case 'add_product':if(isset($name)&&!empty($name)){
	$q4="INSERT INTO product_name(idproduct_name,name) VALUES(NULL,'$name')";
	$r4=mysqli_query($dbc,$q4);
	$w="INSERT INTO safety_level(idsafety_level,name,stock) VALUES(NULL,'$name',0)";
	$w1=mysqli_query($dbc,$w);
	
	
		$msg="product is added";
	
	
}else{
		$msg="product is not added";
	}
break;
case 'delete_product': if(isset($name)&&!empty($name)){
	$q5="DELETE FROM product_name WHERE name='$name'";
	$r5=mysqli_query($dbc,$q5);
	$w2="DELETE FROM safety_level WHERE name='$name'";
	$w8=mysqli_query($dbc,$w2);
	$e="DELETE FROM product_details WHERE name='$name'";$r6=mysqli_query($dbc,$e);
	$r9="DELETE FROM color WHERE name='$name'";mysqli_query($dbc,$r9);
	$r3="DELETE FROM size WHERE name='$name'";mysqli_query($dbc,$r3);
	if($r5)
	{
		$msg="specified product is deleted";
	}
	else{
		$msg="product is not deleted";
	}
}
break;
case 'add_color':if(isset($color)&&!empty($color)){
	$q="INSERT INTO product_color(idproduct_color,color) VALUES (NULL,'$color')";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$msg="specified color is added";
	}
	else{
		$msg="color is not added";
	}
}
break;
case 'delete_color':if(isset($color)&&!empty($color)){
	$q="DELETE FROM product_color WHERE color='$color'";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$msg="specified color is deleted";
	}
	else{
		$msg="color is not deleted";
	}
}
break;
case 'rename': if(isset($change)&&!empty($change)){
	$q="UPDATE product_name SET name='$change' WHERE name='$name'";mysqli_query($dbc,$q);
	$r="UPDATE size SET name='$change' WHERE name='$name'";mysqli_query($dbc,$r);
	$t="UPDATE color SET name='$change' WHERE name='$name'";mysqli_query($dbc,$t);
	$y="UPDATE product_details SET name='$change' WHERE name='$name'";mysqli_query($dbc,$y);
}
}
	if(isset($task)){
		$_POST['name']=" ";
		$_POST['color']=" ";
		$_POST['size']=" ";
		$_POST['stock']=" ";
		$_POST['task']=" ";
		$_POST['change']=" ";
	}
}


?>