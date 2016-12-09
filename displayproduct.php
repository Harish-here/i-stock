<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php global $mode;
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['submit'])){
if(isset($_POST['name'])&&isset($_POST['color'])&&isset($_POST['size'])&&isset($_POST['stock']))
{
	if($_POST['name']==" ")
	{
		if($_POST['color']==" ")
		{
			if($_POST['size']==" "&&empty($_POST['stock']))
			{
				$mode='all';//all stock will be displayed mode_1
			}else{
				if(empty($_POST['stock']))
			 {
				$mode='specific_size';//product that matches the size specified mode_2
			 }else{if($_POST['size']==" "){
				$mode='specific_stock';}else{$mode='specific_size_stock';}//mode_3
			 }
			}
		}
		else{
			if($_POST['size']==" "&&empty($_POST['stock']))
			{
				$mode='specific_color';//mode_4
			}
			else{
				if(empty($_POST['stock']))
				{
					$mode='specific_color_size';//mode_5
				}
				else{
					if($_POST['size']==" ")
					{
						$mode='specific_color_stock';//mode_6
					}
					else{
						$mode='specific_color_size_stock';//mode_7
					}
				}
			}
		}
	}
	else
	{if($_POST['color']==" ")
		{
			if($_POST['size']==" "&&empty($_POST['stock']))
			{
				$mode='specific_name';//mode_8
			}else{
				if(empty($_POST['stock']))
				{
				$mode='specific_name_size';//mode_9	
				}else
				{
					if($_POST['size']==" ")
					{
						$mode='specific_name_stock';//mode_10
					}else{
				$mode='specific_name_size_stock';//mode_11
					}
				}
				
			}
		}
		else{
			if($_POST['size']==" "&&empty($_POST['stock']))
			{
				$mode='specific_name_color';//mode_12
			}else{
				if(empty($_POST['stock']))
				{
					$mode='specific_name_color_size';//mode_13
				}
				else{
					if($_POST['size']==" ")
				  {
					$mode='specific_name_color_stock';//mode_14
				  }else{
					$mode='specific_name_color_size_stock';//mode_15
				  }
				}
				
			}
		}
		
	}
}
	
}else{echo "oops";}}
function display_product($mode)
{include'connect.php';
	$name=(isset($_POST['name']))? trim($_POST['name']):" ";
	$color=(isset($_POST['color']))? trim($_POST['color']):" ";
	$size=(isset($_POST['size']))? trim($_POST['size']):" ";
	$stock=(isset($_POST['stock']))? trim($_POST['stock']):" ";
	$condition=(isset($_POST['condition']))?trim($_POST['condition']):" ";
switch($mode)
{
	case 'all' : if(empty($name)&&empty($color)&&empty($size)&&empty($stock)){$q= "SELECT name,color,size,stock FROM product_details";
$r=mysqli_query($dbc,$q);
echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

 case 'specific_color':if(!empty($color)){ $q1="SELECT name,color,size,stock FROM product_details WHERE color='$color'";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_stock':if(!empty($stock)){
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="4" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_color_stock':if(!empty($color)&&!empty($stock)){
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE color='$color' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE color='$color' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE color='$color' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

case 'specific_size':if(!empty($size)){ $q1="SELECT name,color,size,stock FROM product_details WHERE size='$size'";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_size_stock':if(!empty($size)&&!empty($stock)){ if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE size='$size' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE  size='$size' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE size='$size' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

 case 'specific_name':

echo'<div style="text-align: center;">
<table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
';
echo'<tr><th><strong>'.$name.'</strong></th>';
$q1="SELECT size FROM size WHERE name='$name'";
$r1=mysqli_query($dbc,$q1);$it=1;
while($row=mysqli_fetch_assoc($r1)){
	$size[$it]=$row['size'];
	echo'<th>'.$row['size'].'</th>';
$it++;}echo '</tr>';
$q="SELECT color FROM color WHERE name='$name'";
$r=mysqli_query($dbc,$q);$it2=1;$value[][]=array();$u=1;
while($row=mysqli_fetch_assoc($r)){$color[$it2]=$row['color'];
	echo'<tr><th>'.$row['color'].'</th>';
	for($t=1;$t<=mysqli_num_rows($r1);$t++){$y="SELECT stock FROM product_details WHERE name='$name' AND color='$color[$it2]' AND size='$size[$t]'";$i=mysqli_query($dbc,$y);
		if(mysqli_num_rows($i)==1){while($l=mysqli_fetch_assoc($i)){
			echo'<td>'.$l['stock'].'</td>';$u++;}
			}else{echo'<td> - </td>';}
	}echo'</tr>';
	$it2++;
}
echo'</table><br>';
break;

 case 'specific_name_stock':if(!empty($name)&&!empty($stock)){ 
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE name='$name' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;


case 'specific_name_size':if(!empty($size)&&!empty($name)){ $q1="SELECT name,color,size,stock FROM product_details WHERE size='$size' AND name='$name' ";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_name_size_stock':if(!empty($name)&&!empty($size)&&!empty($stock)){
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE name='$name' AND size='$size' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND size='$size' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND size='$size' AND stock='$stock'";}}
	$result=mysqli_query($dbc,$q1);
				 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

case 'specific_name_color':if(!empty($color)&&!empty($name)){ $q1="SELECT name,color,size,stock FROM product_details WHERE color='$color' AND name='$name' ";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_name_color_stock':if(!empty($color)&&!empty($name)&&!empty($stock)){ 
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE name='$name' AND color='$color' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND color='$color' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND color='$color' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;


case 'specific_color_size':if(!empty($color)&&!empty($size)){ $q1="SELECT name,color,size,stock FROM product_details WHERE color='$color' AND size='$size' ";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
case 'specific_color_size_stock':if(!empty($color)&&!empty($size)&&!empty($stock)){ 
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHERE size='$size' AND color='$color' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE size='$size' AND color='$color' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE size='$size' AND color='$color' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

case 'specific_name_color_size':if(!empty($color)&&!empty($size)&&!empty($name)){ $q1="SELECT name,color,size,stock FROM product_details WHERE color='$color' AND size='$size' AND name='$name' ";
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;

case 'specific_name_color_size_stock':if(!empty($color)&&!empty($size)&&!empty($name)&&!empty($stock)){ 
if($condition=='>'){
	$q1= "SELECT name,color,size,stock FROM product_details WHEREname='$name' AND size='$size' AND color='$color' AND stock>='$stock'";}
	else{if($condition=='<'){
		$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND size='$size' AND color='$color' AND stock<='$stock'";}
		else{$q1="SELECT name,color,size,stock FROM product_details WHERE name='$name' AND size='$size' AND color='$color' AND stock='$stock'";}}
	                 $r1=mysqli_query($dbc,$q1);
			 echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';
}}echo '</table> </div>';
break;
default:echo "none is executed";break;

}}

?>

