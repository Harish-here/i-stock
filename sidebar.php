<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php

include'connect.php';
?>
<html>
<head>
	<title>Untitled</title>
	<style>
		.menu
		{
	color: #FFF;
	background-color: #393;
	position: relative;
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
list-style-position: inside;
list-style-type: none;
padding-bottom: 0px;
padding-left: 5px;
padding-right: 5px;
padding-top: 1px;
text-decoration: none;
width: 200px;
height: auto;
border: solid;
border-width:1px;
border-color:#FFF;
-moz-font-feature-settings: normal;
-moz-font-language-override: normal;
-moz-text-decoration-color: #FFF;
-moz-text-decoration-line: none;
-moz-text-decoration-style: solid;

}
	</style>
</head>

<body>

<?php
		$q="SELECT name FROM product_name";$name[]=array();
		$side=mysqli_query($dbc,$q) or die();
		$inc=1;
		echo'<div style="background-color:#393;border:dashed;border-width:2px;width:auto;position:absolute;padding:3px;border-color:#FFF">';
		while($row=mysqli_fetch_assoc($side)){
			$name[$inc]=$row['name'];
			echo'<a class="menu" href="'.$_SERVER['PHP_SELF'].'?id='.$inc.'">'.$row['name'].'</a>';
			$inc++;
		}
		echo'</div>';
		?>
	
<?php

?>
</body>
</html>
