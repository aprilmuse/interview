<?php
function reverseArr1($arr)
{
	$count = count($arr);
	for ($i = 0, $half = $count/2; $i < $half; $i++) {
		$tmp = $arr[$i];
		$arr[$i] = $arr[$count - 1 - $i];
		$arr[$count-1-$i] = $tmp;
	}
	return $arr;
}

function reverseArr2($arr)
{
	$count = count($arr);
	$low = 0;
	$high = $count - 1;
	while($low < $high) {
		$tmp = $arr[$low];
		$arr[$low++] = $arr[$high];
		$arr[$high--] = $tmp; 
	}
	return $arr;
}

// i++ ：先引用后增加
// ++i ：先增加后引用

$arr = [1, 2, 3, 4, 5, 6];
echo implode(',', $arr), "\n";
$arr = reverseArr1($arr);
echo implode(',', $arr), "\n";
$arr = reverseArr2($arr);
echo implode(',', $arr), "\n";