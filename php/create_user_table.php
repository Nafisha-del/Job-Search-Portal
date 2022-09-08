<html>
<head>
      <title>User Table</title>
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

$sql = "CREATE TABLE Users (
               username VARCHAR(30) PRIMARY KEY,
               email VARCHAR(30) NOT NULL,
               password VARCHAR(30) NOT NULL,
               con_password VARCHAR(30) NOT NULL,
               account VARCHAR(30) NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
    echo "Users table created successfully!!";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>