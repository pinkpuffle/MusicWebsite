<html>
</body>
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

echo "<table>
<tr>
<td>Album</td>
<td>Artist</td>
<td>Runtime</td>
<td>Log</td>
</tr>";



$conn->close();
?>

</body>
</html>