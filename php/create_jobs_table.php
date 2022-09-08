<html>
<head>
     <title>Jobs Table</title>
</head>
<body>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE jobs (
               position VARCHAR(30) NOT NULL,
               company VARCHAR(30) NOT NULL,
               location VARCHAR(70) NOT NULL,
               job_type VARCHAR(30) NOT NULL,
               description VARCHAR(300) NOT NULL,
               responsibilites VARCHAR(300) NOT NULL,
               qualifications VARCHAR(300) NOT NULL,
               pay VARCHAR(30) NOT NULL,
               url VARCHAR(30) NOT NULL,
               dates VARCHAR(30) NOT NULL,
               email VARCHAR(30) NOT NULL,
               jobcode VARCHAR (30) NOT NULL PRIMARY KEY, 
               username VARCHAR(30) NOT NULL
         )";

if (mysqli_query($conn, $sql)) {
    echo "Jobs table created successfully!!";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>