<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include 'header.php';
include'connect.php';


?><?php
if($_SERVER['REQUEST_METHOD']=='POST'){$username=$_SESSION['user'];echo $_SESSION['user'];
$password=$_SESSION['password'];
if(isset($_POST['submit'])&&!empty($_POST['changed_user'])&&!empty($_POST['changed_password'])){
	$chusername=mysqli_real_escape_string($dbc,$_POST['changed_user']);
	$chpassword=mysqli_real_escape_string($dbc,$_POST['changed_password']);
	$q1="UPDATE name SET name='$chusername'  WHERE name='$username' AND password='$password'";$q2="UPDATE name SET password='$chpassword'  WHERE name='$username' AND password='$password'";
	mysqli_query($dbc,$q2);
	$r1=mysqli_query($dbc,$q1);
	$_SESSION['user']=$chusername;
	$_SESSION['password']=$chpassword;
	$msg="Your Profile is Updated";
	
}else{
	$msg='Profile not Updated';
}
if(isset($msg)){echo $msg;}}
?>
<html>
<head>
	
</head>

<body>

<div style="border:solid;border-color:#393;height:auto;margin-left: 400px;text-align: center;margin-right:400px"><h3 style="background-color:#FFFF80;margin-top: 0px">EDIT PROFILE</h3><p>
<form action="" method="post">
	<ul style="padding: 5px;list-style-type:none;"><li>USERNAME :<input type="text" name="changed_user" value="<?php if(isset($_POST['changed_user'])){echo $_POST['changed_user'];}?>"></li><br>
	<li>PASSWORD :<input type="text" name="changed_password" value="<?php if(isset($_POST['changed_password'])){echo $_POST['changed_password'];}?>"></li><br>
	<input type='submit' name='submit' value="change"></ul>
	</p>
</form></div>
</body>
</html>
<?php include'footer.php';
?>