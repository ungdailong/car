<?php if(!defined('DIR_APP')) die('Your have not permission'); 
class Left {
	function index(){
		global $db, $mod;
		$mod->lang('menu');
		$mod->view('left/view/form');
	}	
}
?>