<?php
include('header.php');
?>
<?php
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

?>

<?php
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
draw_section("arrays_practise");
?>

<?php
function dates_practise() {

    $date = date("Y-m-d");
    echo "Today is " . $date . "<br>";
    $time = date("h:i:sa");
    echo "Server time is " . $time . "<br>";
    $time = date("Y-m-d H:i:s", mktime(14, 1, 15, 6, 22, 2007));
    echo "Time created is " . $time . "<br>";

}
draw_section("dates_practise");
?>

<?php
include('footer.php');
?>