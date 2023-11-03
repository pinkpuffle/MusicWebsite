<html>
<body>
<?php

//initalise variables
$albumID = $_POST["log"];
$review = "bad";
$rating = 0;
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
$sql = "SELECT review, rating FROM reviews WHERE username = '" . $username . "' AND albumID = '" . $albumID . "'";
$result = mysqli_query($conn, $sql);

//if review already exist, change variables to result
if(mysqli_num_rows($result) > 0){
    while ($row = $result->fetch_assoc()) {
        $review = $row['review'];
        $rating = $row['rating'];
    }
}

?>

<!-- review form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<textarea placeholder="Enter review" name="review" rows="5" cols="40"><?php echo $review ?></textarea><br><br>
<button class="button1">Submit</button>
</form>




</body>
</html>