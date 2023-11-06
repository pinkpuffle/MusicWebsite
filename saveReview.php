<html>
<body>

<?php
//initialise
$ratingValue = $_POST["ratingValue"];
$review = $_POST["review"];
$private = $_POST["private"];
$albumID = $_POST["albumID"];
session_start();
$username = $_SESSION["username"];

echo $ratingValue . "<br>" . $review . "<br>" . $private . "<br>" .$albumID . "<br>";



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
$sql = "SELECT reviewID FROM reviews WHERE username = '" . $username . "' AND albumID = '" . $albumID . "'";
$result = mysqli_query($conn, $sql);

//if review already exist
if(mysqli_num_rows($result) > 0){
    $sql = "UPDATE reviews
    SET review = '" . $review . "', rating = '" . $ratingValue . "', private = '" . $private . "'
    WHERE username = '" . $username . "', albumID = '" . $albumID . "'";
}else{ //if not
    $sql = "INSERT INTO reviews (username, albumID, review, rating, private)
    VALUES (" . $username . ", " . $albumID . ", " . $review . ", " . $ratingValue . ", " . $private . ")";
}

if($conn->query($sql) === TRUE){

    echo "<h2>Review saved!</h2><br>
    " . $ratingValue . "/5<br>
    " . $review . "<br>";


}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>





</body>



</html>