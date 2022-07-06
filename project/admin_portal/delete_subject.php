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
	$sql = "DELETE FROM subject WHERE subjectCode='$code';";
$result = mysqli_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}else{echo "<center>Record deleted successfully</center>";}
?>
<html>
<body>
<br>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>