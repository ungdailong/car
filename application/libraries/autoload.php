<?php if(!defined('DIR_APP')) die('Your have not permission'); 
error_reporting(E_ALL);
session_start();
@ob_start("ob_gzhandler");

$dir = glob(dirname(__FILE__) .'/*', GLOB_NOCHECK);
foreach($dir as $file) {

	$name = basename($file);
	$ext = explode('.', $name);
	
	if($ext[0] != 'autoload' && @$ext[1] == 'php' ) {
		include_once($file);
	}
}		
?>