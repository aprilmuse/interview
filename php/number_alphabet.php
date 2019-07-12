<?php
function numberAlphabet($str)
{
	$numbers = preg_split('/[a-z]/', $str, -1, PREG_SPLIT_NO_EMPTY);
	$alphabet = preg_split('/\d/', $str, -1, PREG_SPLIT_NO_EMPTY);
	foreach ($numbers as $key => $value) {
		echo "$value : " , $alphabet[$key], ",";
	}
	echo "\n";
}

$str = '1a3bb44a2ac';
numberAlphabet($str);