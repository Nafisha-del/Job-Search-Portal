<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../static/css/bootstrap.min.css">

     <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='../static/js/bootstrap.min.js'></script>

     <title>Delete Account</title>
</head>
<body>
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

$accusername = $_POST['accusername'];
$account = $_POST['account'];

$sql = "DELETE FROM users WHERE username='$accusername' and account='$account'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Account {$accusername} deleted successfully!</br>
        <a href='../static/admin.php'>Return to Profile page</a>";
} 

else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
</body>
</html>