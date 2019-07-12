<?php
function quickSortEasy($array)
{
	$count = count($array);
	if ($count == 0 || $count == 1) {
		return $array;
	}  else {
		$key = $array[0];
		$left_array = [];
		$right_array = [];
		for ($i = 1; $i < $count  ; $i++) { 
			if ($array[$i] < $key) {
				$left_array[] = $array[$i];
			} else {
				$right_array[] = $array[$i];
			}
		}
		return array_merge(quickSort($left_array), [$key], quickSort($right_array));
	}
}

function quickSort(&$array, $low, $high)
{
	while ($low < $high) {
		while ($low < $high && $array[$high] >= $array[$low]) {
			$high--;
		} 
		if ($array[$high] < $array[$low]) {
			$tmp = $array[$high];
			$array[$high] = $array[$low];
			$array[$low] = $tmp;
		}
		while ($low < $high && $array[$low] <= $array[$high]) {
			$low++;
		} 
		if ($array[$low] > $array[$high]) {
			$tmp = $array[$high];
			$array[$high] = $array[$low];
			$array[$low] = $tmp;
		}
	}
	return $low;
	// var_dump($low);exit;
	echo implode(',', $array) . " a \n";
	
	
}

function quickSortPro(&$array, $low, $high)
{
	if ($low < $high) {
		$pivot = quickSortTest($array, $low, $high);
		quickSortPro($array, $low, $pivot-1);
		quickSortPro($array, $pivot+1, $high);	
	}
	
}

function quickSortTest(&$array, $low, $high)
{
	if ($high <= $low) {
		return;
	}
	$low_ori = $low;
	$high_ori = $high;
	while ($high > $low) {
		while ($high > $low && $array[$low] <= $array[$high]) {
			$high--;
		}
		if ($array[$high] < $array[$low]) {
			$tmp = $array[$high];
			$array[$high] = $array[$low];
			$array[$low] = $tmp;
		}
		while ($high > $low && $array[$low] <= $array[$high]) {
			$low++;
		}
		if ($array[$high] < $array[$low]) {
			$tmp = $array[$high];
			$array[$high] = $array[$low];
			$array[$low] = $tmp;
		}
	}
	echo implode(',', $array) . " \n";
	quickSortTest($array, $low_ori, $high-1);
	quickSortTest($array, $low+1, $high_ori);
}

// echo implode(',', quickSort([10, 2, 36, 14, 10, 25, 23, 85, 99, 45]));
$array = [10, 2, 36, 14, 10, 25, 23, 85, 99, 45];
echo implode(',', $array), "\n";
quickSortTest($array, 0, count($array)-1);

# 性能最好O(nlogn) 最坏 O(n^2) 退化为插入排序
