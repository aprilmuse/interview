<?php
$all_pokers = [];
foreach (['a', 'b', 'c', 'd'] as $i) {
	for ($j = 1; $j < 14; $j++) { 
		$all_pokers[] = ['color' => $i, 'number' => $j];
	}
}

$all_pokers[] = ['color' => 'big', 'number' => 0];
$all_pokers[] = ['color' => 'small', 'number' => 0];

function checkOneByOne($pokers)
{ 
	$zero_count = 0;
	$max = 0;
	$min = 14;
	foreach ($pokers as $value) {
		if ($value['number'] == 0) {
			$zero_count++;
		} else {
			if (!isset($count[$value['number']])) {
				$count[$value['number']] = 1;
			} else {// 相同数字出现且不是大小王不是顺子
				return false;
			}
			$max = max($max, $value['number']);
			$min = min($min, $value['number']);
		}		
	}

	if ($zero_count == 0 && $max - $min == 4) {
		return true;
	} elseif ($zero_count == 1 && in_array($max - $min, [3, 4])) {
		return true;
	} elseif ($zero_count == 2 && in_array($max - $min, [2, 3, 4])) {
		return true;
	}
	return false;
}

function checkOneByOne2($pokers)
{
	$zero_count = 0;
	$distance = 0;
	$number_filter_zero = [];
	foreach ($pokers as $value) {
		if ($value['number'] == 0) {
			$zero_count++;
		} else {
			if (!isset($count[$value['number']])) {
				$count[$value['number']] = 1;
			} else {// 相同数字出现且不是大小王不是顺子
				return false;
			}
			$number_filter_zero[] = $value['number'];
		}		
	}
	sort($number_filter_zero);
	for ($i=0,$count = count($number_filter_zero); $i < $count - 1; $i++) { 
		$distance += $number_filter_zero[$i+1] - $number_filter_zero[$i] - 1;
	}
	if ($distance > $zero_count) {
		return false;
	}
	return true;
}

function createPokers($all_pokers)
{
	$pokers = [];
	while (count($pokers) < 5) { 
		$tmp = rand(0, 53);
		if (!in_array($all_pokers[$tmp], $pokers)) {
			$pokers[] = $all_pokers[$tmp];
		}
	}
	return $pokers;
}

for ($i = 0; $i < 100; $i++) {
	$pokers = createPokers($all_pokers);
	if (checkOneByOne($pokers)) {
		foreach ($pokers as $value) {
			echo $value['color'] . $value['number'] . ' ';
		}
		echo "\n";
	}

	if (checkOneByOne2($pokers)) {
		foreach ($pokers as $value) {
			echo  $value['color'] . $value['number'] . ' ';
		}
		echo " 2\n";
	}
}

