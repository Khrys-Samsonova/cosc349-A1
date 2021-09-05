<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>Database test page</h1>

<p>Showing contents of users table:</p>

<table border="1">
<tr><th>User Name</th><th>User Address</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

# user query
$q = $pdo->query("SELECT * FROM users");

while($row = $q->fetch()){
  echo "<tr><td>".$row["user_name"]."</td><td>".$row["user_address"]."</td></tr>\n";
}

?>
</table>

<table border="1">
<tr><th>Restaurant</th><th>Restaurant Address</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

# restaurants query
$q_r = $pdo->query("SELECT * FROM restaurants");

while($row = $q_r->fetch()){
  echo "<tr><td>".$row["restaurant_name"]."</td><td>".$row["restaurant_address"]."</td></tr>\n";
}

?>
</table>

<table border="1">
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

<table border="1">
<tr><th>Order ID</th><th>Time Placed</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

# orders query
$q_o = $pdo->query("SELECT * FROM orders");

while($row = $q_o->fetch()){
  echo "<tr><td>".$row["order_ID"]."</td><td>".$row["order_date"]."</td></tr>\n";
}

?>
</table>


</body>
</html>
