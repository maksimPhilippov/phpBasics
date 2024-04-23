<?php
include('header.php');
?>
<?php
session_unset();
if (session_destroy()) {
    echo "logout success<br>";
}
else {
    echo "logout failure<br>";
}
?>
<?php
include('footer.php');
?>