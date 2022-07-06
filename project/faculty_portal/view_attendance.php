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


	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}


	$sql = "SELECT * FROM attendance";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die("query cannot proceed");
	}
	$rows = mysqli_num_rows($result);
?>
<html>
<body style="margin : 0;background-color: black;">
	<table cellpadding=15 cellspacing=10 style="border-collapse : collapse;background-color: white;" border="2px">
		<tr style="background-color : grey; color :white">
			<th>S.no.</th>
			<th>Date</th>
			<th>Student Name</th>
			<th>Student id</th>
			<th>Subject Code</th>
			<th>Status</th>
		</tr>
<?php
	if ($rows> 0) {
		$t=0;
		while($row = mysqli_fetch_assoc($result))
		{
			$t++;
			?>
		<tr>
			<td><?php echo $t?></td>
			<td><?php echo $row['date']?></td>
			<td><?php echo $row['studentName']?></td>
			<td><?php echo $row['studentuid']?></td>
			<td><?php echo $row['subjectCode']?></td>
			<td><?php $temps   = $row['attendanceStatus'];
					if($temps=='p')
					{
						echo "<div style='background-color : lightgreen;padding-right : 10px;padding-left : 10px;'><p>Present</p></div>";
					}
					else{
						echo "<div style='background-color : #ff4d4d;padding-right : 10px;padding-left : 10px;'><p>Absent</p></div>";
					}?></td>
		</tr>
</html>
<?php
		}
		?>
	
		</table>
		</body>'
		<?php 
	}
	else
	{
		echo "No data found";
	}
?>
