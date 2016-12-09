<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit'])&&!empty($_POST['user'])){
		$user=mysqli_real_escape_string($dbc,trim($_POST['user']));
		
	
		$q="DELETE FROM name WHERE name='$user'";
		$r=mysqli_query($dbc,$q);
		$msg="the user name ".$_POST['user']." is deleted";
		
		
	}
}
?>

<html>
<head>
	
</head>
<body>
	<div style="width: auto;height:auto;border: solid;border-color:#393;margin-left: 400px;margin-right: 400px;padding: 0px"><div style="font-size: 20pt;font-style: italic;text-align: center;font-family: serif;background-color: #FFFF80;"><strong>DELETE USER</strong></div>
<div style="text-align: center;"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<br>
USER NAME:<select name="user" st>
	<option value=" "> </option>
	<?php
	
	$q="SELECT name FROM name WHERE permission='none' ";
	$r=mysqli_query($dbc,$q);
	while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
		foreach($row as $value){	
		echo'<option value="'.$row['name'].'">';echo $row['name'].'</option>';	
        	}
	}	
	
	?>
</select><br>
<input type="submit" name="submit" value="Delete" style="margin:5px;">
	
</form><br><br></div>
<?php
if(isset($msg)){
	echo $msg;
}

?>

</body>
</html>
