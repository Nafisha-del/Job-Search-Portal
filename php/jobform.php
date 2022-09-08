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

$position = $_POST['position'];
$company = $_POST['company'];
$location = $_POST['location'];
$job_type = $_POST['job_type'];
$description = $_POST['description'];
$responsibilites = $_POST['responsibilites'];
$qualifications = $_POST['qualifications'];
$pay = $_POST['pay'];
$url = $_POST['url'];
$dates = $_POST['dates'];
$email = $_POST['email'];
$jobcode = $_POST['jobcode'];
$username = $_POST['username'];

$sql = "INSERT INTO jobs (position, company, location, job_type, description, responsibilites, qualifications, pay, url, dates, email, jobcode, username) 
               VALUES ('$position','$company', '$location', '$job_type', '$description', '$responsibilites', '$qualifications', '$pay', '$url', '$dates', '$email', '$jobcode', '$username')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Job {$jobcode} Successfully Posted!</br>
        <a href='../static/employer.php'>Return to Profile page</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>