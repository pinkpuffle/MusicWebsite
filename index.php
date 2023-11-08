<html>
<body style="background-color:lavender;">

<h2>Welcome</h2>

<style>
	.button1 {boarder-radius: 12px;}
</style>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<p>Please login.</p>
	<label for="username">Username:</label><br>
	<input type="text" id="username" name="username"><br>
	<label for="password">Password:</label><br>
	<input type="text" id="password" name="password"><br><br>
	<button class="button1">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include 'config.php';
	// Create connection
	$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//login
	$username = $_POST["username"];
	$password = $_POST["password"];

	$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	//verify hash and salt
	if(password_verify($password,$row["password"]) == 1){
		session_start();
		$_SESSION["login"] = true;
		$_SESSION["username"] = $_POST["username"];
		header("Location: system.php");

	}else{
		echo "Incorrect login";
	}
		
	$conn->close();
}
?>

</body>

<footer>
	<a href="/MusicWebsite/register.php">Register new account</a>
</footer>
</html>