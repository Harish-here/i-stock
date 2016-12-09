<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include'connect.php';

?>
<html>
<head>
	
</head>

<body><div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Product Specification</div>
<br><div class="menu" style="float: left;height: auto;width:auto;background-color: #393;border: dashed;border-width: 2px;"><br><font style="text-decoration: underline;margin-top: 0px;"><strong>SPECIFICATION</strong></font><a class="menu" href="productspecification.php">[ADD & DELETE]</a><a class="menu" href="productspecificatinlist.php">[LIST]</a>
<br></div><br>
<div align=center style="text-align: center;border: solid;border-color:#393;margin-left: 400px;margin-right: 400px">
<form method="post" action=""><p style="text-align: center;text-decoration: none;background-color: #FFFF30;margin-top: 0px;font-size: 22px;"><strong>List</strong></p>
			<br>Select Product:<select name="name" class="box1">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select><br><br>
<input type="submit" name="submit" value="Show">
		</form></div>


</body>
</html>
<?php
if(isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
	if(!empty($name)){
		$q="SELECT color FROM color WHERE name='$name'";
		$r=mysqli_query($dbc,$q);
		echo'<div align="center" ><br><h2 style="text-decoration:underline;color:#393">'.$name.'<br></h2><h3 style="color:#393">COLOR</h3><div style="color:#393;border:solid;border-width:2px;border-color:#393;padding:10px;font-size:19px;width:300px">';
		while($row=mysqli_fetch_assoc($r))
		{
			echo' <li style="text-align:left;margin-left:120px;">'.$row['color'].' </li>';
		}echo'</div><br>';
		$q1="SELECT size FROM size WHERE name='$name'";
		$r1=mysqli_query($dbc,$q1);
		echo'<h3 style="text-decoration:none;;color:#393">SIZE</h3><div style="border:solid;border-width:2px;border-color:#393;padding:10px;font-size:19px;width:300px">';
		while($row=mysqli_fetch_assoc($r1))
		{
		echo' <li style="text-align:left;margin-left:120px;color:#393">'.$row['size'].'</li> ';	
		}
		echo '</div></div>';
	}
	else{
			echo '<p>None selected</p>'; 
	}
}

include'footer.php';
?>