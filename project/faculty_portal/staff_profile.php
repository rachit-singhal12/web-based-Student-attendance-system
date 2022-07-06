<?php
session_start();

$uid = $_SESSION['teacid'];

if($uid == true)
{
	
}
else
{
	header("location: http://localhost/project/front_page/code1.html");
}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	$temp=0;
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	$temp = 0;
	$sql = "SELECT * FROM teacher WHERE UID='$uid'";
$result = mysqli_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}
$rows = mysqli_num_rows($result);
if ($rows> 0) {
  $row = mysqli_fetch_assoc($result);
?>
<html>
<head>
	<style>
	body{margin : 0;}
	
	</style>
</head>
<body>
	<div align="center" style="background-color : red; padding :0.1px;">
	<h1 style="color : white">My Profile</h1>
	</div>
	<div style="padding-top : 25px;" align="center" >
		<table cellpadding=12 cellspacing=5 align="center">
			<tr  style="background-color : MidnightBlue;color : white;">
				<th>NAME</th>
				<th>USERID</th>
				<th>EMAIL</th>
				
			</tr>
			<tr style="padding-bottom : 20px">
				<td><?php echo $row["FirstName"]." ".$row["LastName"]; ?></td>
				<td><?php echo $row["UID"]; ?></td>
				<td><?php echo $row["Email"]; ?></td>
			</tr>
			<tr style="background-color : MidnightBlue;color : white;">
				<th>GENDER</th>
				<th>PHONE</th>
				<th>ADDRESS</th>
			</tr>
			<tr>
				<td><?php echo $row["Gender"]; ?></td>
				<td><?php echo $row["Mobile"]; ?></td>
				<td><?php echo $row["Address"]; ?></td>
			</tr>
			<tr style="background-color : MidnightBlue;color : white;">
				<th>STATE</th>
				<th>COUNTRY</th>
				<th>QUALIFICATION</th>
			</tr>
			<tr>
				<td><?php echo $row["State"]; ?></td>
				<td><?php echo $row["Country"]; ?></td>
				<td><?php echo $row["Qualifications"]; ?></td>
			</tr>
			<tr style="background-color : MidnightBlue;color : white;">
				<th>CITY</th>
			</tr>
			<tr>
				<td><?php echo $row["City"]; ?></td>
			</tr>
		</table>
	</div>
</body>
</html>
<?php }
?>