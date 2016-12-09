<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include'connect.php';echo '<br>';
include'sidebar.php';
if(isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=='POST'){$name=(isset($_POST['name'])&&!empty($_POST['name']))?$_POST['name']:' ';
	$size=(isset($_POST['size'])&&!empty($_POST['size']))?$_POST['size']:' ';
	$stock=(isset($_POST['stock'])&&!empty($_POST['stock']))?$_POST['stock']:' ';
	if(!empty($_POST['name'])&&!empty($_POST['stock'])&&is_numeric($_POST['stock'])){
		$r1="UPDATE safety_level SET stock='$stock' WHERE name='$name' AND size='$size'";
		$q1=mysqli_query($dbc,$r1);
		$msg="Safety level stock for <strong>".$name."</strong> of size <strong>".$size."</strong> is set to <strong>".$stock."</strong>";
		$_POST['stock']=" ";
	}else{
		$msg='<div style="color:red;">Invalid data given</div>';
		$_POST['stock']=" ";
	}
}
	

?>
<html>
<head>
</head>
<body>
<div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Product Safety Level</div><br>
<?php
if(isset($_GET['id'])&&!isset($_POST['name'])){
	$id=$_GET['id'];
	$name=$name[$id];
}

if(isset($_POST['name'])){
		$name=$_POST['name'];
	}
		
	

?>
<div style="position: !important;text-align: center;">
	<form method="post" action="">
Size:<select name="size" class="box2">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM size WHERE name='$name'";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select><br><br>
	Stock:<input type="text" name="stock" value="<?php if(isset($_POST['stock'])){echo $_POST['stock']; }?>" class="number">
		<input type="submit" name="submit" value="set" >
			<input type="hidden" name="name" value="<?php echo $name;?>">
</form></div>

<?php 
if(isset($msg)){
	echo '<div class="info">'.$msg."</div>";
}$name=(isset($_POST['name']))?$_POST['name']:$name;
$q="SELECT size,stock FROM safety_level WHERE name='$name'";
$r=mysqli_query($dbc,$q);
echo'<div style="text-align: center;"><font size="6px" style="text-decoration:underline;color:#393;">'.$name.'</font><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="10" cellspacing="2" id="Table1">
<tr>
<th>SIZE</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
';
}
echo '</table> </div>';
?>
</body>
</html>
<?php
if(mysqli_num_rows($r)<5){
for($u=0;$u<mysqli_num_rows($side);$u++){echo'<br>';}
}else{
	for($u=0;$u<6;$u++){echo'<br>';}
}
include'footer.php';
?>