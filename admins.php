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
    <title>Admins</title>
</head>
<body>
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
<?php

foreach($admin as $admin )
{
	echo '<li>' . $admin['firstname'] . '</li>';

}

?>
</ul>
    
</body>
</html>