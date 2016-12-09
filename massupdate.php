<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
?><html>
<head>
	
</head>

<body>
<div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Mass Less</div><br>
<?php include'connect.php';include'sidebar.php';
if(isset($_GET['id'])){

$id=$_GET['id'];
$name=$name[$id];
}else{
	$name='product';
	}
	
	echo '<form action="" method="post">';
for($x=0;$x<1;$x++)
{
echo'<div style="text-algin:center;" >';echo'<h3 style="text-align:center;">'.$name."</font></h3>";
echo'<table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="6" cellspacing="2" id="Table1">
';
echo'<tr><th><strong>'.$name.'</strong></th>';
$q1="SELECT size FROM size WHERE name='$name'";
$r1=mysqli_query($dbc,$q1);$it=1;
while($row=mysqli_fetch_assoc($r1)){
	$size[$it]=$row['size'];
	echo'<th>'.$row['size'].'</th>';$it++;}
echo '</tr>';
$q="SELECT color FROM color WHERE name='$name' ";
$r=mysqli_query($dbc,$q);$it2=1;$value[][]=array();$u=1;echo'';
while($row=mysqli_fetch_assoc($r)){$color[$it2]=$row['color'];
	echo'<tr><th>'.$row['color'].'</th>';
	for($t=1;$t<=mysqli_num_rows($r1);$t++){$value[$t][$it2]=$u;
		echo'<td><input class="number" type="text" name='.$value[$t][$it2].' ></td>';$u++;
	}echo'</tr>';
	$it2++;
}
echo '</table><br><input type="submit" name="submit_update" value="update" style="margin-left:500px;">
<input type="hidden" name="update" value="';if(isset($name)){echo $name;}echo'"></form><br><hr></div>';
}

?>

</body>
</html>
<?php
if(isset($_POST['submit_update'])&&!empty($_POST['update'])){
	$w=1;
	$names=$_POST['update'];
	echo '<h3 style="text-decoration:underline;text-align:center"> LAST UPDATE IN '.$names.'</h3>';$username=$_SESSION['user'];
for($i=1;$i<=mysqli_num_rows($r);$i++){
  for($g=1;$g<=mysqli_num_rows($r1);$g++){
	
	for($p=0;$p<(mysqli_num_rows($r1)*mysqli_num_rows($r));$p++){
		if(isset($_POST[$w])&&!empty($size[$g])&&isset($size[$g])){
		$stck=$_POST[$w];
		$col=$color[$i];
		$siz=$size[$g];
		if(!empty($_POST[$w])&&is_numeric($_POST[$w])){
			$q="SELECT stock FROM product_details WHERE name='$names' AND color='$col' AND size='$siz'";
		$result=mysqli_query($dbc,$q);
		while($row=mysqli_fetch_assoc($result)){
			$stock=  $row['stock'] - $stck ;
			$bef=$row['stock'];
			$y="INSERT INTO stockhistroyupdate(idstockhistroy,name,product,color,size,stockbefore,stock,stockafter,datetime) VALUES(NULL,'$username','$names','$col','$siz','$bef','$stck','$stock',NOW())";
			$u=mysqli_query($dbc,$y) ;
			$q1="UPDATE product_details SET stock='$stock' WHERE name='$names' AND color='$col' AND size='$siz'";
			$re=mysqli_query($dbc,$q1);
			$t="SELCET stock FROM product_details WHERE name='$names' AND color='$col' AND size='$siz'" ;
			$y=mysqli_query($dbc,$t);
			while($row=mysqli_fetch_assoc($y)){
				$check=$row['stock'];
			}
			if($check)
			{echo '<div class="info">color: <strong style="color:#393">'.$col.'</strong> size: <strong>'.$siz.'</strong> stock reduced: <strong>'.$stck."</strong> availble stock = ".$stock."</div><br> ";
			}
			else{
				echo '<div class="exception">color: <strong style="color:#393">'.$col.'</strong> size: <strong>'.$siz.'</strong> stock reduced: <strong>'.$stck."</strong> availble stock = ".$stock."</div><br> ";
			}
			}
		}$w++;}
		else{
			echo "oops";}
		break;
	}
  }
		
}
}
if(mysqli_num_rows($r)<=5){
for($u=0;$u<(mysqli_num_rows($side)/2.5);$u++){
	echo'<br><br><br>';}
}else{
	for($u=0;$u<6;$u++){echo'<br><br>';}
	
}

include'footer.php';
?>