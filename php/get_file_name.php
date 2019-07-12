<?php
$dir = "/root/interview/";

function getFileName($dir)
{
	if (is_dir($dir)) {
	    if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	        	if (is_dir($dir . $file) && $file != '.' && $file != '..') {
	        		getFileName($dir . $file . '/');
	        	} elseif (!is_dir($dir . $file)) {
	        		echo $dir . $file . "\n";
	        	}
	        }
	        closedir($dh);
	    }
	}
}

getFileName($dir);