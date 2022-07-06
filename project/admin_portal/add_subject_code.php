<?php
session_start();

$uid = $_SESSION["id"];

if($uid == true)
{
	
}
else
{
	header("location: http://localhost/project/admin_login_page/admin_login_page.html");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<style>
		body{margin : 0;}
	</style>
</head>
<body>
	<div style="background-color : lightblue; padding : 0.1px;">
	<h1><b><center>ADD SUBJECT</center></b></h1>
	</div>
	<div align="center" style=" padding-top : 50px; text-align : "center"; font-size : "20px";" >
	<form action="" method="post">
	<table cellpadding="5" cellspacing="2" >
		<tr>
		<td>Enter Subject Code
		</td>
		<td><input type="text" name="sc" required>
		</td>
		</tr>
		<tr>
		<td>Enter Class
		</td>
		<td><input type="text" name="class" required>
		</td>
		</tr>
		<tr>
		<td>Enter Semester
		</td>
		<td><input type="text" name="sem" required>
		</td>
		</tr>
		<tr>
		<td>Teacher Name
		</td>
		<td><input type="text" name="tn" required>
		</td>
		</tr>
		<tr>
		<td>Subject Name
		</td>
		<td><input type="text" name="sn" required>
		</td>
		</tr>
		<tr>
		<td style="text-align : "center";"><input type="submit" name="submit">
		</td>
		<td style="text-align : "center";"><input type="reset" name="">
		</td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$fname = $_POST['sc'];
	$lname = $_POST['class'];
	$id = $_POST['sem'];
	$fathername = $_POST['tn'];
	$email = $_POST['sn'];

	//checking connections
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}

		$query = "INSERT INTO subject VALUES('$fname','$lname','$id','$fathername','$email');";
		$data = mysqli_query($conn,$query);
		if($data)
		{
			echo "<center>Inserted Successfully</center>";
		}
		else
		{echo "<center>failed to insert<center>";}
	
}
?>