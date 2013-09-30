<?php

if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class tintuc_trangchu extends Module {
	function __construct() {
		global $db, $mod;
		$this->lang ( 'news' );
		$this->lang ( 'user' );
		$this->model ( $_GET ['p'] . '/model/query' );
	}
	function index() {
		$data ['rows'] = ModelTintucTrangchu :: getAllTinTuc(0,3);
		$this->view ( $_GET ['p'] . '/view/list', $data );
	}


	function edit() {
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			extract ( $_POST );
			Tool :: editImage('tintuc',ModelTintucTrangchu);
		}
		$row = ModelTintucTrangchu :: getRecordById($_GET ['id']);
		$data = array ();
		$data ['title'] = $row ['title'];
		$data ['content'] = $row ['content'];
		$this->view ( $_GET ['p'] . '/view/add', $data );
	}
	function homepageshow() {
		//$this->query ( "Update #__tin_tuc Set trang_chu=0 Where trang_chu=1 and id <>" . $_GET ['id'] );
		$this->query ( "Update #__tin_tuc Set trang_chu=if(trang_chu='1','0','1'),date_create=" . time () . " Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
	// publish
	function publish() {
		$this->query ( "Update #__tin_tuc Set hide=if(hide='1','0','1') ,date_create=" . time () . " Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}

}

?>