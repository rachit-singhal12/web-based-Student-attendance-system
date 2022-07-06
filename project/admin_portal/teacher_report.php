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
<style>
body{background-color : black; margin :0;}
table{background-color : white; }
th{background-color :lightgrey;}
a{text-decoration : none;
    }
</style>
</head>
<body>
<table  border=2px style="border-collapse : collapse; text-align : center;" cellpadding=10>
<tr>
	<th>SNo</th>
	<th>FirstName</th>
    <th>LastName</th>
    <th>UserId</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Address</th>
    <th>State</th>
    <th>Country</th>
    <th>City</th>
    <th>Qualification</th>
    <th>Operation</th>
</tr>
<?php 
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
	$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}
$rows = mysqli_num_rows($result);
if ($rows> 0) {
  while($row = mysqli_fetch_assoc($result)) {
?>
		<tr>
        	<td style="background-color :lightgrey;"><?php echo $temp+1; ?></td>
			<td><?php echo $row["FirstName"]; ?></td>
            <td><?php echo $row["LastName"]; ?></td>
            <td><?php echo $row["UID"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["Gender"]; ?></td>
            <td><?php echo $row["Mobile"]; ?></td>
            <td><?php echo $row["Address"]; ?></td>
            <td><?php echo $row["State"]; ?></td>
            <td><?php echo $row["Country"]; ?></td>
            <td><?php echo $row["City"]; ?></td>
            <td><?php echo $row["Qualifications"]; ?></td>
			<?php echo "<td><a href='update_teacher_details.php?id=$row[UID]'>MODIFY</a><br><a href='delete_teacher_details.php?id=$row[UID]' >DELETE</a></td>";?>
        </tr>
<?php
$temp++;	
			   }
} 			
?>
</table>
</body>
</html>