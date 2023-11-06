<html>
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
<body>
<h1>Menu</h1>

<a href="/MusicWebsite/music.php">View Music</a><br>
<a href="/MusicWebsite/profile.php">View Profile</a><br><br>

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
$sql = "SELECT reviews.review, reviews.rating, reviews.username, albums.album, albums.artist
FROM reviews 
INNER JOIN albums ON reviews.albumID = albums.albumID";
$result = mysqli_query($conn, $sql);

echo "<table>";
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>" .
    $row["album"] . " - " . $row["artist"] . "<br>" .
    $row["username"] . "<br>" .
    $row["rating"] . "/5<br>" .
    $row["review"];
}


?>

</body>
</html>