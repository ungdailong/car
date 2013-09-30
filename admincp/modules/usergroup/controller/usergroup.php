<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class Usergroup extends Module {

	function __construct() {
	
		$this->lang('usergroup');
	
		$this->model('usergroup/model/query');
		
	}

	function index(){
		
		$rowpage = PAGE_ROWS;
		$curpage = CUR_ROWS;
		$getpage = empty($_GET['page']) ? 1 : $_GET['page'];
		$offset = ($getpage - 1) * $rowpage;
			
		$sql = "select * from #__user_group";
		$num = $this->num($sql);
		
		$query = $num > 0 ? $sql ." Limit $offset, $rowpage" : $sql;
		
		$data['rows'] = $this->rows($query);
		
		// Load Paging
		$data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=usergroup");
		
		$this->view('usergroup/view/list', $data);
	}
	
	function delete() {
		
		if( empty($_POST['id']) ) {
			$_SESSION['message'] = LANG_CHOOSE_ID;
		}
		else {
			ModelUserGroup::delete($_POST['id']);
			$_SESSION['message'] = LANG_DELETE_SUCCESS;
		}
	
		$this->redirect('index.php?p=usergroup');
	}
	
	function add() {
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
			extract($_POST);
			
			if( empty($group_name) ) {
				$_SESSION['message'] = LANG_REQUIRE;
			}
			else {
				if( ModelUserGroup::insert() ) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=usergroup');
				}
				else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
			}
			
		}
	
		$this->view('usergroup/view/add');
	}
	
	function edit() {
		
		extract($_POST);
		
		// Update data
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if( empty($group_name) ) {
				$_SESSION['message'] = LANG_REQUIRE;
			}
			else {
				if( ModelUserGroup::update($_GET['id']) ) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=usergroup');
				}
				else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
			}
		}
		
		// Load data
		$row = $this->row('select * from #__user_group where id = "'.$_GET['id'].'"');
		
		$data['group_name'] = empty($group_name) ? $row['group_name'] : $group_name;
		
		$this->view('usergroup/view/add', $data);
	}
	//publish
	function remove(){
		$this->query("Delete From #__user_group Where id=".$_GET['id']);	
		$this->redirect('index.php?p='.$_GET['p']);
	}

}

?>