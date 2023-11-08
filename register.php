<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- submit form to self -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<p>Please register.</p>
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

    $username = $_POST["username"];
    $password = $_POST["password"];

    //check if user already exists
    $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
    $result = mysqli_query($conn, $sql);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$result = $stmt->get_result();

    if(mysqli_num_rows($result) == 0){
        //add user
        $sql = "INSERT INTO users (username, password) VALUES ('" . $username . "', '" . $password . "')";
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES ( ?, ?)");
	    $stmt->bind_param("ss",$username,$password);

        if($stmt->execute() === TRUE){
            session_start();
		    $_SESSION["login"] = true;
		    $_SESSION["username"] = $_POST["username"];
            header("Location: system.php");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo "Username already taken";
    }

    $conn->close();
}
?>

</body>
<footer>
	<a href="/MusicWebsite/index.php">Login</a>
</footer>
</html>