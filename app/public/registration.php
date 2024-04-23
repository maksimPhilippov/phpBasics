<?php
include('header.php');
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <label>Username: <input type="text" name="login" required> </label> <br>
    <label>Password: <input type="password" name="password" required> </label> <br>
    <input type="submit" name="register" value="Register"> <br>
</form>

<?php

function create_user($name, $pass) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $connection = connect_to_bd(); 
    $sql = "INSERT INTO Users( login, password) VALUES(:name, :hash)";
    
    $tmpt = $connection->prepare($sql);

    $tmpt->bindParam(":name", $name);
    $tmpt->bindParam(":hash", $hash);

    $tmpt->execute();

    return 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if( isset($_POST['register']) ) {
        if ( empty($_POST['login']) ) {
            credentials_error();
        }
        elseif (empty($_POST['password']) ) {
            credentials_error();
        } 
        else {
            $login = basic_input_validation($_POST['login']);
            $password = basic_input_validation($_POST['password']);

            $error = create_user($login, $password);
            if($error) {
                
            }
            else {
                echo "<div>yo, dude</div>";
            }
        }
    }
}

include('footer.php');
?>