<?php
function getMaxSub1($arr)
{
	$max = 0; 
	$sub_max = 0;
	for ($i = 0, $count = count($arr) - 1; $i < $count; $i++) {
		$sub_max += $arr[$i];
		if ($sub_max > $max) {
			$max = $sub_max;
		} elseif ($sub_max < 0) {
			$sub_max = 0;
		}
	}
	return $max;
}
/*
用数组A[N]记录所要求的数组，用数组B[N]来记录连续子段和的状态

通过分析，可以知道：

当B[K]>0时，无论B[K]为何值，B[K]=B[K-1]+A[K]

当B[K]<0时，也就是B[K]记录到一个A[J]是负的，可以把B[K]变成负的，那么B[J]记录的这一段应该截掉，应为无论后面的A[K]多大，加上个负数总不可能是最大的子段和，因此将B[K]=A[K]，重新开始记录。

 

故动态转移方程便可得出

B[K] = MAX(B[K-1]+A[K] , A[K])

 

看个实例

k      1       2       3        4
a[k]  3     -4       2        10
b[k]  3     -1       2        12
*/