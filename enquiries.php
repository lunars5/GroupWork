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
    <title>Enquiries</title>
</head>
<body>
      <!-- Sets the navigation bar -->
      <!-- Creates the query to find all the enquiries -->
    <?php
    require 'templates/navbar.php';

    $stmt = $pdo -> prepare('SELECT * FROM Enquiries');
	$stmt -> execute();
	$enquiries = $stmt->fetchAll();
?>
    <ul class="names">
        <!-- Creates a list to view all the enquiries -->
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
    <!-- Sets the footer -->
    <?php
require 'templates/footer.php'
?>
