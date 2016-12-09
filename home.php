<?php
include 'header.php';
include 'connect.php';



if($_SESSION['permission']=="admin"){
	$msg= "<div style='color:#393;font-family:Andalus;font-size:20px'>welcome ".$_SESSION['user']." and your admin..!!</div>";
}
else{
	$msg="<div style='color:#393;font-family:Andalus;font-size:20px'>welcome ".$_SESSION['user']." ..!!</div> ";
}



?>
<html>
	
	<body>
		<br><div style="float: left;height: auto;width:180px;background-color: #393;margin:5px;border: dashed;border-width:2px;border-color:#FFF;padding-right: 5px;padding-left: 10px;padding-bottom: 5px;text-align: center;border-radius: 5px "><br>
		<div style="text-decoration: none;color: #FFF;text-align: center;"><strong>STOCK</strong></div>
		<a class="menu" href="display_product.php">|ENQUIRY|</a><a class="menu" href="stock_update.php">|UPDATE & ADD|</a>
		<a class="menu"  href="massadd.php">|MASS ADD|</a><a class="menu"  href="massupdate.php">|MASS LESS|</a>
		<a class="menu" href="safetylevel.php">|SAFETY LEVEL|</a>
		<a class="menu" href="stockhistroy.php">|HISTORY|</a><br>
		<?php if($_SESSION['permission']=='admin'){echo'<div style="text-decoration: none;color: #FFF;text-align: center;"><strong>PRODUCT</strong></div>	<a class="menu" href="product_task.php">|CREATION|</a><a class="menu"  href="populate.php">|INSERTION|</a><a class="menu" href="productspecification.php">|SPECIFICATION|</a>';}?></div><br><br>
		<div style="width: 400px;height: auto;font-family:Andalus;text-align: center;margin-left: 400px;" >
		<?php echo ' '.$msg.'<br><br>';?>    <strong style="text-decoration: underline;">products below safety level</strong>
		<form method="post" action="" style='text-align: center;'><br>
			Select Product:<select name="name" class="box1" >
		<option value=" "> </option>
		<?php
		$q="SELECT name FROM product_name";
		$r=mysqli_query($dbc,$q) or die();
		while($row=mysqli_fetch_assoc($r)){
			echo'<option value="' .$row['name']. '">'.$row['name'].'</option>';
		}
		?>
	
	</select>
<input type="submit" name="submit" value="check" >
		</form>
		</div>
		<?php $q1="SELECT color FROM product_color";
		$ncolor=mysqli_query($dbc,$q1);
		$q2="SELECT size FROM product_size";
		$nsize=mysqli_query($dbc,$q2);
		$q3="SELECT product_id FROM product_details";
		$nproduct=mysqli_query($dbc,$q3);
		$q4="SELECT name FROM product_name";
		$nname=mysqli_query($dbc,$q4);
		?>
		<div style="border: solid; font-family: Andalus; border-color: #393; width: 248px; text-align: center; position: !important;margin-left: 900px; margin-bottom: 100px; position: absolute; left: 40px; top: 149px; height: 234px;">
			<div style="background-color: #FFFF30;font-size: 18px;text-align: center;"><strong>IN USE</strong></div>
			<ol><li>No of colors:&nbsp;<?php echo mysqli_num_rows($ncolor);?></li><br>
			<li>No of size:&nbsp;<?php echo mysqli_num_rows($nsize);?></li><br>
			<li>No of Products:&nbsp<?php echo mysqli_num_rows($nname);?></li><br>
			<li>Total products:&nbsp<?php echo mysqli_num_rows($nproduct);?></li>
			</ol>	
		</div>
		
		
		<?php
		if(isset($_POST['submit'])&&$_POST['name']){
			$name=$_POST['name'];$inc=0;
			$check="SELECT size FROM size WHERE name='$name'";
			$re=mysqli_query($dbc,$check);
			echo'<div style="font-size:20px;text-align:center"><strong>'.$name.'</strong><div>';
			echo'<div style="text-align: center;"><table border="1" style="border:solid;border-width:2px;border-color:#80AF12;width:auto;margin-left:auto;margin-right:auto;" cellpadding="8" cellspacing="2" id="Table1"><tr>
<th>Color</th>
<th>Size</th>
<th>Stock</th></tr>';
			while($t=mysqli_fetch_assoc($re)){
				$size=$t['size'];
			
		$q="SELECT stock FROM safety_level WHERE name='$name' AND size='$size'";
		$r=mysqli_query($dbc,$q);
		while($e=mysqli_fetch_assoc($r)){
			$safety=$e['stock'];
		
		if(!empty($safety)){
		$q1="SELECT * FROM product_details WHERE stock<'$safety' AND name='$name' AND size='$size'";
		$r1=mysqli_query($dbc,$q1);
		if(mysqli_num_rows($r1)!=0){
		
while($row=mysqli_fetch_array($r1,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['color'].'</td>
<td>'.$row['size'].'</td>
<td>'.$row['stock'].'</td>
</tr>
<br>';$inc++;
}
}
}}}echo '</table> </div>';
if($inc==0){
	echo '<p style="text-align:center;color:#80AF12">NONE BELOW SAFETY LEVEL</p>';}}

		?></div><br><br><br><?php if(!isset($_POST['name'])){echo'<br><br><br><br>';}?>
		<?php include 'footer.php'; ?>
	</body>
		
</html>
