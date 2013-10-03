<?php

if (! defined ( 'DIR_APP' ))
	die ( 'Your have not permission' );
class subcribe extends Module {
	function __construct() {
		global $db, $mod;
		$this->lang ( 'news' );
		$this->lang ( 'user' );
		$this->model ( $_GET ['p'] . '/model/query' );
	}
	function index() {
		$rowpage = PAGE_ROWS_ADMIN;
		$curpage = CUR_ROWS;
		$getpage = empty ( $_GET ['page'] ) ? 1 : $_GET ['page'];
		$offset = ($getpage - 1) * $rowpage;

		$sql = "select * from #__subcribe order by id desc";
		$num = $this->num ( $sql );
		$query = $num > 0 ? $sql . " Limit $offset, $rowpage" : $sql;

		$data ['rows'] = $this->rows ( $query );

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
			if (ModelSubcribe::delete ( $_POST ['id'] )) {
				$_SESSION ['message'] = LANG_DELETE_SUCCESS;
			} else {
				$_SESSION ['message'] = LANG_UPDATE_FAILED;
			}
		}

		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}


	function remove() {
		$this->query ( "Delete From #__subcribe Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
	function publish() {
		$this->query ( "Update #__subcribe Set approve=if(approve='Y','N','Y') ,date_update=" . time () . " Where id=" . $_GET ['id'] );
		$this->redirect ( 'index.php?p=' . $_GET ['p'] );
	}
}

?>