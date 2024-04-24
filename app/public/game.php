<?php
include('header.php');

if (rand(0, 1)) {
    echo "win <br>";
}
else {
    echo "lose <br>";
}

function draw_section($drawer) {
    
    $title = strtolower($drawer);
    $title = str_replace("_", " ", $title);
    $title[0] = strtoupper($title[0]);
    
    echo "<section>";
    echo "<h2>$title</h2>";
    $drawer();
    echo "</section>";
}

function arrays_practise() {

    $coins = array("bitcoin", "dogcoin", "crazycoin", "tothemooncoin");
    foreach($coins as $coin) {
        echo "{$coin} <br>";
    }

    array_push($coins, "boringcoin");
    print_r($coins);
    echo "<br>";

    $phones = array("Sasuke"=>"+765 123 64 22", "Sakura"=>"+763 423 52 52", "Naruto"=>"+763 876 73 24");
    foreach($phones as $person => $number) {
        echo $person . "'s phone is " . $number . "<br>";
    }

    array_splice($coins, 1, 3);
    print_r($coins);
    echo "<br>";
}

function dates_practise() {

    $date = date("Y-m-d");
    echo "Today is " . $date . "<br>";
    $time = date("h:i:sa");
    echo "Server time is " . $time . "<br>";
    $time = date("Y-m-d H:i:s", mktime(14, 1, 15, 6, 22, 2007));
    echo "Time created is " . $time . "<br>";

}

function cookies_practise() {
    $cookie_name = "level";
    if(isset($_COOKIE[$cookie_name])) {
        echo "Your level is {$_COOKIE[$cookie_name]}<br>";
    }
    else {
        echo "You haven't cookie named \"{$cookie_name}\" <br>";
    }
    echo "<a href=\"cookies.php\">I want some cookies</a><br>";
}

draw_section("arrays_practise");
draw_section("dates_practise");
draw_section("cookies_practise");

include('footer.php');
?>