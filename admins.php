<!-- Creates the session for knowing if an admin or user is logged in -->
<!-- Also grabs the database connection --> 
<?php
	session_start();
	require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Links stylesheet -->
    <link rel="stylesheet" href="style.css"/>
    <title>Admins</title>
</head>
<body>
  <!-- Sets the navigation bar -->

<!-- Creates the database query for finding all admins that have a registered account -->
<?php
	require 'templates/navbar.php';
	$stmt = $pdo -> prepare('SELECT * FROM users WHERE type = :type');
	$values = [
		'type' => 'admin'
	];
	$stmt -> execute($values);
	$admin = $stmt->fetchAll();
?>
<ul class="names">
<!-- Creates a list for the admins that have a registered account -->
<?php

foreach($admin as $admin )
{
	echo '<li>' . $admin['firstname'] . '</li>';

}
?>
</ul>
<!-- Sets the footer -->
<?php
require 'templates/footer.php'
?>
