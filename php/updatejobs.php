<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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

$sql = "UPDATE jobs 
        SET position = '$position', 
            company = '$company', 
            location = '$location',
            job_type = '$job_type',
            description = '$description',
            responsibilites = '$responsibilites',
            qualifications = '$qualifications',
            pay = '$pay',
            url = '$url',
            dates = '$dates',
            email = '$email'
        WHERE jobcode= '$jobcode' and username='$username'";

if ($conn->query($sql) === TRUE) {
  echo "Job {$jobcode} updated successfully!</br>
        <a href='../static/employer.php'>Return to Profile page</a>";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>