<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include 'auth.php';
if(isset($_GET['link'])){
	$link=$_GET['link'];
	switch($link)
	{
		case 1 : session_destroy();
	header("location:index.php");
	break;
                case 2 : header('location:members.php');
			break;
		
	}
}
date_default_timezone_set('Asia/Kolkata');
$date_present=date('d M y');
$time_present=strftime("%H:%M %p");

?>
<html>
<head>
	<title>i-STOCK</title>
	<style>
		@charset "utf-8";
body {
	font-family: serif;
	font-size: 15px;
	width: 1232px;
}

td {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

th {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	
	background-color:#ffff30;

}

form {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 17px;
	
		}
		

input {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	padding: 5px;
	border-radius:1px
	
	
}
.exception{
	text-align: center;
	color: red;
	font-size: 19px;
	font-family: serif;
	text-decoration:none;
}
.info{
	text-align: center;
	color:#393;
	font-size: 19px;
	text-decoration: none;
	font-family: serif;
}
.menu{
	color: #FFF;
	background-color: #393;
color: #FFF;
display: block;
font-family: Verdana,Geneva,sans-serif;
font-size: 14px;
text-align: center;
font-size-adjust: none;
font-stretch: normal;
font-style: normal;
font-variant: normal;
font-weight: 400;
line-height: 22.4px;
list-style-image: none;
list-style-position: outside;
list-style-type: none;
padding-bottom: 3px;
padding-left: 5px;
padding-right: 5px;
padding-top: 3px;
text-decoration: none;
width: 160px;
border:solid;
border-color: #FFF;
border-width:1px;
margin-top:1px; 
-moz-font-feature-settings: normal;
-moz-font-language-override: normal;
-moz-text-decoration-color: #FFF;
-moz-text-decoration-line: none;
-moz-text-decoration-style: solid;

}

.as {
	color: #393;
}

textarea {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;

}

select {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	padding:5px;
	
}

ul {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 15px;
	list-style-type: none;
	list-style-position: outside;
	padding-left:0px;
}

li {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 15px;
}

ol {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 15px;
	list-style-type: none;
	list-style-position: inside;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
	margin-left:auto;
	margin-right:auto;
	padding-left:0px;
}

.small {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	
}

.big {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 18px;
}

.bodystyle {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 20px;
}

.box1 {
	padding: 3px;
	border-width: thin;
	border-style: solid;
	border-radius: 5px;
	border-color: #c0c0c0;
	
}

.box2 {
	border-width: thin;
	border-style: solid;
	border-radius: 5px;
	border-color: #c0c0c0;
	padding: 3px;
	size: 5px;
}
.number
{border-width: medium;
	border-style:groove;
	padding: 3px;
	size: 5px;
	width:50px; 
}


	</style>
</head>

<body><div style="width:1232px;text-align: center">
<div style="height:auto;width: auto;background-color: #393;text-align: center;font-family: cursive;padding: 35px;color: #FFF;font-size:25px;margin-bottom: 10px;border: dashed;border-color:#FFF ">i-STOCK<font size='2'>v1.0<br>
<div style="float: left;"><?php echo'Date: '. $date_present. "   / Time: ".$time_present;?></div></font>
<div style="height: auto;width: auto;color: #FFFFFF;float: right;font-size: medium;font-family: serif;font-size: large;padding-right: 0px; " ><a style="color: #FFFFFF;text-decoration: none;" href="home.php">| Home |</a><a style="color: #FFFFFF;text-decoration: none;" href="profile.php" > Profile </a>
  <?php if($_SESSION['permission']=='admin'){echo ' <a class="titlebar" style="color: #FFFFFF;text-decoration: none;" href="session_act.php" >| Session Log |</a> <a class="titlebar" style="color: #FFFFFF;text-decoration: none;" href="members.php" > Users </a>';}?> 
<a class="titlebar" style="color: #FFFFFF;text-decoration: none;" href="header.php?link=1" >| Logout |</a></div></div>
</div>
</body>
</html>
