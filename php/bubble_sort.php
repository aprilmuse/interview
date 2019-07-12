<?php
function bubble_sort($array)
{
    $count = count($array);
    for ($i = 1; $i < $count; $i++) { 
        $change = false;
        for ($j = 0; $j < $count - $i; $j++) { 
            if ($array[$j] > $array[$j+1]) {
                $change = true;
                $tmp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
            }
        }
        echo implode(',', $array) . "\n";
        if ($change == false) {
            break;
        }
    }
    echo implode(',', $array);
}
bubble_sort([10, 2, 36, 14, 10, 25, 23, 85, 99, 45]);
