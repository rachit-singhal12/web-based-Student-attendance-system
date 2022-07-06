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
	<th>Subject Code</th>
    <th>Subject Class</th>
    <th>Subject Semester</th>
    <th>Subject Teacher</th>
    <th>Subject Name</th>
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
	$sql = "SELECT * FROM subject";
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
			<td><?php echo $row["subjectCode"]; ?></td>
            <td><?php echo $row["selectedClass"]; ?></td>
            <td><?php echo $row["selectedSemester"]; ?></td>
            <td><?php echo $row["selectedTeacher"]; ?></td>
            <td><?php echo $row["subjectName"]; ?></td>
			<?php echo "<td><a href='update_subject.php?code=$row[subjectCode]'>MODIFY</a><br><a href='delete_subject.php?code=$row[subjectCode]' >DELETE</a></td>";?>
        </tr>
<?php
$temp++;	
			   }
} 		
?>
</table>
</body>
</html>