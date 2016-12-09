<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'displayproduct.php';
if(isset($mode)){
	display_product($mode);
}
?>
<html>
<head>
	
</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<select name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select><br>
		<input type="submit" name="submit" value="display" >
			<input type="hidden" name="mode" value="specific_name">
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<select name="size">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select><br>
		<input type="submit" name="submit" value="display" >
			<input type="hidden" name="mode" value="specific_size">
</form>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<select name="color">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select><br>
		<input type="submit" name="submit" value="diplay" >
			<input type="hidden" name="task" value="specific_color">
				</form>




</body>
</html>
