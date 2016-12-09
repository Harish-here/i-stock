<?php
include'connect.php';
include'header.php';

?>
<html>
<head>
	
</head>

<body>
	
	<div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Product Insertion</div>
	<?php include'sidebar.php';
	if(isset($_GET['id'])&&!isset($_POST['name'])){
	$id=$_GET['id'];
	$names=$name[$id];
	$_POST['name']=$name[$id];
}else{if(!isset($_POST['name'])){
	$names='Product';}
}

if(isset($_POST['name'])){
		$names=$_POST['name'];
	}

?>
<ol>	<form action="" method="post" style="border:solid;border-color:#393;padding: 0px;margin-left: 350px;margin-right: 350px">
<div style="text-align: center;margin-top: 0px;background-color: #FFFF80;font-size: larger;width:auto"><strong><?php echo $names;?></strong></div>
<br>
		
		<li>Color:<select name="color">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM color WHERE name='$names'";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Size:<select name="size">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM size WHERE name='$names'";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Initial Stock:<input type="text" name="stock" style="size: 5px;" value="<?php if(isset($_POST['stock'])){ echo " ";}?>"><br>
	
<br>
	
	<li><input type="submit" name="submit" value="Insert"></li>
		
			 
				
			</form>
</ol>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
	    {
	$color=(isset($_POST['color']))? trim($_POST['color']):" ";
	$size=(isset($_POST['size']))? trim($_POST['size']):" ";
	$stock=(isset($_POST['stock'])&&$_POST['stock']!=" ")? $_POST['stock']:0;
	$query="SELECT * FROM product_details WHERE name='$names' AND color='$color' AND size='$size'";
	$result=mysqli_query($dbc,$query);
	if(mysqli_num_rows($result)==0&&!empty($names)&&!empty($color)&&!empty($size)&&(!empty($stock)||$stock==0))
	{
		$q="INSERT INTO product_details(product_id,name,color,size,stock) VALUES(NULL,'$names','$color','$size','$stock')";
		$r=mysqli_query($dbc,$q);
		$msg ='The product <strong>'.$names.'</strong> with color <strong>'.$color.'</strong> and size <strong>'.$size.'</strong> initial stock <strong>'.$stock."</strong> is being inserted ";
	
	$_POST['stock']=" ";
	
	}
	else{
		if(mysqli_num_rows($result)>0){
		$msg='<strong>Already the product present in the database</strong>';}
		else{
			$msg='<strong>Invalid data given</strong>';
		}
		
	    }
	    }

if(isset($msg)){
	echo'<div class="exception">'. $msg.'</div>';
}

	if(mysqli_num_rows($r)<=5){
for($u=0;$u<(mysqli_num_rows($side)/2.8);$u++){
	echo'<br><br><br>';}
}else{
	for($u=0;$u<6;$u++){echo'<br><br>';}
	
}


include'footer.php';
?>