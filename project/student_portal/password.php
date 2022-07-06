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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		fieldset {
	align: center;
	  
}
legend {
			background-color: red;
			color: white;
			padding-top : 5px;
			padding-left: 12px;
			padding-right : 12px;
			padding-bottom :5px ;
			font-size : 30px;
}
input {
	margin-top : 10px;
	padding-left : 30px;
	padding-top : 5px;
	padding-bottom : 5px;
}
	
	</style>
</head>
    <body>
              <fieldset>
	<legend>PASSWORD</legend>
	<form style="font-size : 20px;" action="" method="post">
                  <table>
                      
                      <tr>
                        <td> New Password</td>
                        <td><input type="password" name="newpass"></td>
                      </tr>
                      <tr>
                        <td> Confirm Password</td>
                        <td><input type="password" name="repass"></td>
                      </tr>
                      <tr>
                        <td><input type="submit" style="padding : 4px;background-color : red; color: white;" name="buttons" value="CHANGE PASSWORD">
                        </td>
                    </tr>
                  </table>
    </form>
    </fieldset>
    </html>
<?php
if(isset($_POST['buttons'])){
	
	$np = $_POST['newpass'];
	$rp = $_POST['repass'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
	
	if($np==$rp){	
	$sql = "UPDATE login_table SET PASS='$np' WHERE UID='$uid';";
	$sql .= "UPDATE student SET Password='$np' WHERE UID='$uid';";
	$result = mysqli_multi_query($conn, $sql);
	if(!$result){
		die("query cannot proceed");
	}
	else{echo "<center>Password changed successfully</center>";}
	}
else{
	echo "<center> Please input password properly</center>";
}
}
?>