<?php
include 'connect.php';

include 'header.php';



if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit'])&&!empty($_POST['user'])){
		$user=mysqli_real_escape_string($dbc,trim($_POST['user']));
		
	
		$q="DELETE FROM name WHERE name='$user'";
		$r=mysqli_query($dbc,$q);
		$msg="<div class='info'>The user name ".$_POST['user']." is deleted";
		
		
	}
}



 if($_SERVER['REQUEST_METHOD']=='POST')
  {
	if(isset($_POST['submit'])&& isset($_POST['username'])&& isset($_POST['pass1'])){
		if(!empty($_POST['username'])&&!empty($_POST['pass1'])&& !empty($_POST['permission'])){
			$username=mysqli_real_escape_string($dbc,trim($_POST['username']));
			$q1="SELECT * FROM name WHERE name='$username'";
			$r1=mysqli_query($dbc,$q1);
			if(mysqli_num_rows($r1)==0){
			$password=mysqli_real_escape_string($dbc,trim($_POST['pass1']));
			$permission=mysqli_real_escape_string($dbc,trim($_POST['permission']));
			$q="INSERT INTO name(user_id,name,password,permission) VALUES(NULL,'$username','$password','$permission')";
			$r=mysqli_query($dbc,$q) or die() ;
			if($r)
			{
				$msg="<div class='info'>".$username." user created</div>";
			}
			else{
				$msg="<div class='exception'>Some field is missing</div>";
			}}else{ $msg="<div class='exception'>username is already registered</div>";}
		}
	}
	
   }


?>

<html><head>
<title>members</title></head>
<body>
	
	
<br><div style="float:left;height: auto;width:auto;background-color: #393;padding: 7px;border: dashed;border-width:1px;border-color:#FFF;">
<a style="color:#FFFFFF;background-color: #393;text-decoration: none;" href="members.php?id=3"> | Delete user |</a>
<a style="text-decoration: none;color:#FFFFFF;background-color: #393;" href="members.php?id=1"> Registered Users |</a>
<a style="text-decoration: none;color:#FFFFFF;background-color: #393;" href="members.php?id=2"> Create Users |</a></div><br><br>

<?php if(isset($msg)){ echo"<h3>".$msg."</h3>";}?>
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	switch($id)
	{
case 1: echo'<h3><div style="text-align:center;">REGISTERED USERS</h3></div>';
$q= "SELECT name,password,permission FROM name";
$r=mysqli_query($dbc,$q);
echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;margin-top:auto;height:auto;" cellpadding="5" cellspacing="2" id="Table1">
<tr>
<th>username</th>
<th>password</th>
<th>permission</th></tr>';
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['password'].'</td>
<td>'.$row['permission'].'</td>
</tr>
<br>';}break;
case 2:include'register_user.php';
break;
case 3:include'delete.php'; 

break;
}
}
?>
</table>
</div>
<?php
include 'footer.php';?>
</body>
</html>