<?php
require_once('src/functions.php');
$myMas = [
    'String 1',
    'String 2',
    'String 3',
];
echo task1($myMas);

echo task2('+', 1, 2, 7, 7.1);

task3(3, 5);

task4();

echo task5('Карл у Клары украл Кораллы');
echo task5('Две бутылки лимонада');

$text='Hello again!';
$fp = fopen('test.txt', 'w');
fwrite($fp, $text);
fclose($fp);

echo readFiles('test.txt');