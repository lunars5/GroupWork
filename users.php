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
    <link rel="stylesheet" href="style.css"/>
    <title>Users</title>
</head>
<body>
	  <!-- Sets the navigation bar -->
	    <!-- Creates the query to find all the users -->
    <?php
	require 'templates/navbar.php';
	$stmt = $pdo -> prepare('SELECT * FROM users WHERE type = :type');
	$values = [
		'type' => 'user'
	];
	$stmt -> execute($values);
	$user = $stmt->fetchAll();
?>
<ul class="names">
	<!-- Lists the users -->
<?php

foreach($user as $user )
{
	echo '<li>Name: ' . $user['firstname']. $user['surname']. ' ' . '<a href="editUser.php?id=' . $user['user_id'] . '">Edit</a>' . ' ' . '<a href="deleteUser.php?id=' . $user['user_id'] . '">Delete</a>' . '</li>';

}
?>
</ul>
    <!-- Sets the footer -->
<?php
require 'templates/footer.php'
?>
