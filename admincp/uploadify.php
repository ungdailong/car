<?php
define('DIR_APP', 'admincp');
include ("config.php");
include('../application/libraries/autoload.php');
$db = new Database;
$db->connect($dbhost, $dbuser, $dbpass, $dbname);
$mod = new Module;
$mod -> model('slider/model/query');
$ModelSlider = new ModelSlider();


		//print_r(json_encode($_SESSION));
//session_start();

//die();
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
*/

// Define a destination
$targetFolder = 'slider'; // Relative to the root

$typeSlide = $_POST['object'];
$recordId = intval($_POST['recordId']);

$file  = fopen("text123.txt", "w");
fwrite($file,$typeSlide);
fclose($file);

Tool :: addImageSlide('slider',$ModelSlider,$typeSlide,$recordId);
/*
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = _path_image . $targetFolder;
	$file  = fopen("text123.txt", "w");
	//fwrite($file,$_SERVER['DOCUMENT_ROOT'] . $targetFolder);
	fwrite($file,$_FILES['Filedata']['tmp_name']);
	fclose($file);
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);

	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
*/
?>