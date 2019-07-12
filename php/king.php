<?php
function king($n, $m)
{
	$monkey = range(1, $n);
	$i = 1;
	while (count($monkey) > 1) {
		$head = array_shift($monkey);
		if ($i % $m != 0) {
			array_push($monkey, $head);
		}
		$i++;
	}
	return $monkey[0];
}

echo king(8,2), "\n";


