<?php

if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class slider extends Module {
	function __construct() {
		global $db, $mod;
		$this->lang ( 'news' );
		$this->lang ( 'user' );
		$this->model ( $_GET ['p'] . '/model/query' );
	}
	function index() {
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			foreach ($_FILES as $key => $value){
				if($value['name'] != '' && $value['name'] != null){
					$imga = $value ['type'];
					$img_name = $value ['name'];
					$_GET ['id'] = $_POST['id_'.$key];
					$_FILES ['image'] = $value;
					//print_r($_FILES ['image']);die();
					Tool :: editImage('slider',ModelSlider);
				}
			}
		}

		$sql = "select * from #__slide where type = 'header' order by id asc";

		$query = $sql;

		$data ['rows'] = $this->rows ( $query );
		$data ['countrows'] = 5;

		$this->view ( $_GET ['p'] . '/view/list', $data );
	}



	function publish() {
		$this->query ( "Update #__slide Set hide=if(hide='Y','N','Y') ,date_create=" . time () . " Where id=" . $_GET ['id'] );
		//echo "Update #__slide Set hide=if(hide='Y','N','Y') ,date_create=" . time () . " Where id=" . $_GET ['id'];
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}

	// publish
	function remove() {
		$row = $this->row ( 'select * from #__slide where id = "' . $_GET ['id'] . '"' );
		$img = $row ['hinh'];
		unlink ( "../application/static/upload/images/slider/" . $img );
		unlink ( "../application/static/upload/images/slider/small_" . $img );

		$this->query ( "Delete From #__slide Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
}

?>