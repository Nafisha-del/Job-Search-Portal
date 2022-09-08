<html>
<head>
     <title>Application Table</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE application (
               applicant_name VARCHAR(30) NOT NULL PRIMARY KEY,
               filename VARCHAR(30) NOT NULL,
               filetype VARCHAR(30) NOT NULL,
               filesize INT NOT NULL,
               content MEDIUMBLOB NOT NULL,
               about VARCHAR(300) NOT NULL,
               jobcode VARCHAR(70) NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
    echo "Application table created successfully!!";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>