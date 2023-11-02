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
//sql
$sql = "SELECT * FROM albums";
$result = mysqli_query($conn, $sql);

echo "<table>
<tr>
<td>Album</td>
<td>Artist</td>
<td>Runtime</td>
<td>Log</td>
</tr>";

while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>" . $row["album"] . "</td>
    <td>" . $row["artist"] . "</td>
    <td>" . $row["runtime"] . "</td>
    <td>button</td>
    </tr>";
}



$conn->close();
?>

</body>
</html>