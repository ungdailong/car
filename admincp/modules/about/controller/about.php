<?php

if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class about extends Module {
	function __construct() {
		global $db, $mod;
		$this->lang ( 'news' );
		$this->lang ( 'user' );
		$this->model ( $_GET ['p'] . '/model/query' );
	}
	function index() {
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			if (ModelAbout::update ())
				$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
			else
				$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
		}
		$sql = "select title,intro,content,date_create,hide from #__about";
		$num = $this->num ( $sql );
		$query = $sql;
		
		$data ['rows'] = $this->rows ( $query );
		$data ['countrows'] = 1;
		$data ['title'] = $data ['rows'] [0] ['title'];
		$data ['intro'] = $data ['rows'] [0] ['intro'];
		$data ['content'] = $data ['rows'] [0] ['content'];
		$data ['hide'] = $data ['rows'] [0] ['hide'];
		$this->view ( $_GET ['p'] . '/view/index', $data );
	}
}

?>