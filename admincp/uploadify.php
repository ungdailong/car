<?php
define('DIR_APP', 'admincp');
include ("config.php");
include('../application/libraries/autoload.php');
$db = new Database;
$db->connect($dbhost, $dbuser, $dbpass, $dbname);
$mod = new Module;
$mod -> model('slider/model/query');
$ModelSlider = new ModelSlider();
$typeSlide = $_POST['object'];
$recordId = intval($_POST['recordId']);
Tool :: addImageSlide('slider',$ModelSlider,$typeSlide,$recordId);
?>