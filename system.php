<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Menu</h1>

<a href="/MusicWebsite/music.php">View Music</a><br>
<a href="/MusicWebsite/profile.php">View Profile</a><br><br>

<?php
include 'config.php';
// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//sql
$sql = "SELECT reviews.review, reviews.rating, reviews.username, albums.album, albums.artist
FROM reviews 
INNER JOIN albums ON reviews.albumID = albums.albumID
WHERE reviews.private = 0";
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