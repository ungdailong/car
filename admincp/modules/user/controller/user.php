<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class User extends Module {

	function __construct() {
	
		$this->lang('user');
	
		$this->model('user/model/query');
		
	}

	function index(){
            
		$rowpage = PAGE_ROWS;
		$curpage = CUR_ROWS;
		$getpage = empty($_GET['page']) ? 1 : $_GET['page'];
		$offset = ($getpage - 1) * $rowpage;
			
		$sql = "select u.*, g.group_name as group_id from #__users u left join #__user_group g on g.id = u.group_id";
		$num = $this->num($sql);
		
		$query = $num > 0 ? $sql ." Limit $offset, $rowpage" : $sql;
		
		$data['rows'] = $this->rows($query);
		
		// Load Paging
		$data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=user");
		
		$this->view('user/view/list', $data);
	}
	
	function delete() {
		
		if( empty($_POST['id']) ) {
			$_SESSION['message'] = LANG_CHOOSE_ID;
		}
		else {
			if( ModelUser::delete($_POST['id']) ) {
				$_SESSION['message'] = LANG_DELETE_SUCCESS;
			}
			else {
				$_SESSION['message'] = LANG_DELETE_FAILED;
			}
		}	
		$this->redirect('index.php?p=user');
	}
	
	function add() {
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
			extract($_POST);
			
			if( empty($username) ||  empty($password) ||  empty($email) ) {
				$_SESSION['message'] = LANG_REQUIRE;
			}
			else if( ModelUser::getuser() ) {
				$_SESSION['message'] = LANG_USER_ERROR_USERNAME;
			}
			else if( $email == "") {
				$_SESSION['message'] = LANG_ERROR_EMAIL;
                                $data['error'] = 'error';
                                $data['group'] = $this->rows('select * from #__user_group');
                                $data['group_id'] = $_POST['group_id'];
                                $data['full_name'] = $_POST['fullname'];
                                $data['user_name'] = $_POST['username'];
                                $data['email'] = $_POST['email'];
                                $data['publish'] = $_POST['publish'];
                                $this->view('user/view/add', $data);
                                return;
			}
			else {
				if( ModelUser::insert() ) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=user');
				}
				else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
			} 
			
		}
		
		// Load Group
		$data['group'] = $this->rows('select * from #__user_group');
	
		$this->view('user/view/add', $data);
	}
	
	function edit() {
		
		extract($_POST);
		if($_GET['id']=='') $_GET['id'] = $_SESSION['admin_id'];
		// Update data
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if( empty($username) ||  empty($email) ) {
				$_SESSION['message'] = LANG_REQUIRE;
			}
			else if( ($email) == "" ) {
				$_SESSION['message'] = LANG_ERROR_EMAIL;
			}
			else {
				if( ModelUser::update($_GET['id']) ) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					if($_SESSION['admin_group_id']==1)
						$this->redirect('index.php?p=user');
					else
						$this->redirect('index.php?p=user&q=edit');
				}
				else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
			}
		}
		
		// Load Group
		$data['group'] = $this->rows('select * from #__user_group');
		
		// Load data
		$row = $this->row('select * from #__users where id = "'.$_GET['id'].'"');
		
		$data['fullname'] = empty($fullname) ? $row['fullname'] : $fullname;		
		$data['username'] = empty($username) ? $row['username'] : $username;		
		$data['email'] = empty($email) ? $row['email'] : $email;
		$data['group_id'] = empty($group_id) ? $row['group_id'] : $group_id;
		$data['publish'] = empty($publish) ? $row['publish'] : $publish;
		
		$this->view('user/view/add', $data);
	}
	
	function login() {
	
		if($_SERVER['REQUEST_METHOD']=='POST') {
			$row = $this->row('select * from #__users where username = "'.addslashes($_POST['username']) .'" and publish = 1');
			//echo md5(sha1(addslashes($_POST['password'])));die();
			if($row) {						
				if(md5(sha1(addslashes($_POST['password'])))==$row['password']){
					$_SESSION['isLoggedIn'] = true;
					$_SESSION['user'] = $row['username'];
					$_SESSION['admin_id'] = $row['id'];
					$_SESSION['admin_user'] = $row['username'];
					$_SESSION['admin_name'] = $row['fullname'];
					$_SESSION['admin_email'] = $row['email'];
					$_SESSION['admin_group_id'] = $row['group_id'];			
					
                                        $this->redirect();
				}else{
					$this->aRedirect(LANG_USER_INCORRECT,Module::url('index.php?p='.$_GET['p']));
				}
			}
			else{
				$this->aRedirect(LANG_USER_INCORRECT,Module::url('index.php?p='.$_GET['p']));
			}
		}
	
		$this->view('user/view/login');
	}
	
	function logout() {		
		unset($_SESSION['isLoggedIn']);
		unset($_SESSION['user']);
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_user']);
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_email']);
		unset($_SESSION['admin_view']);
		unset($_SESSION['admin_add']);
		unset($_SESSION['admin_edit']);
		unset($_SESSION['admin_delete']);
		unset($_SESSION['admin_group_id']);
		session_destroy();
		$this->redirect();
	}
	//publish
	function publish(){
		$this->query("Update #__users Set publish=if(publish='1','0','1') Where id=".$_GET['id']."");	
		$this->redirect('index.php?p='.$_GET['p']);
	}
	//publish
	function remove(){
		$this->query("Delete From #__users Where id=".$_GET['id']);	
		$this->redirect('index.php?p='.$_GET['p']);
	}

}

?>