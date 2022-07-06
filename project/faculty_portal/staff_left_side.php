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
?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<style>
	body
	p{
		font-size : 20px;
		padding-top : 8px;
		padding-bottom : 8px;
		margin : 0;
	}
	a{
		text-decoration : none;
		color : white;
		padding-top : 8.5px;
		padding-bottom : 8.5px;
		padding-left : 30px;
		padding-right : 30px;
	}
	a:hover{
		width : 100%;
		color : black;
		background-color : white;
	}
	</style>
</head>
<body style="margin : 0; margin-top : 15px; background-color : red;" align="center">
			<p><img src="image/teacher.png" img="image loaded" width="100px" height="100px"></p>
			<p style="color : white;"><b>STAFF MENU</b></p>
			<p><a href="staff_profile.php" target="main">Home</a></p>
			<p><a href="student_report.php" target="main">Student Report</a></p>
			<p><a href="take_attendance.php" target="main">Take Attendance</a></p>
			<p><a href="view_attendance.php" target="main">View Attendance</a></p>
			<p><a href="student_attendance_report.php" target="main">Attendance Report</a></p>
			<p><a href="password.php"  target="main">Password</a></p>
			<p><a href="staff_logout.php" target="full">LogOut</a></p>
</body>
</html>