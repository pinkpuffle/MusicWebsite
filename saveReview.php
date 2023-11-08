<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
//initialise
$ratingValue = $_POST["ratingValue"];
$review = $_POST["review"];
$private = $_POST["private"];
$albumID = $_POST["albumID"];
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

//$sql = "SELECT reviewID FROM reviews WHERE username = '" . $username . "' AND albumID = '" . $albumID . "'";
//$result = mysqli_query($conn, $sql);

$stmt = $conn->prepare("SELECT reviewID FROM reviews WHERE username = ? ND albumID = ?");
$stmt->bind_param("si",$username,$albumID);
$stmt->execute();
$result = $stmt->get_result();

//if review already exist
if(mysqli_num_rows($result) > 0){
    //$sql = "UPDATE reviews
    //SET review = '" . $review . "', rating = '" . $ratingValue . "', private = '" . $private . "'
    //WHERE username = '" . $username . "'and albumID = '" . $albumID . "'";

    $stmt = $conn->prepare("UPDATE reviews
    SET review = ?, rating = ?, private = ?
    WHERE username = ? and albumID = ?");
    $stmt->blind_param("sibsi",$review,$ratingValue,$private,$username,$albumID);



}else{ //if not

    //$sql = "INSERT INTO reviews (username, albumID, review, rating, private)
    //VALUES ('" . $username . "', '" . $albumID . "', '" . $review . "', '" . $ratingValue . "', '" . $private . "')";

    $stmt = $conn->prepare("INSERT INTO reviews (username, albumID, review, rating, private)
    VALUES (?, ?, ?, ?, ?)");
    $stmt->blind_param("sisib",$username,$albumID,$review,$ratingValue,$private);
}

if($stmt->execute === TRUE){

    echo "<h2>Review saved!</h2><br>
    " . $ratingValue . "/5<br>
    " . $review . "<br>";

}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>

<footer>
	<a href="/MusicWebsite/system.php">Return to menu</a>
</footer>

</html>