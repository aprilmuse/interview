<?php
class Node {
	public $value;
	public $left;
	public $right;

	function __construct($value, $left = null, $right = null)
	{
		$this->value = $value;
		$this->left = $left;
		$this->right = $right;
	}
}

function preOrderTraversal($node)
{
	if ($node == null) {
		return;
	}
	visite($node->value);
	preOrderTraversal($node->left);
	preOrderTraversal($node->right);
}

function preOrderTraversalLinear($node)
{
	if ($node == null) {
		return;
	}
	$stack = [];
	array_push($stack, $node);
	while ($stack) {
		$node = array_pop($stack);
		visite($node->value);
		if ($node->right) {
			array_push($stack, $node->right);
		}
		if ($node->left) {
			array_push($stack, $node->left);
		}
	}
}

function inOrderTraversal($node)
{
	if ($node == null) {
		return;
	}
	inOrderTraversal($node->left);
	visite($node->value);
	inOrderTraversal($node->right);
}	



function inOrderTraversalLinear($node)
{
	if ($node == null) {
		return;
	}
	$stack = [];
	$center = $node;
	while ($stack || $center) {
		while ($center) {
			array_push($stack, $center);
			$center = $center->left;
		}
		
		$center = array_pop($stack);
		visite($center->value);
		$center = $center->right;
	}
}

function postOrderTraversal($node)
{
	if ($node == null) {
		return;
	}
	postOrderTraversal($node->left);
	postOrderTraversal($node->right);
	visite($node->value);
}



function postOrderTraversalLinear($node)
{
	if ($node == null) {
		return;
	}
	$stack = [];
	$outstack = [];
	array_push($stack, $node);
	while ($stack) {
		$node = array_pop($stack);
		array_push($outstack, $node);
		if ($node->left) {
			array_push($stack, $node->left);
		}
		if ($node->right) {
			array_push($stack, $node->right);
		}
	}
	while ($outstack) {
		$node = array_pop($outstack);
		visite($node->value);
	}
}

function breadthFirstTraversal($node)
{
	$queue = [];
	array_push($queue, $node);
	while ($queue) {
		$node = array_shift($queue);
		visite($node->value);
		if ($node->left) {
			array_push($queue, $node->left);
		}
		if ($node->right) {
			array_push($queue, $node->right);
		}		
	}
	
}

function testInOrderTraverse($node)
{
	if ($node == null) {
		return;
	}
	$stack = [];
	$center = $node;
	while ($stack || $center) {
		while($center) {
			array_push($stack, $center);
			$center = $center->left;
		}
		$center = array_pop($stack);
		visite($center->value);
		$center = $center->right;
	}
}

function testPostOrder($node)
{
	if ($node == null) {
		return null;
	}
	$stack = [];
	$outstack = [];
	array_push($stack, $node);
	while ($stack) {
		$node = array_pop($stack);
		array_push($outstack, $node);
		if ($node->left) {
			array_push($stack, $node->left);
		}
		if ($node->right) {
			array_push($stack, $node->right);
		}
	}
	while ($outstack) {
		$node = array_pop($outstack);
		visite($node->value);
	}
}

function testPreOrder($node)
{
	if ($node == null) {
		return null;
	}
	$stack = [];
	array_push($stack, $node);
	while ($stack) {
		$node = array_pop($stack);
		visite($node->value);
		if ($node->right) {
			array_push($stack, $node->right);
		}
		if ($node->left) {
			array_push($stack, $node->left);
		}
	}
}

function mirror_recursive($root) 
{
	if ($root == null) {
		return;
	}
	$tmp = $root->left;
	$root->left = $root->right;
	$root->right = $tmp;
	mirror_recursive($root->left);
	mirror_recursive($root->right);
}

function mirror_unrecursive($root) 
{
	if ($root == null) {
		return;
	}
	$queue = [];
	array_push($queue, $root);
	while ($queue) {
		$node = array_shift($queue);
		if ($node->right != null) {
			array_push($queue, $node->right);
		}
		if ($node->left != null) {
			array_push($queue, $node->left);
		}
		$tmp = $node->left;
		$node->left = $node->right;
		$node->right = $tmp;
	}
}


function visite($value)
{
	echo $value . ' ';
}

/*
				a
		b 				c
	d   	e 		f 		g

*/

/*
				a
		c 				b
	g   	f 		e 		d
*/
$d = new Node('d');
$e = new Node('e');
$f = new Node('f');
$g = new Node('g'); 
$b = new Node('b', $d, $e);
$c = new Node('c', $f, $g);
$a = new Node('a', $b, $c);
// $a=[0,1,2,3]; $b=[1,2,3,4,5]; $a+=$b; var_dump($a);exit;
// $a=[1,2,3]; foreach($a as &$v){} foreach($a as $v){} var_dump($a);exit;


preOrderTraversal($a);
echo "\n";
mirror_recursive($a);
preOrderTraversal($a);
echo "\n";
mirror_unrecursive($a);
preOrderTraversal($a);
echo "\n";
exit;
preOrderTraversalLinear($a);
echo "\n";
inOrderTraversal($a);
echo "\n";
inOrderTraversalLinear($a);
echo "\n";
postOrderTraversal($a);
echo "\n";
postOrderTraversalLinear($a);
echo "\n";
breadthFirstTraversal($a);
echo "\n";
