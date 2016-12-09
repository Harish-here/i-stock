<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php global $msg;
include'header.php';
include'connect.php';
include 'queryfunctions.php';
if(isset($_POST['submit'])){
	$task=(isset($_POST['task']))? trim($_POST['task']):" ";}
if(isset($task)&&!empty($task)){
	product_task($task);
}
?>
<html>

<body><div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Product Creation</div><br><br><br>
	<div style="border: solid; border-color: #393; text-align: center; width: 300px; position: absolute; padding: 7px;">
<p style="text-align: center;text-decoration: none;background-color: #FFFF30;margin-top: 10px;font-size: 22px;margin-top: 0px;"><strong>PRODUCT NAME</strong></p>
 <ol>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<li>Name:<input class='box2' type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"><br></li>
	<li></li>
		<input type="hidden" name="task" value="add_product">
		<input  type="submit" name="submit" value="Add product">
</form>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<li>Name:<select class='box2' name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select><br></li>
		<li>
		  <input type="hidden" name="task" value="delete_product"><li>
		    <input type="submit" name="submit" value="Delete product">
    </form></ol><hr>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">	
	<ol><li>Rename:<select class='box2' name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select><br></li><br>
	<li>
		Change:<input type="text" name="change" placeholder='change' value="<?php if(isset($_POST['change'])){ echo $_POST['change'];}?>">
		<input type="submit" name="submit" value="change">
			<input type="hidden" name="task" value="rename">
		
	</li></ol>
	
	</form>
	</div>
<div style="border: solid;border-color:#393;text-align: center;width: 300px;float: right;padding: 7px;margin-left: 100px;">
<p style="text-align: center;text-decoration: none;background-color: #FFFF30;font-size: 22px;margin-top: 0px;"><strong>PRODUCT SIZE</strong></p>
<ol>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<li>size:<input  class='box2' type="text" name="size" value="<?php if(isset($_POST['size'])){ echo $_POST['size'];}?>"><br></li>
	<li></li>
		<input type="hidden" name="task" value="add_size">
		<input type="submit" name="submit" value="Add size">
			</form>
			
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<li>Size:<select  class='box2' name="size">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select><br></li>
	  <li></li>
		<li>
		  <input type="hidden" name="task" value="delete_size">
		  <input type="submit" name="submit" value="Delete size" >
	  </li>
			
</form>
</ol></div>
			<div style="border: solid;border-color:#393;text-align: center;width: 300px;margin-left: 430px;padding: 7px"><p style="text-align: center;text-decoration: none;background-color: #FFFF30;margin-top: 0px;font-size: 22px"><strong>PRODUCT COLOR</strong></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><ol>
	<li>color:<input  class='box2' type="text" name="color" value="<?php if(isset($_POST['color'])){ echo $_POST['color'];}?>"><br></li>
	<li></li>
		<input type="submit" name="submit" value="Add color">
		<input type="hidden" name="task" value="add_color">
			</form><br><br>
			
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<li>color:<select class='box2' name="color">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select><br></li>
		<li></li>
			<input type="hidden" name="task" value="delete_color">
			<input type="submit" name="submit" value="Delete color" >
</form>
			</div>
				
<br><br />			
<?php
if(isset($msg)){
	echo $msg;
}
include 'footer.php';
?>

</body>
</html>
