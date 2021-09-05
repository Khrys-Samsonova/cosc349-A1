<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Admin test page</title>
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
<h1>Admin test page</h1>

<p>Showing contents of users table:</p>

<table border="1">
<tr><th>User Name</th><th>User Address</th></tr>

<!-- Fetch and display data from the users table and display it in a table -->

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM users");

while($row = $q->fetch()){
  echo "<tr><td>".$row["user_name"]."</td><td>".$row["user_address"]."</td></tr>\n";
}

?>
</table>

<!-- fetch and display data from the resturaunts table and display it in a table -->

<p>Showing contents of resturaunts table:</p>

<table border="1">
<tr><th>Resturaunt Name</th><th>Resturaunt Address</th><th>Resturaunt Rating</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM restaurants");

while($row = $q->fetch()){
  echo "<tr><td>".$row["resturaunt_name"]."</td><td>".$row["resturaunt_address"]."</td><td>".$row["resturaunt_rating"]."</td></tr>\n";
}

?>
</table>

<!-- fetch and display data from the meals table, then display it in a table -->

<p>Showing contents of meals table:</p>

<table border="1">
<tr><th>Meal Name</th><th>Meal Made Date</th><th>Meal Perishable</th><th>Meal Perish Date</th><th>Delivery Options</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM meals");

while($row = $q->fetch()){
  echo "<tr><td>".$row["meal_name"]."</td><td>".$row["meal_made_date"]."</td><td>".$row["meal_perishable"]."</td>
  <td>".$row["meal_perish_date"]."</td><td>".$row["delivery_options"]."</td></tr>\n";
}

?>
</table>

<!-- fetch and display data from the orders table, then display the data in a table -->

<p>Showing contents of orders table:</p>

<table border="1">
<tr><th>Order ID</th><th>Order Date</th><th>Order Delivered</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM orders");

while($row = $q->fetch()){
  echo "<tr><td>".$row["order_ID"]."</td><td>".$row["order_date"]."</td><td>".$row["order_delivered"]."</td></tr>\n";
}

?>
</table>

</body>
</html>
