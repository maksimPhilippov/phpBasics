<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <style>

nav>ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    max-width: 20em; 
}

footer {
    background-color: skyblue;
    font-size: 3em;
    width: fit-content;
    padding: 0.5em 1em;
}
    </style>
</head>
<body>

<?php
function connect_to_bd() {
    $db_name = 'mydb';
    $db_username = 'nikita';
    $db_user_password = 'qwert123';

    $pdo = new PDO("mysql:dbname=$db_name;host=mysql", 
                   $db_username, 
                   $db_user_password, 
                   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    return $pdo;
}
function err_echo($content) {
    echo "<div class=\"error\">{$content}</div>";
}

function credentials_error() {
    err_echo("login or password is missing");
}

function basic_input_validation($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}


?>

<header>
    <nav>
        <ul class="navlist">
            <li><a href="home.php">Home</a></li>
            <li><a href="game.php">Play</a></li> 
<?php
if(isset($_SESSION['logined'])) {
    echo "<li><a href=\"logout.php\">Logout</a></li>";
}
else {
    echo "<li><a href=\"login.php\">Login</a></li>";
}
?>
        </ul>
    </nav>
</header>