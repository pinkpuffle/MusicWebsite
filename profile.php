<html>
</body>
<?php
session_start();
$username = $_SESSION["username"];
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
//sql
$sql = "SELECT reviews.review, reviews.rating, albums.album
FROM reviews 
INNER JOIN albums ON reviews.albumID = albums.albumID
WHERE username = '" . $username . "'";
$result = mysqli_query($conn, $sql);



echo "<h2>Hello " . $username . "</h2>";
?>

</body>
</html>