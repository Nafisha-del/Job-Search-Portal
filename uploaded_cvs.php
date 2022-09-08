<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="../static/css/bootstrap.min.css">

     <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
     <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
     <script src='../static/js/bootstrap.min.js'></script>

     <title>Applicants List</title>
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

$myjobcode = $_POST['jobcode'];
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$myaccount = $_POST['account'];

if($myaccount=='employee') {
    die("Only employer or admin are allowed access");
}

$user_sql = "SELECT * from users WHERE username ='$myusername' and password ='$mypassword' and account ='$myaccount'";
$result = $conn->query($user_sql);
$count=mysqli_num_rows($result);

$job_sql = "SELECT * from jobs WHERE jobcode = '$myjobcode'and username ='$myusername'";
$result2 = $conn->query($job_sql);
$count2 = mysqli_num_rows($result2);

if($count==1 && $count2==1 || $myaccount=='admin'){
$sql = "SELECT applicant_name, filename, filetype, filesize, content, about
        FROM application
        WHERE jobcode='$myjobcode'";

$final = $conn->query($sql);

echo "<h1>Welcome to Job Search Portal</h1><h2>Lists of Applicants for the Job ID {$myjobcode}</h2>";
echo "<div class='container'>";

if ($final->num_rows) {
  echo "<table border='1' class='table table-striped'>
              <tr>
                  <th scope='col'>Applicant Name</th>
                  <th scope='col'>File Name</th>
                  <th scope='col'>File Type</th>
                  <th scope='col'>File Size (bytes)</th>
                  <th scope='col'>About</th>
              </tr>";
  // output data of each row
  while($row = $final->fetch_assoc()) {
      $pdf = $row['content'];
      base64_encode($pdf); 
      echo "<tr><td>".$row["applicant_name"].
         "</td><td>".$row["filename"].
         "</td><td>".$row["filetype"].
         "</td><td>".$row["filesize"].
         "</td><td>".$row["about"].
         "</td></tr>";
  }
  echo "</table></div>
       <div class='container'><a href='../static/applicant_name.html'>Click here to view CV</a></br>
       <button onclick='window.print()'>Print this page</button></div>";
  } else {
  echo "0 results";
}
}
else {echo "You did not post the Job: {$myjobcode}!</br>
        <a href='../static/applicants.html'>Return Back</a>" ;}
$conn->close();
?>
</body>
</html>