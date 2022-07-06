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

$code=$_GET['code'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	$sql = "SELECT * FROM subject WHERE subjectCode='$code'";
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
				<p style="padding : 15px;"><b>UPDATE SUBJECT DETAILS</b></p>
			</td>
	</tr>
	<tr >
	     <td>
		<form action="" method="post">
		<table cellpadding="5" cellspacing="2" >
		<tr>
		<td>Enter Subject Code
		</td>
		<td><input type="text" name="sc" value="<?php echo $row['subjectCode'];?>">
		</td>
		</tr>
		<tr>
		<td>Enter Class
		</td>
		<td><input type="text" name="class"  value="<?php echo $row['selectedClass'];?>">
		</td>
		</tr>
		<tr>
		<td>Enter Semester
		</td>
		<td><input type="text" name="sem"  value="<?php echo $row['selectedSemester'];?>">
		</td>
		</tr>
		<tr>
		<td>Teacher Name
		</td>
		<td><input type="text" name="tn"  value="<?php echo $row['selectedTeacher'];?>">
		</td>
		</tr>
		<tr>
		<td>Subject Name
		</td>
		<td><input type="text" name="sn"  value="<?php echo $row['subjectName'];?>">
		</td>
		</tr>
		<tr>
		<td style="text-align : "center";"><input type="submit" value="update" name="update">
		</td>
		<td style="text-align : "center";"><input type="reset">
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
	
	$sc = $_POST['sc'];
	$class = $_POST['class'];
	$sem = $_POST['sem'];
	$tn = $_POST['tn'];
	$sn = $_POST['sn'];

$sql2 = "UPDATE `subject` SET `subjectCode`='$sc',`selectedClass`='$class',`selectedSemester`='$sem',`selectedTeacher`='$tn',`subjectName`='$sn' WHERE subjectCode='$code';";
$result2 = mysqli_query($conn, $sql2);
if(!$result2){
	die("<center>2nd query cannot proceed</center>");
}
else
{echo "<center>data updated successfully</center>";
}}
?>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>