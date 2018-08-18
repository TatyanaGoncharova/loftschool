<?php
$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => '2015'
];
$toyota = [
    'model' => 'toy',
    'speed' => 320,
    'doors' => 7,
    'year' => '2018'
];
$opel = [
    'model' => 'op',
    'speed' => 180,
    'doors' => 3,
    'year' => '2012'
];
$cars = [
    'bmw' => $bmw,
    'toyota' => $toyota,
    'opel' => $opel
];

foreach ($cars as $key => $value) {
    echo 'CAR '. $key. '<br>';
    echo $value['model'] . ' ' . $value['speed'] . ' ' . $value['doors'] . ' ' . $value['year'] . '<br>';
}
