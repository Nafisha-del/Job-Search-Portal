<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../static/css/bootstrap.min.css">

     <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='../static/js/bootstrap.min.js'></script>

     <title>Available Jobs</title>
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

$sql = "SELECT * FROM jobs ORDER BY dates";
$result = $conn->query($sql);

echo "<h1>Welcome to Job Search Portal</h1><h2>Lists of Available Jobs</h2>";

if ($result->num_rows > 0) {
  echo "<table border='1' class='table table-striped'>
              <tr>
                  <th scope='col'>Job Position</th>
                  <th scope='col'>Company Name</th>
                  <th scope='col'>Job ID</th>
                  <th scope='col'>Job Location</th>
                  <th scope='col'>Job Type</th>
                  <th scope='col'>Job Description</th>
                  <th scope='col'>Responsibilites</th>
                  <th scope='col'>Qualifications</th>
                  <th scope='col'>Pay Range</th>
                  <th scope='col'>URL</th>
                  <th scope='col'>Submission Last Date</th>
                  <th scope='col'>Contact Info</th>
              </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td><b>".$row["position"].
         "</b></td><td>".$row["company"].
         "</td><td><b>".$row["jobcode"].
         "</b></td><td>".$row["location"].
         "</td><td>".$row["job_type"].
         "</td><td>".$row["description"].
         "</td><td>".$row["responsibilites"].
         "</td><td>".$row["qualifications"].
         "</td><td>".$row["pay"].
         "</td><td>".$row["url"].
         "</td><td>".$row["dates"].
         "</td><td>".$row["email"].
         "</td></tr>";
  }
  echo "</table><button onclick='window.print()'>Print this page</button>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>