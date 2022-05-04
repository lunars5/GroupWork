<?php
ob_start();
	session_start();
	require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css"/>
    <title>Log in</title>
</head>
<body class="loginbody">
<img src="logo.png" alt="Logo" class="loginlogo">

<?php

	if(isset($_POST['submit'])){

	$user = $pdo -> prepare('SELECT * FROM users WHERE username = :username AND password = :password AND user_type = :user');

	$userInfo = [
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'user' => 'user'
	];
	$user -> execute($userInfo);

	$admin = $pdo -> prepare('SELECT * FROM users WHERE username = :username AND password = :password AND user_type = :admin');

	$adminInfo = [
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'admin' => 'admin'
	];
	$admin -> execute($adminInfo);

	if ($admin -> rowCount() > 0) {
		$_SESSION['admin'] == true;
		$_SESSION['loggedin'] == true;
		echo '<p>Admin logged in</p>';
		header("Location: index.php");
    	exit();
	   }

	   else if ($user -> rowCount() > 0){
		   $_SESSION['user'] == true;
		   $_SESSION['loggedin'] == true;
		   echo '<p>User logged in</p>';
	   }

	   else {
		echo '<p class="errormessage">Username or password is incorrect</p>';
	   }
	}
	else{
?>

<div class='bold-line'></div>
<div class='wrapper'>
  <div class='window2'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='input-fields'>
	  <form action= "login.php" method= "POST">
        <input type='text' placeholder='Username' class='input-line full-width' name="username"/>
        <input type='password' placeholder='Password' class='input-line full-width' name="password"/>

      </div>
      <div><input type="submit" class='ghost-round full-width' name="submit" value="Submit" /></div>
    </div>
  </div>
</div>
	</form>
<?php
	}
?>
<footer>
			&copy; 2022 Northampton Speciality Chocolate. 
All Rights Reserved. Privacy and Terms of Service
		</footer>
</body>
</html>