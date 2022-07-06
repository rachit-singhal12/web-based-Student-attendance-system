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
	<h1><b><center>ADD STUDENT</center></b></h1>
	</div>
</body>
</html>