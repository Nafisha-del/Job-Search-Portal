<html>
<head>
</head>
<body>
<?php
    $servername="localhost"; 
	$username="root"; 
	$password=""; 
	$db_name="myDB"; 
	$tbl_name="users"; 
	
	$conn = mysqli_connect($servername, $username, $password, $db_name); 
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	 
	$myusername=$_POST['username']; 
	$myaccount=$_POST['account']; 
	$mypassword=$_POST['password']; 
	$email=$_POST['email'];

	$sql="SELECT * FROM users WHERE username='$myusername' and email='$email' and password='$mypassword' and account='$myaccount'";

	$result=mysqli_query($conn, $sql);
	
	$count=mysqli_num_rows($result);
	session_start();
	
	if($count==1 && $myaccount=="employer"){
		$_SESSION['logged_in'] = true;
		header('location:../static/employer.php');
	}
	elseif($count==1 && $myaccount=="employee"){
		$_SESSION['logged_in'] = true;
		header('location:../static/jobseeker.php');
	}
	elseif($count==1 && $myaccount=="admin"){
		$_SESSION['logged_in'] = true;
		header('location:../static/admin.php');
	}
	else {
		echo "Wrong Username, Email or Password";
	}
?>
</body>
</html>