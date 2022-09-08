<html>
<head>
     <title>Sign Out</title>
</head>
<body>
<?php   
session_start(); 
session_destroy();
echo 'You have been logged out. <a href="../static/homepage.html">Go back</a>';
exit();
?>
</body>
</html>