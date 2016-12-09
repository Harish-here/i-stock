<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	
</head>

<body>

<?php
include'header.php';
include'connect.php';
$username= $_SESSION['user'];
$password=$_SESSION['password'];
$q="SELECT name,password,permission FROM name WHERE name='$username' AND password='$password'";
$r=mysqli_query($dbc,$q);

echo"<div style='text-align:center;border:solid;border-width:1px;border-color:#000;position:realative;margin-right:450px;margin-left:450px;background-color:#FFFF80;font-family: serif'><h3 style='text-decoration:underline;'>Your Profile</h3>";
while($row=mysqli_fetch_assoc($r))
{
	echo "<p>USERNAME: ".$row['name']."<br><br>";
	
	echo "PERMISSION: ".$row['permission']."</p><br></div>";
}


?>
</div>
<p style="position: absolute;font-family: serif"><a href="profileedit.php" style="text-decoration: none;">Click Here To Edit</a></p>
</body>
</html>
<?php
include'footer.php';
?>