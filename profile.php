<html>
</body>
<?php
session_start();
$username = $_SESSION["username"];

echo "<h2>Hello " . $username . "</h2>";
?>

</body>
</html>