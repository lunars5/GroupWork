<!-- Creates the session for knowing if an admin or user is logged in -->
<!-- Also grabs the database connection --> 
<?php 
session_start();
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Northampton Chocolates</title>
     <!-- Links stylesheet -->
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="container">
  <!-- Sets the navigation bar -->
<?php
require 'templates/navbar.php'
?>

  <main>
    <!-- Creates the insert query for inserting into the enquriries table -->
        <?php 
        if(isset($_POST['submit'])){
    $stmt = $pdo -> prepare('INSERT INTO Enquiries(enquiry_firstname, enquiry_surname, enquiry_email, enquiry_text, enquiry_status) VALUES (:enquiry_firstname, :enquiry_surname, :enquiry_email, :enquiry_text, :enquiry_status)');

	$input = [
		'enquiry_firstname' => $_POST['enquiry_firstname'],
		'enquiry_surname' => $_POST['enquiry_surname'],
		'enquiry_email' => $_POST['enquiry_email'],
		'enquiry_text' => $_POST['enquiry_text'],
        'enquiry_status' => 'Unresolved'
	];
	$stmt->execute($input);
}
else{
    ?>
    <!-- Creates the form and links the query -->
    <h1>Contact Us</h1>
    <form action= "contact.php" method= "POST">
        <input type='text' placeholder='First name' class='input-line full-width' name="enquiry_firstname"/>
        <input type='text' placeholder='Surname' class='input-line full-width' name="enquiry_surname"/>
        <input type='text' placeholder='Email' class='input-line full-width' name="enquiry_email"/>
        <textarea placeholder='Message' name='enquiry_text' class='input-line full-width'></textarea>
      <input type="submit" class='ghost-round full-width' name="submit" value="Submit" />
        </form>
    <?php
        }
    ?>

<!-- Creates the social media links -->
 <h1>Social Media</h1>

 <div class=links>
 <ul>
  <li><a href="https://twitter.com/SpecialityChocs">Twitter</a> 
  </li>
  <li><a href="https://facebook.com">Facebook</a>
  </li>
  <li><a href="https://www.instagram.com/">Instagram</a> 
</ul>
</div>
<!-- Shows the tweets from a twitter account -->
<a class="twitter-timeline" href="https://twitter.com/SpecialityChocs?ref_src=twsrc%5Etfw">Tweets by SpecialityChocs</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

  </main>


  <!-- Sets the footer -->
  <?php
require 'templates/footer.php'
?>
