<?php
require './interfaces/Carshering.php';
require './classes/Tariff.php';
require './traits/driver.php';
require './traits/GPS.php';
require './classes/Base.php';
require './classes/Day.php';
require './classes/Hour.php';
require './classes/Student.php';

if ($_POST['tariff'] == "base") {
    $base = new \DZ4\classes\Base($_POST['age'], $_POST['tariff'], $_POST['s'],
        $_POST['hour'], $_POST['minut'],$_POST['gps'], $_POST['driver']);
    echo "<br>" .$base->show();
    echo "<br> Стоимость поездки составит: " . $base->getprice() . " руб";
} elseif ($_POST['tariff'] == "hour") {
    $base = new \DZ4\classes\Hour($_POST['age'], $_POST['tariff'], $_POST['s'],
        $_POST['hour'], $_POST['minut'],$_POST['gps'], $_POST['driver']);
    echo "<br> Стоимость поездки составит: " . $base->getprice() . " руб";
    echo "<br>" .$base->show();
} elseif ($_POST['tariff'] == "day") {
    $base = new \DZ4\classes\Day($_POST['age'], $_POST['tariff'], $_POST['s'],
        $_POST['hour'], $_POST['minut'],$_POST['gps'], $_POST['driver']);
    echo "<br> Стоимость поездки составит: " . $base->getprice() . " руб";
}elseif ($_POST['tariff'] == "student") {
    $base = new \DZ4\classes\Student($_POST['age'], $_POST['tariff'], $_POST['s'],
        $_POST['hour'], $_POST['minut'],$_POST['gps'], $_POST['driver']);
    echo "<br> Стоимость поездки составит: " . $base->getprice() . " руб";
} else {
    echo "Выберите тариф";
}











