<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'connect.php';
include'displayproduct.php';


?>
<html>
<head>
<script>
	document.getElementById('id').onsubmit=function absolute(){document.getElementById('id').style.position='absolute';}
</script>
	
</head>
<?php include'header.php';?>
<body><div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Enquiry</div>
	<div style="height: auto;width:auto">
<div id='id'  style="width:auto;border: solid;border-color:#80AF12;border-width:1px;width: 270px;padding-left: 0px;border-radius:5px; text-align: center;height: auto;">
	<ol>
		<form action="display_product.php" method="post"  >
			<li>Name:<select name="name" class="box2" >
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select></li><br>
		<li>Color:<select name="color" style="margin-left: 2px;" class="box2">
		<option value=" "> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Size:<select name="size" class="box2">
		<option value=" "> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Stock:<input type="text" name="stock" value="<?php if(isset($_POST['stock'])){echo $_POST['stock'];}?>" class="box2"></li><br>
	<li>Condition:<select name="condition" class="box2">
		<option value=" "> </option>
		<option value=">">GREATER</option>
		<option value="<">LESSER</option>
	</select></li>
<br>
	
	<li><input type="submit" name="submit" value="display" ></li>
	
		
			 
				
			</form></ol> </div> 
</div><br><button id='ff' style="float: right;padding: 5px;"onclick="document.getElementById('id').style.position='absolute'">Bring to top</button>

</body>



<?php
if(isset($mode)){
	display_product($mode);
}

include'footer.php';?>
</html>