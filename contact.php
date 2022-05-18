<?php 
session_start();
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Northampton Chocolates</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="container">
<nav>
    <a href="index.php"><img src="/images/Logo.png" alt="Logo" class="logo"/></a>
    <ul>
      
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="login.php"><img src ="/images/usericon.png" alt="User" class="usericon"></a></li>

      <li><a href="cart.php"><img src ="/images/shoppingcart.png" alt="Shopping Cart" class="shoppingcart"></a></li>

      <input type="text" placeholder="Search">
    </ul>
    
  </nav>
  <main>
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

<a class="twitter-timeline" href="https://twitter.com/SpecialityChocs?ref_src=twsrc%5Etfw">Tweets by SpecialityChocs</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

  </main>
  <footer>©2022 Northampton Speciality Chocolate. 
    All Rights Reserved. Privacy and Terms of Service</footer>
</div>
  
</body>
</html>