<?php
function getMinAbs($arr)
{
	$low = 0;
	$high = count($arr) - 1;
	while ($low < $high) {
		// var_dump([$low, $high]);
		if ($low == $high -1) {
			return abs($arr[$low]) > abs($arr[$high]) ? $arr[$high] : $arr[$low];
		}

		// 上下边界均为正数
		// var_dump([abs($arr[$high]), abs($arr[$low])]);
		if (abs($arr[$high]) == $arr[$high] && abs($arr[$low]) == $arr[$low]) {
			return $arr[$low];
		}
		// 上下边界均为负数
		if (abs($arr[$high]) == -$arr[$high] && abs($arr[$low]) == -$arr[$low]) {
			return $arr[$high];
		}

		$middle = intval(($low + $high)/2);
		// var_dump($middle);
		if ($arr[$middle] > 0) {
			$high = $middle;
		} elseif ($arr[$middle] < 0) {
			$low = $middle;
		} else {
			return $arr[$middle];
		}
		// var_dump([$low, $high]);
	}
	return $arr[$low];
}

$arr1 = [-1000, -10, -2, 1, 10000];
$arr2 = [0, 1000, 10000];
$arr3 = [-100, -20, -1, 20, 3000, 4000, 5000, 6000];
var_dump(getMinAbs($arr1));
var_dump(getMinAbs($arr2));
var_dump(getMinAbs($arr3));
