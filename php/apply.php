<html>
<head>
     <title>Job Application Status</title>
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

$applicant_name = $_POST['applicant_name'];
$about = $_POST['about'];
$jobcode = $_POST['jobcode'];

if(isset($_POST['submit']) && $_FILES['cv']['size'] > 0){
    $fileName = $_FILES['cv']['name'];
    $tmpName = $_FILES['cv']['tmp_name'];
    $fileSize = $_FILES['cv']['size'];
    $fileType = $_FILES['cv']['type'];
    
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    
    $sql = "INSERT INTO application (applicant_name, filename, filesize, filetype, content, about, jobcode) 
                             VALUES ('$applicant_name','$fileName', '$fileSize', '$fileType', '$content', '$about', '$jobcode')";
}

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Job Application Successfully Submitted!
          <a href='../static/jobseeker.php'>Return to Profile page</a>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
</body>
</html>