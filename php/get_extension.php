<?php
function getUrlExtension1($url)
{
	$infos = parse_url($url);
	$extension = explode('.', $infos['path'])[1];
	echo "$extension\n";
}

function getFileExtension1($file)
{
	$paths = explode('.', $file);
	$extension = $paths[count($paths) - 1];
	echo "$extension\n";
}

function getFileExtension2($file)
{
	$extension = substr($file, strrpos($file, '.') + 1);
	echo "$extension\n";
}

function getFileExtension3($file)
{
	$extension = substr(strrchr($file, '.'), 1);
	echo "$extension\n";
}

function getFileExtension4($file)
{
	$paths = explode('.', $file);
	$extension = end($paths);
	echo "$extension\n";
}

function getFileExtension5($file)
{
	$paths = pathinfo($file);
	$extension = $paths['extension'];
	echo "$extension\n";
}

function getFileExtension6($file)
{
	$extension = pathinfo($file, PATHINFO_EXTENSION);
	echo "$extension\n";
}

$url = 'http://www.sina.com.cn/abc/de/fg.php?id=1';
getUrlExtension1($url);

$file = 'x.y.z.png';
getFileExtension1($file);
getFileExtension2($file);
getFileExtension3($file);
getFileExtension4($file);
getFileExtension5($file);
getFileExtension6($file);