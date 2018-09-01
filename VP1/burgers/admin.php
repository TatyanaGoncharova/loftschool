<?php
/**
 * Created by PhpStorm.
 * User: Gusya
 * Date: 01.09.2018
 * Time: 13:47
 */
require 'form.php';
$db = new PDO('mysql:host=127.0.0.1;dbname=burger; charset=utf8', 'root', '');
echo "Список зарегистророванных пользователей: <br>";
$stm = $db -> query('SELECT * from buyers');
$buyers = $stm->fetchAll();
foreach ( $buyers as $item) {
    echo 'Номер п.п ' . $item['id'] .  ' Имя ' . $item['name']. ' Телефон '. $item['tel'] . '<br>';
}

echo 'Список заказов:';
$data = $db -> query('SELECT * from orders');
$orders = $data->fetchAll();
foreach ( $orders as $item) {
    echo '<br>' . 'Номер п.п ' . $item['id'] .  ' Адрес ' . $item['address']. ' Детали '. $item['detail'];
}
