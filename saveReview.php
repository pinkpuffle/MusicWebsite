<html>
<body>

<?php
//initialise
$ratingValue = $_POST["ratingValue"];
$review = $_POST["review"];
$private = $_POST["private"];
$albumID = $_POST["albumID"];



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
    
}else{ //if not

}



?>





</body>



</html>