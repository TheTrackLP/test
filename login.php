<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="validate.php" method="post">
		<h2>LOGIN PAGE</h2><br>
		<label>Username</label></br>
		<input type="text" name="name"></br>
		<label>Password</label><br>
		<input type="password" name="pass"><br>
		<input type="submit" name="submit" value="Login">
		<?php if(isset($_SESSION['errorMessage'])){
		echo $_SESSION['errorMessage'];}unset($_SESSION['errorMessage']);
	?>
	</form>
</body>
</html>