<?php
function insertSort($array)
{
	for ($i = 1, $count = count($array); $i < $count; $i++) {
		for ($j = $i; $j > 0 && $array[$j] < $array[$j-1]; $j--) {
			$tmp = $array[$j];
			$array[$j] = $array[$j-1];
			$array[$j-1] = $tmp;
		}
		print_r(implode(',', $array) . "\n");
	}
}

function insertSort2($array)
{
	for ($i = 1, $count = count($array); $i < $count; $i++) {
		$tmp = $array[$i];
		for ($j = $i - 1; $j >= 0 && $array[$j] > $tmp; $j--) {
			$array[$j+1] = $array[$j];
		}
		if ($j != $i - 1) {
			$array[$j + 1] = $tmp;
		}
		print_r(implode(',', $array) . "\n");
	}
}

$array = [10, 2, 36, 14, 10, 25, 23, 85, 99, 45];
echo implode(',', $array) . "\n";


// 2 10 36 

// insertSort($array);
insertSort2($array);

# 时间复杂库 O(n^2)