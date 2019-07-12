<?php
function checkRepeat($arr)
{
	$num_count = [];
	foreach ($arr as $value) {
		if (isset($num_count[$value])) {
			$num_count[$value] += 1;
		} else {
			$num_count[$value] = 1;
		}
	}
	foreach ($num_count as $key => $value) {
		if ($value == 1) {
			echo $key, "\n";
		}
	}
}

$arr = [1,2,3,3,2,1,5];
checkRepeat($arr);