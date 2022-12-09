<?php
	$username = $_POST['name'];
	$password = $_POST['pass'];

	$user = false;

	$userile = fopen('users.txt', 'r');

	while (!feof($userile)) {
		$textfile = fgets($userile);
		$usser = explode(',', $textfile);

		if(strcmp(trim($usser[1]),$username) == 0 && strcmp(trim($usser[2]),$password) == 0){
			session_start();
			$_SESSION['logged'] = $usser[0];
			$user = true;
			break;

		}
	}
	if($user==true){
		header('location: main.php');
	}else{
		header('location: login.php');
	}
?>