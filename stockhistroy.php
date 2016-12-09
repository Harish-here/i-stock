<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include'connect.php';echo'<br>';
include'sidebar.php';
?>
<html>
<head>
	
</head>

<body>
<?php 
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$name=$name[$id];
}else{
	$name='Product';
}


	
?> 
<div style="text-align: center;border:solid;border-color:#393;margin-left:400px;margin-right:400px;">
	<h2 style="background-color:#FFFF80;margin-top:0px;"><?php if(isset($name)&&!empty($name)){ echo $name;}else{echo 'Product';}?></h2>
	<p><form method="post" action="" style="width: auto;">
			Color:<select name="color" class="box1">
		<option value=""> </option>
		<?php
		$q="SELECT color FROM color WHERE name='$name'";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	</select><br><br>
	size:<select name="size" class="box1">
		<option value=""> </option>
		<?php
		$q="SELECT size FROM size WHERE name='$name'";
		$r=mysqli_query($dbc,$q) ;
		
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	</select><br><br>
	Histroy of:<select name="area" class="box1">
		<option value=""> </option>
		<option value="update">LESS</option>
		<option value="add">ADD</option>
		
	</select><br><br>
	
	<input type="submit" name="submit" value="Show">
	</p>
		</form>
	</div>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{

$color=(isset($_POST['color'])&&!empty($_POST['color']))?$_POST['color']:"";
$size=(isset($_POST['size'])&&!empty($_POST['size']))?$_POST['size']:"";
$area=(isset($_POST['area'])&&!empty($_POST['area']))?$_POST['area']:"";
   if(isset($area)&&!empty($area))
   {
	if($area=='add'&&$color==""&&$size==""){
		$q="SELECT * FROM stockhistroy WHERE product='$name' ORDER BY idstockhistroy DESC LIMIT 0,30";echo '<marquee>jj</marquee>';
	}
	else{if($area=='update'&&$color==""&&$size==""){
		$q="SELECT * FROM stockhistroyupdate WHERE product='$name' ORDER BY idstockhistroy DESC LIMIT 0,30";}
	}
	if(!empty($color)&&!empty($size)&&$area='add'){
		$q="SELECT * FROM stockhistroy WHERE product='$name' AND color='$color' AND size='$size' ORDER BY idstockhistroy DESC LIMIT 0,30";
	}elseif(!empty($color)&&!empty($size)&&$area='update'){
		$q="SELECT * FROM stockhistroyupdate WHERE product='$name' AND color='$color' AND size='$size' ORDER BY idstockhistroy DESC LIMIT 0,30";
	}
	$r=mysqli_query($dbc,$q);
	echo'<div style="text-align:center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">';
		echo'<h3>'.$name.'<tr><th>USER</th><th>COLOR</th><th>SIZE</th><th>BEFORE</th><th>UPDATED STOCK</th><th>AFTER<th>DATE TIME</th></tr>';
	        while($row=mysqli_fetch_assoc($r))
		{
			
			echo '<td>'.$row['name'].'</td>';
			echo '<td>'.$row['color'].'</td>';
			echo '<td>'.$row['size'].'</td>';
			echo '<td>'.$row['stockbefore'].'</td>';
			echo '<td>'.$row['stock'].'</td>';
			echo '<td>'.$row['stockafter'].'</td>';
			echo '<td>'.$row['datetime'].'</td></tr>';
		}
		echo '</table><div>';
		
	
   }
   else{
	echo '<br><div style="color:red;text-align:center;">Choose UPDATE or ADD</div>';
   }
}
if(mysqli_num_rows($r)<5){
for($u=0;$u<mysqli_num_rows($side);$u++){echo'<br>';}
}else{
	for($u=0;$u<6;$u++){echo'<br>';}}
include'footer.php';
?>