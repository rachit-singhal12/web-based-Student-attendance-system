<?php 
session_start();
if(isset($_POST['studentlogin']))
{
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
	$query= "SELECT * FROM student WHERE UID='$user' AND Password='$pass'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row == 0) {
   		die("Wrong user id and password");
  		}
 	else {
		$_SESSION['stuid'] = $user;
  		header("Location: http://localhost/project/student_portal/student_portal.php");
	}
	}
}
else{
	header("location: http://localhost/project/front_page/code1.html");
}
?>