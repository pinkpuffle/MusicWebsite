<html>
<body>

<!-- submit form to self -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<p style="font-family:verdana">Please register.</p>
	<label for="username" style="font-family:'Courier New'">Username:</label><br>
	<input type="text" id="username" name="username"><br>
	<label for="password" style="font-family:'Courier New'">Password:</label><br>
	<input type="text" id="password" name="password"><br><br>
	<button class="button1">Submit</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connection
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "musicwebsite";
    // Create connection
    $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO users (username, password) VALUES ('" . $username . "', '" . $password . "')";

    if($conn->query($sql) === TRUE){
        header("Location: system.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    
    }

    $conn->close();
}

?>

</body>
<footer>
	<a href="/MusicWebsite/index.php">Login</a>
</footer>
</html>