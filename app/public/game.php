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

function classes_practise() {
    class Fruit {
        public $name = "";
        public $view = "";
        public $taste = "";
        public $size = 1;

        function __construct($name, $taste, $view, $size) {
            
            $this->set_name($name);
            $this->set_taste($taste);
            $this->set_view($view);
            $this->set_size($size);
        }
        
        function set_name($name) {
            $this->name = $name;
        }

        function get_name() {
            return $this->name;
        }
        function set_taste($taste) {
            $this->taste = $taste;
        }

        function get_taste() {
            return $this->taste;
        }
        function set_view($view) {
            $this->view = $view;
        }

        function get_view() {
            return $this->view;
        }

        function set_size($size) {
            $this->size = $size;
        }

        function get_size() {
            return $this->size;
        }

        function print() {
            echo "<div class=\"fruit\">";
            echo "<cite class=\"speech\">Hello, my name is {$this->name} and I'm quite {$this->taste}</cite>";
            echo "<div style=\"font-size: {$this->size}em\">{$this->view}</div>";
            echo "</div>";
        }
    }

    $fruits = [
        new Fruit("Orange", "sweet", "🍊", 5),
        new Fruit("Strawberry", "sweet", "🍓", 1),
        new Fruit("Lemon", "sour", "🍋", 4),
    ];
    function getinfo($fruit) {
        echo $fruit->print();
    }

    array_walk($fruits, "getinfo");

    echo "abstraction begins<br>";
    interface IFruitFactory {
        static function get_fruits($count);
    }

    class SweetFactory implements IFruitFactory {
        static function get_fruits($count) {
            $result = [];
            for($i=0; $i < $count; $i++) {
                if(rand(0, 1)) {
                    array_push($result, new Fruit("Orange", "sweet", "🍊", 5));
                }
                else {
                    array_push($result, new Fruit("Strawberry", "sweet", "🍓", 1));
                }
            }
            return $result;
        }
    }
    class SourFactory implements IFruitFactory {
        static function get_fruits($count) {
            $result = [];
            for($i=0; $i < $count; $i++) {
                if(rand(0, 1)) {
                    array_push($result, new Fruit("Lemon", "sour", "🍋", 4));
                }
                else {
                    array_push($result, new Fruit("Kiwi", "sour", "🥝", 4));
                }
            }

            return $result;
        }
    }

    $fruits = SweetFactory::get_fruits(4);
    $fruits = array_merge($fruits, SourFactory::get_fruits(4));
    shuffle($fruits);
    array_walk($fruits, "getinfo");

    trait textScaling {
        function largerText($text) {
            return "<span class=\"scaler-large\">{$text}</span>";
        }
        function smallerText($text) {
            return "<span class=\"scaler-small\">{$text}</span>";
        }
    }

    class DontRefreshPage {
        use textScaling;

        private static $newId = 0;
        private $id = 0;
        private $size = 1;
        private $text = "";

        function __construct($text)
        {
            $this->text = $text;
            $this->id = "dontRefreshPage" . self::$newId++;
            if (isset($_SESSION[$this->id])) {
                $_SESSION[$this->id] += 1;
                $this->size = $_SESSION[$this->id];
            }
            else {
                $_SESSION[$this->id] = 1;
            }
            
        }

        function print() {
            for($i = 0; $i < $this->size; $i++) {
                $this->text = $this->largerText($this->text);
            }
            echo $this->text;
        }
    }

    // $omg = new DontRefreshPage("Please don't push f5!");
    // $omg->print();
}

draw_section("arrays_practise");
draw_section("dates_practise");
draw_section("cookies_practise");
draw_section("classes_practise");

include('footer.php');
?>