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
<html>
<body style="margin : 0">
<div style="background-color : grey;color : white;padding : 6px;">
	<center><h1 atyle="padding : 10px;">ATTENDANCE</h1></center></div>
<div style="padding-top : 30px">
	<form action="" method="post">
	<table>
	<tr>
		<td><label>Enter Subject Code</label><br><br>
		</td>
		<td><input type="text" name="subjectcode" required><br><br>
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Take Attendance" name="submit">
		</td>
		<td><input type="reset" >
		</td>
	</tr>
	</table>
	</form>
</div>

<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}

if(isset($_POST['submit']))
{
	$code = $_POST["subjectcode"];
	$codesem = 0;
	$class = 0;
	
	
	$sql = "SELECT * FROM subject WHERE subjectCode='$code'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die("query cannot proceed");
	}
	$rows = mysqli_num_rows($result);
	if ($rows> 0) {
		$row = mysqli_fetch_assoc($result);
		$codesem = $row['selectedSemester'];
		$class = $row['selectedClass'];
	}
	else
	{
		echo "No match for this code is found";
	}
	
	$temp=1;
	
	$sql2 = "SELECT * FROM student WHERE semester='$codesem' AND Course='$class'";
	$result2 = mysqli_query($conn, $sql2);
	if(!$result2){
		die("query cannot proceed");
	}
	$rows2 = mysqli_num_rows($result2);
	if ($rows2> 0) {
		?>
		<br><br>
		<div><form action="" method="post">
		<center><input type="text" name="subcode" required placeholder="Enter Subject Code"></center><br>
			<table cellpadding=10 cellspacing=10 style="border-collapse : collapse;">
			<tr style="background-color : grey; color :white">
				<th >S.no.</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>User id</th>
				<th>Semester</th>
				<th>Course</th>
				<th>Status</th>
			</tr>
		
		<?php
		while($row2 = mysqli_fetch_assoc($result2))
		{
			$id = $row2["UID"];
				?>
				<tr>
				<td  style="background-color : grey; color :white"><?php echo $temp; ?></td>
				<td><?php echo $row2["FirstName"]." ".$row2["LastName"]; ?></td>
				<td><?php echo $row2["RollNo"]; ?></td>
				<td><?php echo $row2["UID"]; ?></td>
				<td><?php echo $row2["semester"]; ?></td>
				<td><?php echo $row2["Course"]; ?></td>
				<td><input type="checkbox" name="status[]" value='<?php echo $row2["UID"]; ?>' checked> </td>
				</tr>
				<?php
				$temp++;
		}
		?>
			<tr><td colspan=7 align="center">
			<input type="submit" name="subatt">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="reset" ></td>
			</tr>
			</table>
			</form>
		</div>
		<?php
	}
	else
	{
		echo "No match for this code is found";
	}
}
?>
<?php
if(isset($_POST['subatt']))
{
	$uid =0;
	$name = 0;
	$currdate = date('Y-m-d H:i:s');
	$code = $_POST["subcode"];
	$attstatus = $_POST["status"];
	//fechng subject details
	$sql5 = "SELECT * FROM subject WHERE subjectCode='$code'";
	$result5 = mysqli_query($conn, $sql5);
	if(!$result5){
		die("query cannot proceed");
	}
	$row5 = mysqli_fetch_assoc($result5);
	$sem = $row5['selectedSemester'];
	$course = $row5['selectedClass'];

	//fetching students
	$sql6 = "SELECT * FROM student WHERE semester='$sem' AND Course='$course'";
	$result6 = mysqli_query($conn, $sql6);
	if(!$result6){
		die("query cannot proceed");
	}
	while($row6 = mysqli_fetch_assoc($result6)){
	$u = $row6['UID'];
	$temps=0;
	foreach($_POST['status'] as $value){
		if($value==$u){$temps=0;break;}
		else{
			$temps++;
		}
	}
	if($temps==0)
	{
	}
	else
	{
		$uid = $row6['UID'];
		$name = $row6['FirstName']." ".$row6['LastName'];
		$sql7 = "INSERT INTO `attendance`(`subjectCode`, `studentuid`, `attendanceStatus`, `studentName`, `date`) VALUES ('$code','$uid','a','$name','$currdate')";
		$result7 = mysqli_query($conn, $sql7);
		if(!$result7){
		die("cannot proceed");
		}
	}
	}
	foreach($_POST['status'] as $value){
	$sql3 = "SELECT * FROM student WHERE UID='$value'";
	$result3 = mysqli_query($conn, $sql3);
	if(!$result3){
		die("query cannot proceed");
	}
	$row3 = mysqli_fetch_assoc($result3);
	$uid = $row3['UID'];
	$name = $row3['FirstName']." ".$row3['LastName'];
	$sql4 = "INSERT INTO `attendance`(`subjectCode`, `studentuid`, `attendanceStatus`, `studentName`, `date`) VALUES ('$code','$uid','p','$name','$currdate')";
	$result4 = mysqli_query($conn, $sql4);
	if(!$result4){
		die("cannot proceed");
	}
	}
	echo "<center>Attedance Submit successfully</center>";
}
?>
</body>
</html>