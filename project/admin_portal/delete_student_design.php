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
$ids=$_GET['id'];

$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	$sql = "DELETE FROM student WHERE UID='$ids';";
$sql .="DELETE FROM login_table WHERE UID='$ids'";
$result = mysqli_multi_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}else{echo "Record deleted successfully";}
?>
<html>
<body>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>