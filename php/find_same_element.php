<?php
function findSameElement($arr1, $arr2)
{
	$count1 = count($arr1);
	$count2 = count($arr2);
	$index1 = 0;
	$index2 = 0;
	$same_arr = [];
	while($index1 < $count1 && $index2 < $count2) {
		if ($arr1[$index1] > $arr2[$index2]) {
			$index2++;
		} elseif ($arr1[$index1] < $arr2[$index2]) {
			$index1++;
		} else {
			$same_arr[] = $arr1[$index1];
			$index1++;
			$index2++;
		}
	}
	return array_unique($same_arr);
}

$arr1 = [1, 2, 3, 4];
$arr2 = [3, 4, 6];
echo implode(',', findSameElement($arr1, $arr2)), "\n";