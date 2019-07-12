<?php
function checkClose($str)
{
	$array = str_split($str);
	$stack = [];
	$top = '';
	foreach ($array as $value) {
		if ($top == '') {
			array_push($stack, $value);
			$top = $value;
		} elseif ($top == $value) {
			array_push($stack, $value); 
		} else {
			array_pop($stack);
			$top = $stack ? end($stack) : '';
		}
	}
	if (empty($stack)) {
		echo ' close', "\n";
	} else {
		echo ' no close', "\n";
	}
}

$str = '((())),)(()),(()))),(((((()),(()()),()()';
$str = explode(',', $str);
foreach ($str as $key => $value) {
	echo $value, checkClose($value);
}
