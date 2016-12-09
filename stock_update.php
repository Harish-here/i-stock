<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include'connect.php';
include'queryfunctions.php';if(isset($task)){ product_task($task);}
?>
<html>
<head>
</head>

<body><div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Stock ADD & UPDATE</div><br>
<div style="border: solid;border-color: #393;margin-left: 300px;margin-right: 300px;"><h4 style="text-align: center;background-color: #FFFF30;font-size: 22px;margin-top: 0px;">ADD STOCK</h4>
	<ol><li><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Name:<select name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select></li>
	
	<li>Color:<select name="color">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select><li><br>
	Size:<select name="size">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>stock:<input type="text" name="stock" value="<?php if(isset($_POST['stock'])){ echo $_POST['stock'];}?>"></li><br>
	<li><input type="submit" name="submit" value="update stock"></li>
		<input type="hidden" name="task" value="add_stock">
			 
				
			</form></lo></div><br><br>
<div style="border: solid;border-color: #393;margin-left: 300px;margin-right: 300px;">
	<h4 style="text-align: center;background-color: #FFFF30;font-size: 22px;margin-top: 0px;">UPDATE STOCK</h4>

			<ol><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<li>Name:<select name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select></li><br>
	
	<li>Color:<select name="color">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Size:<select name="size">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>stock:<input type="text" name="stock" value="<?php if(isset($_POST['stock'])){ echo $_POST['stock'];}?>">
</li>	<br>
	<li><input type="submit" name="submit" value="update stock"></li>
		
		<input type="hidden" name="task" value="update_stock">
			 
				
			</ol></form></div>

<?php
include'footer.php';
?>

</body>
</html>
