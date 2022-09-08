<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$tbl_name = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['con_password']) and isset($_POST['account']) and isset($_POST['submit'])){ 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $account = $_POST['account'];

    if($password==$con_password){
        $sql = "INSERT INTO users (username, email, password, con_password, account) 
                VALUES ('$username', '$email', '$password', '$con_password', '$account')";
    }
    else{
        echo "Passwords do not match</br>
        <a href='../static/signup.html'>Return to Signup page</a>";
        die("");
    }
}

$result = mysqli_query($conn, $sql);
session_start();
if ($result && $account=="admin") {
    $_SESSION['logged_in'] = true;
    header("Location:../static/admin.php");
} 
elseif($result && $account=="employer"){
    $_SESSION['logged_in'] = true;
	header('location:../static/employer.php');
}
elseif($result && $account=="employee"){
	$_SESSION['logged_in'] = true;
	header('location:../static/jobseeker.php');
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>