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
	<div style="background-color : red; padding : 0.1px;">
	<h1 style="color :white;"><b><center>Welcome to Attendace Portal</center></b></h1>
	</div>
	
	<div align="center" style="padding-top : 30px;">
		<table border=2px style="border-collapse: collapse; font-size : 20px;" cellpadding=20>
			<tr>
			<td colspan=4 align="center" style="background-color : grey; color : white;"><b>My Attendance</b></td>
			</tr>
			<tr>
			<th>Subject Code</th>
			<th>Total<br></th>
			<th>Present<br></th>
			<th>Absent<br></th>
			</tr>
			<?php
			$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}

			
			$sql = "SELECT * FROM student WHERE UID='$uid'";
		
			$result = mysqli_query($conn, $sql);
			if(!$result){
				die("query cannot proceed");
			}
			$row = mysqli_fetch_assoc($result);
			$sem = $row['semester'];
			$course = $row['Course'];
			
			$sql1 = "SELECT * FROM subject WHERE selectedSemester='$sem' AND selectedClass='$course'";
			$result1 = mysqli_query($conn, $sql1);
			if(!$result1){
				die("query cannot proceed");
			}
			while($row1 = mysqli_fetch_assoc($result1))
			{
				$sc = $row1['subjectCode'];
				$sql2= "SELECT * FROM attendance WHERE subjectCode='$sc' AND studentuid='$uid'";
				$result2 = mysqli_query($conn, $sql2);
				if(!$result2){
					die("query cannot proceed");
				}
				$p=0;
				$a=0;
				$total=0;
				while($row2 = mysqli_fetch_assoc($result2))
				{
					$total++;
					if($row2['attendanceStatus']=="p")
					{
						$p++;
					}
					else{$a++;}
				}
				?>
				<tr>
					<td><?php echo "$sc";?>
					</td>
					<td><?php echo "$total";?>
					</td>
					<td><?php echo "$p";?>
					</td>
					<td><?php echo "$a";?>
					</td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</body>
</html>