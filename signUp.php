<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css"/>
    <title>SignUp</title>
</head>
<body>
<form action= "signup.php" method= "GET">
	<p>Sign Up:</p>
	<label>User Name</label> <input type="text" placeholder = "test" name="userName"/>
    <label>Email Address</label> <input type="text" placeholder = "test" name="email"/>
	<label>Password</label> <input type="text" placeholder = "test" name="password"/>
	<label>Address</label> <input type="text" placeholder = "test" name="address"/>
	<label>Post Code</label> <input type="text" placeholder = "test" name="postCode"/>
	<label>Phone Number</label> <input type="text" placeholder = "test" name="phoneNumber"/>
	<input type="submit" name="submit" value="Submit" />
</form>

<?php
	$server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'mydb';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

	$userName = $_GET['userName'];
	$email = $_GET['email'];
	$password= $_GET['password'];
	$address= $_GET['address'];
	$postCode= $_GET['postCode'];
	$phoneNumber= $_GET['phoneNumber'];

	$stmt = $pdo -> prepare('INSERT INTO users(username, user_email, password, user_address, user_postcode, phone_number,user_type) VALUES (:userName, :email, :password, :address, :postCode, :phoneNumber, :user_type)');

	$input = [
		'userName' => $userName,
		'email' => $email,
		'password' => $password,
		'address' => $address,
		'postCode' => $postCode,
		'phoneNumber' => $phoneNumber,
		'user_type' => 'admin'
	];
	$stmt -> execute($input);
?>

</body>
</html>