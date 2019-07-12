<?php
Class Node {
	public $data;
	public $next;
	function __construct($data)
	{
		$this->data = $data;
		$this->next = null;
	}
}

Class SingleLink
{
	public $head = null;

	function __construct()
	{
		$head = null;
	}

	function insert(Node $node)
	{
		if ($this->head === null) {
			$this->head = $node;
		} else {
			$head = $this->head;
			while ($head->next) {
				$head = $head->next;
			}
			$head->next = $node;
		}
		return $this->head;
	}

	function traverse()
	{
		$current = $this->head;
		while ($current) {
			echo $current->data, "\t";
			$current = $current->next;
		}
		echo "\n";
	}

	function getLength()
	{
		$current = $this->head;
		$length = 0;
		while ($current) {
			$length++;
			$current = $current->next;
		}
		return $length;
	}

	function deleteLink($data)
	{
		$current = $this->head;
		if ($current->data == $data) {
			$this->head = $current->next;
		} else {
			$next = $current->next;
			while ($next) {
				if ($next->data == $data) {
					$current->next = $next->next;
					break;
				}
				$current = $next;
				$next = $current->next;
			}
		}
	}

	function testCircle()
	{
		$p = $this->head;
		$q = $this->head;

		while ($p && $q) {
			$p = $p->next;
			$q = $q->next;
			if ($q) {
				$q = $q->next;
			} else {
				return false;
			}
			if ($p == $q) {
				return true;
			}
		}
		return false;
	}

	function testCirClePro()
	{
		$p = $this->head;
		$q = $this->head;

		$p_steps = 0;
		$q_steps = 0;
		while ($p) {
			$p = $p->next;
			$p_steps++;
			while ($q) {
				$q = $q->next;
				$q_steps++;
				if ($p == $q) {
					if ($p_steps == $q_steps) {
						break;
					} else {
						return $q_steps;
					}
				}
			}
			$q_steps = 0;
			$q = $this->head;
		}
		return -1;
	}
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);
$node7 = new Node(7);

$link1 = new SingleLink();
$link1->insert($node1);
$link1->insert($node2);
$link1->insert($node3);
$link1->insert($node4);
$link2 = new SingleLink();
$link2->insert($node5);
$link2->insert($node6);
$link2->insert($node7);
$link2->insert($node3);
// $link2->insert($node4);
// var_dump($link1);exit;
$length1 = $link1->getLength();
// var_dump($length2);exit;
$length2 = $link2->getLength();
$head1 = $link1->head;
$head2 = $link2->head;
// var_dump($head1);exit;
if ($length1 > $length2) {
	while ($length1 > $length2) {
		$head2 = $head2->next;
		$length1--;
	}
} elseif ($length1 < $length2) {
	while ($length1 < $length2) {
		$head2 = $head2->next;
		$length2--;
	}
}
while ($head1 && $head2 && $head1->data != $head2->data ) {
	$head1 = $head1->next;
	$head2 = $head2->next;
}
var_dump($head1->data);


// $link->insert($node3);
// $link->traverse();
// $link->deleteLink(1);
// $link->traverse();
// var_dump($link->testCircle());
// var_dump($link->testCirClePro());
// var_dump($link);