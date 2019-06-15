<?php 
  $host = 'localhost';
  $db_name = 'PCHMI';
  $username = 'root';
  $password = '';
  // $host = 'mysql';
  // $db_name = 'project';
  // $username = 'root';
  // $password = 'password';

  $con = mysqli_connect($host,$username,$password,$db_name);
 
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>