<html>
<body>

<?php
session_start();
$username = $_SESSION["username"];
?>

Hello <?php echo $username;?><br>


<a href="/MusicWebsite/music.php">View Music</a><br>
<a href="/MusicWebsite/profile.php">View Profile</a>



</body>
</html>