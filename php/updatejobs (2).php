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

$query = mysql_query("select * from jobs", $conn);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href="readphp.php?id={$row['jobcode']}">{$row['jobcode']}</a></b>";
echo "<br />";
}

if (isset($_GET['id'])) {
$id = $_GET['id'];
$query1 = mysql_query("select * from employee where jobcode=$id", $conn);
while ($row1 = mysql_fetch_array($query1)) {
    <span>Name:</span> <?php echo $row1['employee_name']; ?>
<span>E-mail:</span> <?php echo $row1['employee_email']; ?>
<span>Contact No:</span> <?php echo $row1['employee_contact']; ?>
<span>Address:</span> <?php echo $row1['employee_address']; ?>
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