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
<!doctype html>
<html>
<head>
	<title>Admin Portal</title>
	<link rel="icon" type="image/x-icon" href="image/favicon.ico">
</head>
	<frameset cols="15%,*,15%" name="full">
	<frame src="" style="background-color : black;">
	<frameset rows="17%,*" class="frame_row">
		<frame name="heading" src="heading.html">
		<frameset cols="22%,*" class="frame_cols" >
			<frame name="left_side" src="left_side_admin.html" >
			<frame name="right_side" src="add_subject_code.php">
		</frameset>
		<frameset rows="17%,*"></frameset>
	</frameset>
	<frame src="" style="background-color : black;">
</frameset>
</html>