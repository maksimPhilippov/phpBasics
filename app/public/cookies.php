<?php
$cookie_name = "level";
$cookie_value = 12;
setcookie($cookie_name, $cookie_value, time() + 2 * 60, "/");
echo "cookie created for 2 minutes<br>";
echo "<a href=\"game.php\">Come back</a>";
?>