<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Registration</title>
	<link rel="icon" type="image/x-icon" href="image/favicon.ico">
	<style>
	body{
		margin :0px;
		background-image : url("image/student_bg.jpg");
	}
	table{	
		font-size : 20px;
	}
	.outer_table{
		margin-top : 30px;
		margin-bottom : 30px;
	}
	input{
		padding : 10px;
		padding-left:5px;
		padding-right:100px;
		}
	</style>
</head>
<body>
	<div class="student_form" align=center >
	<table  class="outer_table" cellspacing=10 style="background-color : white;">
	<tr>
			<td colspan=2 align=center style="font-size : 45px; background-color : black; color : white;">
				<b>STUDENT REGISTRATION FORM</b>
			</td>
	</tr>
	<tr >
	     <td>
		<form action="" method="post">
		<table cellspacing=10 cellpadding=2 class="inner_table">	
		<tr>
		<td >
			<lable>First Name</lable>
		</td>
		<td>
			<input type="text" placeholder="First Name" name="fname" required>
		</td>
		</tr>
		<tr><td>
		<lable>Last Name</lable>
		</td>
		<td>
			<input type="text" placeholder="Last Name" name="lname" required>
		</td>
		</tr>
		<tr>
		<td >
			<lable>User id</lable>
		</td>
		<td>
			<input type="text" placeholder="User id" name="userid" required>
		</td>
		</tr>
		<tr><td>
		<lable>Father's Name</lable>
		</td>
		<td>
			<input type="text" placeholder="Father Name" name="fathername" required>
		</td>
		</tr>
		<tr><td>
		<lable>Email Id</lable>
		</td>
		<td>
			<input type="email" placeholder="abc@gmail.com" name="email" required>
		</td>
		</tr>
		<tr><td>
		<lable>Enrollment no</lable>
		</td>
		<td>
			<input type="text" name="rollno" required>
		</td>
		</tr>
		<tr><td>
		<tr>
		<td>Semester</td>
		<td><input type="number" name="sem" required></td>
		</tr>
		<tr><td>
		<lable>Gender</lable>
		</td>
		<td>
			<input type="radio" name="gender" value="male" required>Male
			<input type="radio" name="gender" value="female" required>Female
			<input type="radio" name="gender" value="other" required>Other
		</td>
		</tr>
		<tr><td>
		<lable>Mobile No.</lable>
		</td>
		<td>
			<input type="text" maxlength="10" minlength="10" name="mobile" required>
		</td>
		</tr>
		<tr><td>
		<lable>Address</lable>
		</td>
		<td>
			<textarea cols="35" rows="4" name="address"  style="resize : none"></textarea>
		</td>
		</tr>
		<tr><td>
		<lable>City</lable>
		</td>
		<td>
			<input type="text" name="city">
		</td>
		</tr>
		<tr><td>
		<lable>State</lable>
		</td>
		<td>
			<input type="text" name="state">
		</td>
		</tr>
		<tr><td>
		<lable>Country</lable>
		</td>
		<td>
			<input type="text" name="country">
		</td>
		</tr>
		<tr><td>
		<lable>Courses<br>Applied for</lable>
		</td>
		<td>
			<input type="radio" name="course" value="BCA" required>BCA
			<input type="radio" name="course" value="B.Com" required>B.com
			<input type="radio" name="course" value="B.Sc" required>B.Sc
			<input type="radio" name="course" value="B.A" required>B.A
		</td>
		</tr>
		<tr><td>
		<lable>Qualification</lable>
		</td>
		<td>
			<input type="checkbox" name="qualification[]" value="10" >10<sup>th</sup>
			<input type="checkbox" name="qualification[]" value="12" >12<sup>th</sup>
		</td>
		</tr>
		<tr><td>
		<lable>Password</lable>
		</td>
		<td>
			<input type="Password" name="password"  id="myInput" required>
		</td>
		</tr>
		<tr><td>
		<label>Retype-pass</label>
		</td>
		<td>
			<input type="Password" name="passwords"  id="myInput" required>
		</td>
		</tr>
		<tr>
		<td colspan=2>
			<input  type="checkbox" onclick="myFunction()"><label style="font-size : 15px;">Show Password</label>
		</td></tr>
		<tr>
		<td colspan=2><input type="checkbox" required><lable style="font-size : 15px;">i agree</lable></td>
		</tr>
		<tr><td>
			<input style="padding : 10; font-size : 15px; background-color : lightblue;" value="SIGNUP" type="submit" class="buttons" name="signup">
		</td>
		<td>
			<input style="padding : 10; font-size : 15px; background-color : lightblue;" type="reset" class="buttons" value="RESET">
		</td>
		</tr>
		</table>
		</form>
	     </td>
	     <td rowspan=16 align=center>
		<img src="image/table_image.jpg" width=450px height=800px>
	     </td>
	</tr>
	</table>
	</div>
	<script>
	function myFunction() {
 		 var x = document.getElementById("myInput");
 		 if (x.type === "password") {
   		 x.type = "text";
  		} else {
   			 x.type = "password";
 		 }
		}
	</script>
</body>
</html>
<?php 
	if(isset($_POST['signup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$id = $_POST['userid'];
	$fathername = $_POST['fathername'];
	$email = $_POST['email'];
	$rollno = $_POST['rollno'];
	$sem = $_POST['sem'];
	$gender = $_POST['gender'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$course = $_POST['course'];
	$qualifications = $_POST['qualification'];
	$pass = $_POST['password'];
	$pass2 = $_POST['passwords'];
if($pass == $pass2){
	//merge qualification
	$temp1 ="";
	foreach($qualifications as $temp)
	{
		$temp1="$temp1"."$temp"." ";
	}
	//checking connections
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	
	if(!$conn){
		die("<center>connection failed</center>".mysqli_connect_error());
	}

	
	if($fname != "" && $lname != "" && $id != "" && $email != "" && $gender != "" && $mobile != "" &&  $temp1 != "" && $pass != "" )
	{
		$query = "INSERT INTO student VALUES('$fname','$lname','$id','$fathername','$email','$rollno','$gender','$mobile','$address','$city','$state','$country','$course','$temp1','$pass','$sem');";
		$query .= "INSERT INTO login_table VALUES('$id','$fname','$lname','$pass','student')";
		$data = mysqli_multi_query($conn,$query);
		if($data)
		{
			echo "<center>Inserted Successfully</center><br><br>";
		}
		else
		{echo "<br>"."<center>failed to insert</center><br><br>";}
	}
	else
	{
		echo "<center>Fill all fields</center><br><br>";
	}
}
	}
?>
