<?php
session_start();
	$user =$_POST['username'];
	$pass = $_POST['password'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	else{
		if( isset( $_POST['submit'] ) ){
	$query= "SELECT * FROM login_table WHERE UID='$user' AND PASS='$pass';";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row == 0) {
		header("Location: http://localhost/project/admin_login_page/admin_login_page.html");
  		}
 	else {
		$_SESSION["id"]=$user;
  		header("Location: http://localhost/project/admin_portal/admin_portal.php");
	}
	}
	else{
		header("Location: http://localhost/project/front_page/code1.html");
	}
	}
?>