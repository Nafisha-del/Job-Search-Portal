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

$jobcode = $_POST['jobcode'];
$applicant_name = $_POST['applicant_name'];

$sql = "SELECT * FROM application WHERE applicant_name='$applicant_name' and jobcode='$jobcode'";
$result=  $conn->query($sql);

 while($row = $result->fetch_assoc()) {
      $pdf = $row['content'];
      base64_encode($pdf); 
  }
header("Content-type: application/pdf");  
header('Content-disposition: inline; filename="'.$pdf.'.pdf"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
echo $pdf;

$conn->close();
?>