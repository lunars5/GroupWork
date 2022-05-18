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
    <title>Enquiries</title>
</head>
<body>
    <?php
    require 'templates/navbar.php';


    $stmt = $pdo -> prepare('SELECT * FROM Enquiries');
	$stmt -> execute();
	$enquiries = $stmt->fetchAll();
?>
    <ul class="names">
    <?php
    
    foreach($enquiries as $enquiry )
    {
       echo '<li>First name: ' . $enquiry['enquiry_firstname'] . '</li>';
       echo '<li>Surname: ' . $enquiry['enquiry_surname'] . '</li>';
       echo '<li>Email: ' . $enquiry['enquiry_email'] . '</li>';
       echo '<li>Message: ' . $enquiry['enquiry_text'] . '</li>';
    
    }
    
    ?>
    </ul>


    
</body>
</html>