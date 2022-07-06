<?php
session_start();

$uid = $_SESSION['stuid'];

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
	<title>Student portal</title>
	<link rel="icon" type="image/x-icon" href="image/favicon.ico">
</head>
<frameset cols="15%,*,15%" name="full">
	<frame src="" style="background-color : black;">
	<frameset rows="20.5%,*">
		<frame src="heading.html" name="heading">
		<frameset cols="25%,*">
			<frame src="left_side.html" name="nav_bar">
			<frame src="student_home.php" name="main">
		</frameset>
	</frameset>
	<frame src="" style="background-color : black;">
</frameset>
</html>