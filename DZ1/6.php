<?php
echo '<table>';
for ($i = 1; $i <=10; $i++) {
    echo '<tr>';
    for ($j = 1; $j <=10; $j++) {
        if ($i%2 != 0 && $j%2 != 0) {
            echo "<td> $j * $i = [" . $j * $i . "]</td>";
        } elseif ($i % 2 == 0 && $j % 2 == 0) {
            echo "<td> $j * $i = (" . $j * $i . ")</td>";
        } else {
            echo "<td> $j * $i = " . $j * $i . "&nbsp;</td>";
        }
    }
    echo '</tr>';
}
echo '</table>';
