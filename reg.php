<?php
session_start();
if(isset($_SESSION['username'])){
	header("Location: index.html");
}

if($_POST){
	try{
		$conn = new PDO('mysql:host=localhost;dbname=database', 'root', '',	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}catch(PDOexception $e){
		$error_msg = $e -> getMessege();
		echo $error_msg;
		exit();
	}
registerUser();
}


function registerUser(){
	global $conn;
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	if(isAllreadyRegistered($username)){
		http_response_code(400);
		die(errorMessageInJSON('Username is taken!'));
	}
	$sql = "INSERT INTO `hotel` VALUES ('$username','$password')";
	$query = $conn->query($sql) or die('Request unsuccessful');
	
	session_start();
	$_SESSION['username'] = $username;
	header("Location: index.php");
	die();
}

function isAllreadyRegistered($username){
	global $conn;
	 $sql = "SELECT * FROM hotel WHERE username='$username'";
	 $query = $conn->query($sql) or die(errorMessageInJSON('Request unsuccessful'));
	 $row = $query->fetch(PDO::FETCH_ASSOC);
	 if(!$row){
		return false;
	 }else{
		return true;
	 }
}

function errorMessageInJSON($text){
	return json_encode(array('error' => $text), JSON_UNESCAPED_UNICODE);
}
?>