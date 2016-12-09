<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	
</head>

<body>
<div style="width: auto;height:auto;border: solid;border-color:#393;margin-left: 370px;margin-right: 370px;padding: 0px"><div style="background-color: #FFFF80;font-size: 20pt;font-style: italic;text-align: center;"><strong>CREATE USER</strong></div>
<form action="members.php" method="POST" class="form">
<p style="text-align: center;">
<ol>	<li>Username<br><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" placeholder="username"></li><br>
	<li>Password<br><input type="password" name="pass1" value="<?php if(isset($_POST['pass1'])){echo $_POST['pass1'];}?>" placeholder="password"></li><br>
	<li>Permission<br><select name="permission">
	<option value="" ></option>
		<option value="admin">Admin</option>
		<option value="none">General user</option></li>	
	</select><br>
	<li>		<input type="submit" name="submit" value="create user"></li>

</p>
	
</form></ol></div>

</body>
</html>
