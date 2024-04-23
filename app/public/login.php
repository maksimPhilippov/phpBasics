<?php
include('header.php');
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <label>Username: <input type="text" name="login" id="login" required> </label> <br>
    <label>Password: <input type="password" name="password" id="password" required> </label> <br>
    <input type="submit" name="submitted" value="Login"> <a href="registration.php">Register</a>
</form>

<?php
function login_user($name, $password) {
    // $hash = password_hash($password, PASSWORD_DEFAULT);
    // echo "current hash: {$hash} <br>";

    $connection = connect_to_bd();
    $sql = "SELECT user_id, password FROM Users WHERE login = :name";
    $tmpt= $connection->prepare($sql);
    $tmpt->bindParam(":name", $username);
    $username = $name;
    $tmpt->execute();
    
    $tmpt->setFetchMode(PDO::FETCH_ASSOC);
    $response = $tmpt->fetchAll();

    // print_r($response);
    if (count($response) == 0) { //user doesn't exist
        err_echo("user doesn't exist, try to register");
        return 1;
    }
    elseif (password_verify($password, $response[0]['password'])) {
        $_SESSION['logined'] = true;
        $_SESSION['userid'] = $response[0]['user_id'];
        $_SESSION['username'] = $name;
        return 0;
    }
    else {// password incorrect
        err_echo("password incorrect");
        return 2;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submitted'])) {

        if ( empty($_POST['login']) ) {
            credentials_error();
        }
        elseif (empty($_POST['password']) ) {
            credentials_error();
        } 
        else {
            $login = basic_input_validation($_POST['login']);
            $password = basic_input_validation($_POST['password']);

            $error = login_user($login, $password);
            if(!$error) {
                echo "<div>yo, dude</div>";
            }
        }

    }
}
?>

<?php
include('footer.php');
?>