<?php
function getEarlyDate($dates)
{
	$time = time();
	$min = 99999999999999;
	$early_date = '';
	foreach ($dates as $value) {
		$diff = abs($time - strtotime($value));
		// var_dump([date('Y-m-d H:i:s', $time), strtotime($value), $diff]);
		if ($diff < $min) {
			$min = $diff;
			$early_date = $value;
		}
	}
	echo $early_date;
}
date_default_timezone_set('UTC');
$dates = ['2018-05-31 16:15:11', '2018-05-31 16:16:11', '2018-05-30', '2018-06-30'];
getEarlyDate($dates);

