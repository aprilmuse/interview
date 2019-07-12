<?php
function getPrime($n)
{
	if  ($n < 2) {
		return [];
	}
	$prime = [2];// 2是质数
	for ($i = 3; $i < $n; $i = $i + 2) {// 跳过偶数 
		$sqrt = intval(sqrt($i));
		for ($j = 3; $j <= $sqrt; $j = $j + 2) {// 奇数不能被偶数整除,可以加快步长
			if ($i % $j == 0) {
				break;
			}
		}
		if ($j > $sqrt) {
			$prime[] = $i;
		}
	}
	return $prime;
}

echo implode(',', getPrime(10)), "\n";
#（质数筛选定理）n不能够被不大于根号n的任何质数整除，则n是一个质数
# 除了2的偶数非质数