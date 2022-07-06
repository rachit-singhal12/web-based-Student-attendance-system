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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<style>
		body{margin : 0;}
	</style>
</head>
<body style="background-color: black;">
	<div>
		<table border=2px style="border-collapse: collapse; font-size : 20px; background-color: white" cellpadding=20>
			
			<tr style="background-color : grey; color : white;">
			<th>Student Name</th>
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

			
			$sql = "SELECT * FROM student";
		
			$result = mysqli_query($conn, $sql);
			if(!$result){
				die("query cannot proceed");
			}
			while($row = mysqli_fetch_assoc($result)){
			$uids=$row['UID'];
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
				$sql2= "SELECT * FROM attendance WHERE subjectCode='$sc' AND studentuid='$uids'";
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
					<td><?php echo $row['FirstName'].' '.$row['LastName'];?></td>
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
			}}
			?>
		</table>
	</div>
</body>
</html>