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
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modify Teacher</title>
	<style>
	body{
		margin :0px;
		background-image : url("image/student_bg.jpg");
	}
	table{	
		font-size : 20px;
	}
	.outer_table{
		margin-top : 30px;
		margin-bottom : 30px;
	}
	input{
		padding : 10px;
		padding-left:5px;
		padding-right:100px;
		}
	</style>
</head>
<?php

$ids=$_GET['id'];

$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	$sql = "SELECT * FROM teacher WHERE UID='$ids'";
$result = mysqli_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}
$rows = mysqli_num_rows($result);
if ($rows> 0) {
  $row = mysqli_fetch_assoc($result);
?>
<body>
	<div class="teacher_form" align=center >
	<table  class="outer_table" cellspacing=10 style="background-color : white;">
	<tr>
			<td  align=center style="font-size : 35px; color : red;">
				<p style="padding : 15px;"><b>UPDATE TEACHER DETAILS</b></p>
			</td>
	</tr>
	<tr >
	     <td>
		<form action="" method="post">
		<table cellspacing=10 cellpadding=2 class="inner_table">	
		<tr>
		<td >
			<label>First Name</label>
		</td>
		<td>
			<input type="text" placeholder="First Name" name="fname"  value="<?php echo $row['FirstName']; ?>" required>
		</td>
		</tr>
		<tr><td>
		<label>Last Name</label>
		</td>
		<td>
			<input type="text" placeholder="Last Name" name="lname" value="<?php echo $row['LastName']; ?>" required>
		</td>
		</tr>
		<tr>
		<td >
			<label>User id</label>
		</td>
		<td>
			<input type="text" placeholder="User id" name="userid" value="<?php echo $row['UID']; ?>" required>
		</td>
		</tr>
		<tr><td>
		<label>Email Id</label>
		</td>
		<td>
			<input type="email" placeholder="abc@gmail.com" name="email" value="<?php echo $row['Email']; ?>" required>
		</td>
		</tr>
		<tr><td>
		<label>Mobile No.</label>
		</td>
		<td>
			<input type="text" maxlength="10" minlength="10" name="mobile" value="<?php echo $row['Mobile']; ?>" required>
		</td>
		</tr>
		<tr><td>
		<label>Address</label>
		</td>
		<td>
			<textarea cols="35" rows="4" name="address"  style="resize : none"><?php echo $row['Address'];?></textarea>
		</td>
		</tr>
		<tr><td>
		<label>City</label>
		</td>
		<td>
			<input type="text" name="city" value="<?php echo $row['City']; ?>">
		</td>
		</tr>
		<tr><td>
		<label>State</label>
		</td>
		<td>
			<input type="text" name="state" value="<?php echo $row['State']; ?>">
		</td>
		</tr>
		<tr><td>
		<label>Country</label>
		</td>
		<td>
			<input type="text" name="country" value="<?php echo $row['Country']; ?>">
		</td>
		</tr>
		<tr><td>
			<input style="padding : 10; font-size : 15px; background-color : lightblue;" type="submit" value="update" class="buttons" name="update">
		</td>
		<td>
			<input style="padding : 10; font-size : 15px; background-color : lightblue;" type="reset" class="buttons">
		</td>
		</tr>
		</table>
		</form>  
	</tr>
	</table>
	</div>

<?php	
}			
?>
<?php
if(isset($_POST['update'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
$sql2 = "UPDATE `teacher` SET `FirstName`='$fname',`LastName`='$lname',`Email`='$email',`Mobile`='$mobile',`Address`='he',`City`='$city',`State`='$state',`Country`='$country' WHERE UID='$ids';";
$sql2 .= "UPDATE login_table SET `FN`='$fname',`LN`='$lname' WHERE UID='$ids';";
$result2 = mysqli_multi_query($conn, $sql2);
if(!$result2){
	die("2nd query cannot proceed");
}
else
{echo "<center>data updated successfully</center>";
}}
?>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>