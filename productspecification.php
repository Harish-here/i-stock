<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])){$q=' ';$msg="NO ACTION DONE. ";
$name=(isset($_POST['name'])&&!empty($_POST['name']))?$_POST['name']:" ";
$color=(isset($_POST['color'])&&!empty($_POST['color']))?$_POST['color']:"NULL";
$size=(isset($_POST['size'])&&!empty($_POST['size']))?$_POST['size']:" ";
  if($_POST['action']=='add'){
	if(!empty($_POST['name'])&&!empty($_POST['color'])){
		
		$check="SELECT * FROM color WHERE name='$name' AND color='$color'";
		
		$t=mysqli_query($dbc,$check);
		if(mysqli_num_rows($t)==0){
			
		$q="INSERT INTO color(idcolor,name,color) VALUES(NULL,'$name','$color')";mysqli_query($dbc,$q);
		
		$msg="<br><div class='info'> <strong>".$color."</strong> is added to <strong>".$name."</strong></div> ";
		}
		else{
			$msg='<br><div class="exception"> <strong>'.$color."</strong> is already added to <strong>".$name."</strong></div> ";
		}
		
	}
	else
	{
		if(!empty($_POST['name'])&&!empty($_POST['size']))
		{
			
			$check="SELECT * FROM size WHERE name='$name' AND size='$size'";$t=mysqli_query($dbc,$check);
			if(mysqli_num_rows($t)==0)
			{
			$q="INSERT INTO size(idsize,name,size) VALUES(NULL,'$name','$size')";mysqli_query($dbc,$q);
			$safety="INSERT INTO safety_level(idsafety_level,name,stock,size) VALUES(NULL,'$name',0,'$size')";
			mysqli_query($dbc,$safety);
			$msg="<br> <div class='info'><strong>".$size."</strong> is added to <strong>".$name."</strong></div> ";
			}else{
				$msg='<br><div class="exception"> <strong>'.$size."</strong> is already added to <strong>".$name."</strong></div> ";
			}
		}else{
			$msg="<br><div class='exception'>No action done</div>";
		}
	}
	
  }
    if($_POST['action']=='delete'){
	if(!empty($_POST['name'])&&!empty($_POST['color'])){
		
		$check="SELECT * FROM color WHERE name='$name' AND color='$color'";
		$t=mysqli_query($dbc,$check);
		if(mysqli_num_rows($t)==1){
			
		$q="DELETE FROM color WHERE name='$name' AND color='$color'";mysqli_query($dbc,$q);
		$q1="DELETE FROM product_details WHERE name='$name' AND color='$color'";mysqli_query($dbc,$q1);
		$msg="<br><div class='info'> <strong>".$color."</strong> is deleted from <strong>".$name."</strong></div> ";
		}
		else{
			$msg=' <br><div style="exception"><strong>'.$color."</strong> is already Delted from <strong>".$name."</strong></div> ";
		}
		
	}
	else
	{
		if(!empty($_POST['name'])&&!empty($_POST['size']))
		{
			
			$check="SELECT * FROM size WHERE name='$name' AND size='$size'";$t=mysqli_query($dbc,$check);
			if(mysqli_num_rows($t)==1)
			{
			$q="DELETE FROM size WHERE name='$name' AND size='$size'";mysqli_query($dbc,$q);
			$safety="DELETE FROM safety_level WHERE name='$name' AND size='$size'";mysqli_query($dbc,$safety);
			$msg="<br><div class='info'> <strong>".$size."</strong> is deleted from <strong>".$name."</strong></div> ";
			}else{
				$msg='<br><div class="exception"> <strong>'.$size."</strong> is already deleted from <strong>".$name."</strong> </div>";
			}
		}else{
			$msg="<br><div class='exception'><strong>No action done<strong></div>";
		}
	}
	
  }
  
}


?>
<html>
<head>

</head>

<body><div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Product Specification</div>
<br><div class="menu" style="float: left;height: auto;width:auto;background-color: #393;position: absolute;border: dashed;border-width: 2px;"><br>
<font style="text-decoration: underline;"><strong>SPECIFICATION</strong></font>
<a class="menu" href="productspecification.php">[ADD & DELETE]</a>
<a class="menu" href="productspecificatinlist.php">[LIST]</a><br></div><br>
<div align=center style="text-align: center;border: solid;border-color:#393;margin-left: 400px;margin-right: 400px">
	<p style="text-align: center;text-decoration: none;background-color: #FFFF30;margin-top: 0px;font-size: 22px;"><strong>Specfication</strong></p>
<form action="productspecification.php" method="post">
<ol>			<li>Name:<select name="name">
		<option value=""> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select></li><br>
		<li>Color:<select name="color">
		<option value=""> </option>
		<?php
		$q="SELECT color FROM product_color";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['color']. '">'.$row['color'].'</option>';
		}
		?>
	
	</select></li><br>
	<li>Size:<select name="size">
		<option value=""> </option>
		<?php
		$q="SELECT size FROM product_size";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['size']. '">'.$row['size'].'</option>';
		}
		?>
	
	</select></li><br>
	
	<li>Action:<select name="action">
		<option value=""> </option>
		<option value="add">ADD</option>
		<option value="delete">DELETE</option>
	</select>
<br>
	
	<input type="submit" name="submit" value="set"></li>
		
			 
<ol>				
			</form></div>



</body>
</html>
<?php


if(isset($msg)){echo $msg;}
include'footer.php';
?>