<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>i-STOCK</title>
	<style>
		@charset "utf-8";
body {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	width: 1232px;
}

td {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

th {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

form {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	}

input {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	border-radius:1px;
	padding-right: 2px;
	padding-left:2px;
	margin-top: 5px;
}

textarea {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

select {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

ul {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	list-style-type: disc;
	list-style-position: outside;
}

li {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

ol {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	list-style-type: upper-roman;
	list-style-position: outside;
}

.small {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 9px;
}

.big {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 18px;
}

.bodystyle {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

.box1 {
	padding: 3px;
	border-width: 1px;
	border-style: solid;
	border-radius: 5px;
	border-color: #c0c0c0;
	
}

.box2 {border-radius: 5px;
	border-color: #c0c0c0;
	border-width: 3px;
	border-style: solid;
	padding: 5px;
}

	</style>
</head>
<body>
<?php
date_default_timezone_set('Asia/Kolkata');
$date_present= date('d M y');$time_present=strftime("%H:%M %p");
?><div style="height:auto;width: auto;background-color: #393;text-align: center;font-family: cursive;padding: 30px;color: #FFF;font-size:25px;margin-bottom: 10px;border: dashed;border-color:#FFF ">i-STOCK<font size='2'>v1.0<br><div style="float: left;"><?php echo'DATE: '. $date_present. "   / Time: ".$time_present."";?></div></font></div>
</body>
</html>
