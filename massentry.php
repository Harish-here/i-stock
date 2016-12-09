<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include 'header.php';
include 'connect.php';$color =array();$size=array();

if(isset($_POST['name'])){
	$name=$_POST['name'];
}
?><html>
<head>
	
</head>

<body>
	<form action="" method="post">
		Name:<select name="name">
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
		</select>
		<input type="submit" name="submit" value="show">
	</form>

<?php

echo '<form action="" method="post">';
if(isset($_POST['name'])){$name=$_POST['name'];
for($x=0;$x<1;$x++)
{
echo'<div style="text-algin: center;">
<table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
';
echo'<tr><td><strong>'.$name.'</strong></td>';
$q1="SELECT size FROM product_size";
$r1=mysqli_query($dbc,$q1);$it=1;
while($row=mysqli_fetch_assoc($r1)){
	$size[$it]=$row['size'];
	echo'<th>'.$row['size'].'</th>';$it++;}
echo '</tr>';
$q="SELECT color FROM product_color ";
$r=mysqli_query($dbc,$q);$it2=1;$value[][]=array();$u=1;echo'';
while($row=mysqli_fetch_assoc($r)){$color[$it2]=$row['color'];
	echo'<tr><th>'.$row['color'].'</th>';
	for($t=1;$t<=mysqli_num_rows($r1);$t++){$value[$t][$it2]=$u;
		echo'<td><input type="text" name='.$value[$t][$it2].' ></td>';$u++;
	}echo'</tr>';
	$it2++;
}
echo '</table><br><input type="submit" name="submit_update" value="update">
<input type="hidden" name="update" value="';if(isset($name)){echo $name;}echo'"></form>';
}}
if(isset($_POST['submit_update'])&&!empty($_POST['update'])){$w=1;$name=$_POST['update'];echo $_POST['update'];

for($i=1;$i<=3;$i++){
  for($g=1;$g<=3;$g++){
	
	for($p=0;$p<3;$p++){$stck=$_POST[$w];$col=$color[$i];$siz=$size[$g];
		if(!empty($_POST[$w])){$q="SELECT stock FROM product_details WHERE name='$name' AND color='$col' AND size='$siz'";
		$result=mysqli_query($dbc,$q);
		while($row=mysqli_fetch_assoc($result)){
			$stock=  $row['stock'] + $stck ;
			$q1="UPDATE product_details SET stock='$stock' WHERE name='$name' AND color='$col' AND size='$siz'";
			$re=mysqli_query($dbc,$q1);
		}}$w++;
		break;
	}
  }
		
}
}else{echo "oops";}

?>
</body>
</html>
<?php

include'footer.php';
?>
