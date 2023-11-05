<html>
<body>
<?php
$albumID = $_POST["log"];
$album = $_POST["album"];
?>

<!-- review form -->
<h2>Review for <?php echo $album ?></h2><br>

<form action="/MusicWebsite/saveReview.php" method="post">

    <label for="rating" style="font-family:'Courier New'">Rating:</label><br>
    <input type="radio" id="1star" name="ratingValue" value="1" required>
    <input type="radio" id="2star" name="ratingValue" value="2">
    <input type="radio" id="3star" name="ratingValue" value="3">
    <input type="radio" id="4star" name="ratingValue" value="4">
    <input type="radio" id="5star" name="ratingValue" value="5"><br>

    <textarea placeholder="Enter review" name="review" rows="5" cols="40"></textarea><br>

    <label for="private" style="font-family:'Courier New'">Private review: </label>
    <input type="checkbox" id="private" name="private" value="0"><br><br>

    <input type ="hidden" name="albumID" value="<?php echo $albumID; ?>"/>


    <button class="button1">Submit</button>
</form>





</body>
</html>