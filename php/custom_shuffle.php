<?php
function customShuffle($arr)
{
	$count = count($arr);
	for ($i = 0; $i < $count; $i++) {
		$rand = mt_rand(0, $count - 1);
		if ($rand != $i) {
			$tmp = $arr[$i];
			$arr[$i] = $arr[$rand];
			$arr[$rand] = $tmp;
		}
	}
	return $arr;
}

$arr = range(1, 10);
echo implode(',', customShuffle($arr)), "\n";