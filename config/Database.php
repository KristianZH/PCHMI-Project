<?php 
  $host = 'localhost';
  $db_name = 'pchmi';
  $username = 'root';
  $password = '';
  // $host = 'mysql';
  // $db_name = 'project';
  // $username = 'root';
  // $password = 'password';

  try{
		$conn = new PDO('mysql:host=localhost;dbname=pchmi', 'root', '',	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}catch(PDOexception $e){
		$error_msg = $e -> getMessege();
		echo $error_msg;
		exit();
	}
?>