<html>
<!-- style from https://www.w3schools.com/html/html_tables.asp -->
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

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
    <td>
        <form action='/MusicWebsite/logMusic.php' method='post'>
            <button name='log' value='" . $row["id"] . "'>Log</button>
        </form>
    </td>
    </tr>";
}



$conn->close();
?>

</body>
</html>