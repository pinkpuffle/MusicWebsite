<html>
<body>
<?php

//initalise variables
$albumID = $_POST["log"];
$review = "";
$private = 1;
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

<label for="rating" style="font-family:'Courier New'">Rating:</label><br>
<input type="radio" id="1star" name="ratingValue" value="1" required>
<input type="radio" id="2star" name="ratingValue" value="2">
<input type="radio" id="3star" name="ratingValue" value="3">
<input type="radio" id="4star" name="ratingValue" value="4">
<input type="radio" id="5star" name="ratingValue" value="5"><br>

<textarea placeholder="Enter review" name="review" rows="5" cols="40"><?php echo $review ?></textarea><br>

<label for="private" style="font-family:'Courier New'">Private review:</label><br>
<input type="checkbox" id="private" name="private" value="0">

<button class="button1">Submit</button>

</form>




</body>
</html>