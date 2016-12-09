<?php
date_default_timezone_set('Asia/Kolkata');
$date_present=date('d M y');
$date_expiry='05 Mar 2014';
if($_SERVER['REQUEST_METHOD']=="POST"){
session_start();
include 'connect.php';
//checking the submission
if(isset($_POST['submit'])&& isset($_POST['user'])&& isset($_POST['password']) ){
	if(!empty($_POST['user'])&& !empty($_POST['password'])){

$name=mysqli_real_escape_string($dbc,trim($_POST['user']));
$pass=mysqli_real_escape_string($dbc,trim($_POST['password']));
$q="SELECT name FROM name WHERE name='$name' AND password='$pass'";
$t=mysqli_query($dbc,$q);

//checking the name & pass in database
if(mysqli_num_rows($t)==1){
$_SESSION['user']=$_POST['user'];
$_SESSION['password']=$_POST['password'];
$_SESSION['login']="logged";$user=trim($_POST['user']);
$q="SELECT permission FROM name WHERE name='$user'";
$r= mysqli_query($dbc,$q);
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
	$_SESSION['permission']=$row['permission'];
}
if(isset($_SESSION['user'])){$user=$_SESSION['user'];
$query="INSERT INTO session_log(idsession_log,name,date_time) VALUES(NULL,'$user',NOW())";
$result=mysqli_query($dbc,$query);}
 header("location:home.php");
 exit();
}
else{
	$_SESSION['login']="not";
	
	$info="Invalid username or password";
}}
else{
	$info= "Enter a username & password ";
}

}}

?>
<html>
<title>Log in</title>
<body>
	<?php include 'header_index.php'; ?>
	<div style="height: auto;width:200px;background-color:#393;text-align: center;color: #FFFFFF;border: dashed;border-width: 2px;border-radius: 5px">
<form method="post"><br>
Username:<input type="text" name="user" placeholder="username" class="box1"><br>
Password:<input type="password" name="password" placeholder="password" class="box1"><br>
<input type="submit" name="submit" value="login">
</form></div><div style="color:red;"><?php if(isset($info)){echo $info;}?></div>

<br><div style="color: #80AF12;text-align: center;border: solid;border-width:1px;border-color:#80AF12;background-color: #ffff80;margin-top: 5px;margin-bottom: 5px;margin-left: 150px;margin-right: 150px; padding: 8px;padding-left: 5px;padding-right: 5px;" class="big">
"A customized lite weight,Easy and Effective App for the stock managment..!!" </div><br><br>
<?php include'connect.php';
$q="SELECT name,date_time FROM session_log ORDER BY idsession_log";
$r=mysqli_query($dbc,$q);
while($row=mysqli_fetch_assoc($r)){
	$name=$row['name'];
	$dt=$row['date_time'];
	
}
echo " <div class='small'>last log in by <strong>".$name."</strong> @ ".$dt." </div>";

?>
</body>
</html><?php
include'footer.php';
?>