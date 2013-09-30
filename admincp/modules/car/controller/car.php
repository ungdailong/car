<?php
if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class car extends Module {
	function __construct() {
		global $db, $mod;
		$this->lang ( 'news' );
		$this->lang ( 'user' );
		$this->model ( $_GET ['p'] . '/model/query' );
		$this->model ( 'category' . '/model/query' );
	}
	function index() {
		$rowpage = PAGE_ROWS_ADMIN;
		$curpage = CUR_ROWS;
		$getpage = empty ( $_GET ['page'] ) ? 1 : $_GET ['page'];
		$offset = ($getpage - 1) * $rowpage;


		$data['rows'] = ModelCar :: getAllCar($offset,$rowpage);
		$num = ModelCar :: countCar();
		$category_ids = Tool :: getColumns($data ['rows'],'category_id');
		$data['category'] = Tool :: changeKey(ModelCategory :: getCatByIds($category_ids),'caid');
		// Load Paging
		$data ['paging'] = Paging::load ( $getpage, $num, $rowpage, $curpage, "index.php?p=" . $_GET ['p'] );
		// Load Type

		$data ['countrows'] = ($rowpage * $getpage) - $rowpage + 1;

		$this->view ( $_GET ['p'] . '/view/list', $data );
	}
	function delete() {
		if (empty ( $_POST ['id'] )) {
			$_SESSION ['message'] = LANG_CHOOSE_ID;
		} else {
			if (ModelCar::delete ( $_POST ['id'] )) {
				$_SESSION ['message'] = LANG_DELETE_SUCCESS;
			} else {
				$_SESSION ['message'] = LANG_UPDATE_FAILED;
			}
		}

		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
	function add() {
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

			extract ( $_POST );

			if (empty ( $name )) {
				$_SESSION ['message'] = LANG_REQUIRE;
			} else {
				Tool :: addImage('cars',ModelCar);
			}
		}
		$category = ModelCategory :: getAllCategory();
		$data['category'] = Tool :: changeArrayByKey($category,'parent_id');
		$this->view ( $_GET ['p'] . '/view/add', $data );
	}
	function edit() {
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			extract ( $_POST );
			if (empty ( $name )) {
				$_SESSION ['message'] = LANG_REQUIRE;
			} else {
				Tool :: editImage('cars',ModelCar);
			}
		}
		$row = ModelCar :: getRecordById($_GET ['id']);
		$data = array ();
		$data ['name'] = $row ['name'];
		$data ['price'] = $row ['price'];
		$data ['type_car'] = $row ['type_car'];
		$data ['intro'] = $row ['intro'];
		$data ['content'] = $row ['content'];
		$data ['uri'] = _path_image . 'cars/small_' . $row ['hinh'];
		$data ['image_name'] = $row ['hinh'];
		$data ['trang_chu'] = $row ['trang_chu'];
		$data ['hide'] = $row ['hide'];
		$data ['category_id'] = $row ['category_id'];
		$category = ModelCategory :: getAllCategory();
		$data['category'] = Tool :: changeArrayByKey($category,'parent_id');
		$data['thongso_kithuat'] = $row ['thongso_kithuat'];
		$this->view ( $_GET ['p'] . '/view/add', $data );
	}
	// publish
	function publish() {
		$this->query ( "Update #__cars Set hide=if(hide='Y','N','Y') ,date_update=" . time () . " Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}

	// publish
	function remove() {
		$row = $this->row ( 'select * from #__cars where id = "' . $_GET ['id'] . '"' );
		$img = $row ['hinh'];
		unlink ( "../application/static/upload/images/cars/" . $img );
		unlink ( "../application/static/upload/images/cars/small_" . $img );

		$this->query ( "Delete From #__cars Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
}

?>