<?php
function checkPhone($str) 
{
	$pattern = '/^1[3-9]\d{9}$/';
	$match = preg_match($pattern, $str);
	echo $match ? 'it is telephone num' : 'not', "\n";
}

function checkEmail($str)
{
	$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/';
			   // '/^[_0-9a-z]+(\.[0-9a-z-_])*@[0-9a-z-]+(\.[0-9a-z-]+)*(\.[a-z]{2,})$/'
	$match = preg_match($pattern, $str);
	echo $match ? 'it is email' : 'not', "\n";
}

$str = '15800138000';
checkPhone($str);

$str = 'liyuanqing_lyq@163.com';
checkEmail($str);
