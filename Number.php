<?php

$number = 1;
$rows = 4;

for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $number . " ";
        $number++;
    }
    echo "<br>";
}

?>
