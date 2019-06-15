<?php

require 'config/Database.php';

session_start();
if(isset($_SESSION['username'])){
	header("Location: index.php");
}

if($_POST){
loginUser();
}

function loginUser(){
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(isRegistered($username, $password)){
		http_response_code(200);
		session_start();
		$_SESSION['username']= $username;
		header("Location: index.php");
		die();
	}
}

function isRegistered($username, $password){
	global $conn;
	$sql = "SELECT password FROM users WHERE username='$username'";
	$query = $conn->query($sql);
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	if (password_verify($password, $row['password'])) {
		return true;
	}else{
		return false;
	}
}

function errorMessageInJSON($text){
	return json_encode(array('error' => $text), JSON_UNESCAPED_UNICODE);
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/form.css">
		<script type="text/javascript" src="javascript/validation.js"></script>
	</head>
<div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
      <div class="login-form">

        <form class="sign-in-htm" name="login", id="login" method="post" action="lin.php">
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="user" name="username" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="passwd" name="password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign In" name="signIn">
          </div>
          <div class="hr"></div>
        </form>
		
		 <form class="sign-up-htm" name="register", id="register"  method="post" action="reg.php" onsubmit="return validate()">
		 <ul id="errors"></ul>
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="username" name="username" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="password" name="password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <label for="pass" class="label">Confirm Password</label>
            <input id="pass" name="pass" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign Up"  name="signUp">
          </div>
          <div class="hr"></div>
        </form>
      </div>
    </div>
  </div>
</html>
