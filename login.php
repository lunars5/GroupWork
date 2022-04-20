<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"/>
    <title>SignUp</title>
</head>
<body>
<form action= "index.php" method= "POST">
	<p>Log In:</p>
	<label>User Name</label> <input type="text" placeholder = "test"  name="userName"/>
	<label>Password</label> <input type="text" placeholder = "test" name="password"/>

	<input type = "submit" name = "submit" value = "Submit" />
</form>

<?php
	$server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'mydb';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

	

	$user = $pdo -> prepare('SELECT * FROM users WHERE userName = :userName AND password = :password AND user_type = :user');

	$userInfo = [
		'userName' => $_POST['userName'],
		'password' => $_POST['password'],
		'user' => 'user'
	];
	$user -> execute($userInfo);

	$admin = $pdo -> prepare('SELECT * FROM users WHERE username = :userName AND password = :password AND user_type = :admin');

	$adminInfo = [
		'userName' => $_POST['username'],
		'password' => $_POST['password'],
		'admin' => 'admin'
	];
	$admin -> execute($adminInfo);

	if ($admin -> rowCount() > 0) {
		$_SESSION['admin'] = true;
		echo '<p>admin</p>';
	   }

	   if ($user -> rowCount() > 0){
		   $_SESSION['user'] = true;
		   echo '<p>user</p>';
	   }

	   else {
		echo '<p>username or password is incorrect</p>';
	   }
?>

<footer> &copy;2022 Northampton Speciality Chocolate. 
All Rights Reserved. Privacy and Terms of Service</footer>
</body>
</html>