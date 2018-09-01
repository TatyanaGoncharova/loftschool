<?php
/**
 * Created by PhpStorm.
 * User: Gusya
 * Date: 28.08.2018
 * Time: 8:27
 */

require './src/functions.php';
if((isset($_POST['name'])&&$_POST['name']!="")
    && (isset($_POST['phone'])&&$_POST['phone']!="")
    && (isset($_POST['email'])&&$_POST['email']!="")
    && (isset($_POST['street'])&&$_POST['street']!="")){
    //floor comment payment callback
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=burger; charset=utf8', 'root', '');


        $userId = isUserHasId($db, $_POST['email']);
        if($userId) {
            if(makeOrder($db , $userId))
            sendEmail($db,$userId);
        } else {
            $data = $db->prepare('INSERT INTO buyers (tel, email, name) VALUES (:tel, :email, :name)');
             $data->execute(array(
                'tel' => $_POST['phone'],
                'email' => $_POST['email'],
                'name' => $_POST['name'],
            ));
            $newUser = isUserHasId($db, $_POST['email']);
            if (makeOrder($db,$newUser)) {
                sendEmail($db,$newUser);
            }
        }
   } catch (PDOException $e) {
       echo 'Ошибка: ' . $e->getMessage();
   }
}
