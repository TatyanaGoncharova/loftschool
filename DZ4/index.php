<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Кашеринг</title>
</head>
<body>
<form method = 'POST' action = ''>
    <p>Ваш возраст:</p>
    <input type ="number" name = "age" min = '0'>
    <p>Выберите тариф: </p>
    <input type = 'radio' name="tariff" value = "base"> Базовый <br>
    <input type = 'radio' name = 'tariff' value = "hour"> Почасовой <br>
    <input type = 'radio' name = 'tariff' value = "day" > Суточный <br>
    <input type ="radio" name = "tariff" value = "student"> Студенческий <br>
    <p>Сколько километров вы проехали:</p><br>
    <input type = "number" name = "s" min = '0'><br>
    <p>Затраченное время:</p>
    <input type = "number"  name= "hour" min = '0'> часа(ов) &nbsp;
    <input type = "number" name = "minut" min = '0'> минут<br>
    <p>Дополнительные услуги:</p>
    <input type = "checkbox" name = "gps"> GPS  (минимум 1 час)<br>
    <input type = "checkbox" name = "driver"> дополнительный водитель<br>
    <input type = "submit" name = "submit" value = "Рассчитать тариф"><br>
</form>
</body>
</html>
<?php
require './init.php';
?>