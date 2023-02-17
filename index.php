<?php 
include 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
	header('Location: welcome.php');
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
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
		<input type="email" name="email" value="<?php echo $email; ?>" required>
		<input type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
		<button name="submit">loijsijqs</button>
	</form>

</body>
</html>