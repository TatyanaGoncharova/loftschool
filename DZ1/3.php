<?php
$age = rand(0,100);
if ($age >= 18 && $age <= 65) {
    echo "Вам $age - еще работать и работать";
} elseif ($age > 65) {
    echo "Вам $age - пора на пенсию";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам $age - еще рано работать";
} else {
    echo "$age -неизвестный возраст";
}
