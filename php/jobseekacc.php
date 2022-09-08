<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../static/css/bootstrap.min.css">

     <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='../static/js/bootstrap.min.js'></script>

     <title>Job Seekers Registered</title>
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

$sql = "SELECT * FROM users WHERE account='employee'";
$result = $conn->query($sql);

echo "<h1>Welcome to Job Search Portal</h1><h2>List of Job Seeker Account</h2>";
echo "<div class='container'>";

if ($result->num_rows > 0) {
  echo "<table border='1' class='table table-striped'>
              <tr>
                  <th scope='col'>Username</th>
                  <th scope='col'>Email</th>
              </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["username"].
         "</td><td>".$row["email"].
         "</td></tr>";
  }
  echo "</table><button onclick='window.print()'>Print this page</button></div>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>