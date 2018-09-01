<?php
/**
 * Created by PhpStorm.
 * User: Gusya
 * Date: 01.09.2018
 * Time: 2:56
 */
function isUserHasId($db, $email)
{

    $data = $db->prepare('SELECT id FROM buyers WHERE email = :email');
    $data->execute(array(
        'email' => $email,));
    $result = $data->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function makeOrder($db , $userId)
{
    file_put_contents('new2.txt', print_r($userId,1));
    $dataOrder=$db->prepare('INSERT INTO orders (id_buyers, address, detail) VALUES (:buyer, :address, :detail)');
    $dataOrder->execute(array(
        'buyer' => $userId['id'],
        'address' => $_POST['street'].$_POST['home'].$_POST['part'].$_POST['appt'],
        'detail' => $_POST['comment'] ?$_POST['comment'] : 'No comment' ,
    ));
    return true;
}

function sendEmail($db, $user)
{
    $dataMail = $db->prepare('SELECT * FROM orders WHERE id_buyers = ?');
    $dataMail ->execute([$user['id']]);
    $sendDataMail=$dataMail->fetchAll();
    $orderId = max(array_column($sendDataMail, 'id'));
    $message = 'Ваш заказ №'. $orderId . ' будет доставлен по адресу: ' . 'ул.' .
        $_POST['street'].' дом '. $_POST['home'].' кв '.$_POST['appt'] . '. Спасибо! Это уже ' .
        count($sendDataMail) .' заказ.';
    file_put_contents('new7.txt', print_r($message,1));
    echo $message;
}