<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

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
$sql = "SELECT reviews.review, reviews.rating, albums.album, albums.artist
FROM reviews 
INNER JOIN albums ON reviews.albumID = albums.albumID
WHERE username = '" . $username . "'";
$result = mysqli_query($conn, $sql);

echo "<h1>Profile</h1><br>
<h2>Hello " . $username . "</h2>";

if(mysqli_num_rows($result) > 0){ //if reviews exist
    echo "<table>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
        <td>" .
        $row["album"] . " - " . $row["artist"] . "<br>" .
        $username . "<br>" .
        $row["rating"] . "/5<br>" .
        $row["review"];
    }
}else{
    echo "No reviews yet";
}
?>

</body>
</html>