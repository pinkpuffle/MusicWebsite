<html>
<body>

<?php
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

//login
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    echo "Hello " . $username . "!<br>";
    echo '<a href="/MusicWebsite/music.php">View Music</a><br>';
    echo '<a href="/MusicWebsite/profile.php">View Profile</a>';
}
else{
    echo "Incorrect login";
}

$conn->close();

?>
</body>
</html>