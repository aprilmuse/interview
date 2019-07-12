<?php
function callbackFunction($array, $callback = null)
{
	if (is_callable($callback)) {
		foreach ($array as &$value) {
			$value = $callback($value);
		}
		unset($value);
	}
	return $array;
}

$array = [-1, -2, -3, -4, -5];
var_dump(callbackFunction($array, 'abs'));
