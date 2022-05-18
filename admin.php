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
    <title>Admin</title>
</head>
<body>
    <?php require 'templates/navbar.php' ?>
    <h1>This is the admin dashboard</h1>
    <div class="button"> 
   <a href="users.php">Manage Users</a>
   </div>
   <div class="button"> 
   <a href="admins.php">Manage Admins</a>
   </div>
   <div class="button"> 
   <a href="enquiries.php">Enquiries</a>
   </div>
   
   
</body>

<?php

require 'templates/footer.php';
?>
</html>