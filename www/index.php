<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
<title>Database test page</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1 style="text-align:center">Database test page (users)</h1>

<hr class="solid">

<p style="text-align:center">Showing available meals:</p>


<table class="center" border="1">
<tr><th>Meal Name</th><th>Meal Description</th><th>Date Made</th><th>Use By</th><th>Delivery</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

# meals query
$q_m = $pdo->query("SELECT * FROM meals");

while($row = $q_m->fetch()){
  echo "<tr><td>".$row["meal_name"]."</td><td>".$row["meal_description"]."</td><td>".$row["meal_made_date"]."</td><td>".$row["meal_perish_date"]."</td><td>".$row["delivery_options"]."</td></tr>\n";
}

?>
</table>
</body>
</html>
