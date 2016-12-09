<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include'header.php';
include 'connect.php';
?>
<html>
<head>
	
</head>
<body>
<div style="text-align: center;color:#393;text-decoration: underline;font-size: 20px">Session Log</div><br>
<?php

$q="SELECT name,date_time FROM session_log ORDER BY idsession_log DESC LIMIT 0,10";
$r=mysqli_query($dbc,$q);
echo'<div style="text-algin: center;"><table border="1" style="width:auto;margin-left:auto;margin-right:auto;" cellpadding="10" cellspacing="2" id="Table1">
<tr>
<th>Name</th>
<th>Date & Time</th></tr>';
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
echo'<tr><td>'.$row['name'].'</td>
<td>'.$row['date_time'].'</td>
</tr>
';
}
echo '</table> </div>';

include'footer.php';
?>

</body>
</html>
