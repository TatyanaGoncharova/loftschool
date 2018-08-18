<?php
function task1($mas, $flag = false)
{
    if ($flag) {
        return implode('!', $mas);
    } else {
        array_map(function ($item) {
            echo '<p>' . $item . '</p>';
        }, $mas);
    }
}

function task2(...$arg)
{
    $res = 0;
    for ($i = 0; $i < count($arg); $i++) {
        $res = $res . $arg[0] + $arg[$i];
    }
    return($res);
}

function task3($one, $two)
{
    if (is_int($one) && is_int($two)) {
        echo '<table border="1">';
        for ($i = 1; $i <=$one; $i++) {
            echo '<tr>';
            for ($j = 1; $j <=$two; $j++) {
                echo '<td>&nbsp;' . $j * $i . '&nbsp;</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Некорректный ввод данных - введите целые числа';
        return false;
    }
}

function task4()
{
    echo 'Сейчас ' . date('d.m.Y G:i',time()) . '<br>';
    echo mktime(0, 0, 0, 2, 24, 2016);
}

function task5($str)
{
    if (strpos($str, 'К')!==false) {
        return str_replace('К', '', $str);
    }
    return str_replace('Две', 'Три', $str);
}

function readFiles($fileName)
{
    return file_get_contents($fileName);

}