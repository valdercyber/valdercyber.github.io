<?php 
include 'config.php';
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
	header("location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			$username = "";
			$email = "";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";
		}
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>log</title>
</head>
<body>
	<form action="" method="post">
		<input type="username" name="username" value="<?php echo $username; ?>" required>
		<input type="email" name="email" value="<?php echo $email; ?>" required>
		<input type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
		<input type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
		<button name="submit">loijsijqs</button>
	</form>

</body>
</html>