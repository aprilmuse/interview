<?php
function getDist($p1, $p2)
{
	return sqrt(pow($p1['x'] - $p2['x'], 2) + pow($p1['y'] - $p2['y'], 2));// 对角线长度
}

function getMiddlePoint($p1, $p2)
{
	return ['x' => ($p1['x'] + $p2['x'])/2, 'y' => ($p1['y'] + $p2['y'])/2]; 
}

function checkRectangle($p1, $p2, $p3, $p4)
{
	// 对角线相等,且对角线中点相同即对角线平分
	if (getDist($p1, $p2) == getDist($p3, $p4) && getMiddlePoint($p1, $p2) == getMiddlePoint($p3, $p4)) {
		return true;
	}
	return false;
}

function checkSquare($p1, $p2, $p3, $p4)
{
	if (checkRectangle($p1, $p2, $p3, $p4) && getDist($p1, $p3) == getDist($p1, $p4)) {
		return true;
	}
	return false;
}
$p1 = ['x' => 0, 'y' => 0];
$p2 = ['x' => 0, 'y' => 2];
$p3 = ['x' => 4, 'y' => 2];
$p4 = ['x' => 4, 'y' => 0];

var_dump(checkRectangle($p1, $p2, $p3, $p4) || checkRectangle($p1, $p3, $p2, $p4) || checkRectangle($p1, $p4, $p2, $p3));
var_dump(checkSquare($p1, $p2, $p3, $p4) || checkSquare($p1, $p3, $p2, $p4) || checkSquare($p1, $p4, $p2, $p3));