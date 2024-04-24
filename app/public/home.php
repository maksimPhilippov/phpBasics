<?php
include('header.php');
?>
<?php
if(isset($_SESSION['logined'])) {
    echo "hello, " . $_SESSION['username'];
}
else {
    echo "unlogined";
}
?>
<?php
include('footer.php');
?>