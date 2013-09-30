<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class dinhcu extends Module {

    function __construct() {
        global $db, $mod;
        $this->lang('news');
        $this->lang('user');
        $this->model($_GET['p'] . '/model/query');
    }

    function index() {
    	$rowpage = PAGE_ROWS_ADMIN;
    	$curpage = CUR_ROWS;
    	$getpage = empty($_GET['page']) ? 1 : $_GET['page'];
    	$offset = ($getpage - 1) * $rowpage;
    	
        $sql = "select * from #__chuong_trinh_dinh_cu order by id desc";
        $num = $this->num($sql);
        $query = $num > 0 ? $sql . " Limit $offset, $rowpage" : $sql;

        $data['rows'] = $this->rows($query);
        
        // Load Paging
        $data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=" . $_GET['p']);
        //Load Type

        $data['countrows'] = ($rowpage * $getpage) - $rowpage + 1;

       
        $data['title'] = $data['rows'][0]['title'];
        //$data['content'] = $data['rows'][0]['content'];
        $data['hide'] = $data['rows'][0]['hide'];
        $this->view($_GET['p'] . '/view/list', $data);
    }

    function delete() {

        if (empty($_POST['id'])) {
            $_SESSION['message'] = LANG_CHOOSE_ID;
        } else {
            if (ModelDinhcu::delete($_POST['id'])) {
                $_SESSION['message'] = LANG_DELETE_SUCCESS;
            } else {
                $_SESSION['message'] = LANG_UPDATE_FAILED;
            }
        }

        $this->redirect('index.php?p=' . $_GET['p']);
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            extract($_POST);

            if (empty($title)) {
                $_SESSION['message'] = LANG_REQUIRE;
            } else {
                
                    if (ModelDinhcu::insert()) {
                        $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                        $this->redirect('index.php?p=' . $_GET['p']);
                    } else {
                        $_SESSION['message'] = LANG_UPDATE_FAILED;
                    }
                }
            }
        
        $this->view($_GET['p'] . '/view/add');
    }
	
    function edit(){
    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    		extract($_POST);
    		if (empty($title)) {
    			$_SESSION['message'] = LANG_REQUIRE;
    		}
    		else {
    				if (ModelDinhcu::update($_GET['id'])) {
    					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
    					//$this->redirect('index.php?p=' . $_GET['p']);
    				} else {
    					$_SESSION['message'] = LANG_UPDATE_FAILED;
    				}
    		}
    	}
    	$row = $this->row('select * from #__chuong_trinh_dinh_cu where id = "' . $_GET['id'] . '"');
    	//print_r($row);
    	$data = array();
    	$data['title'] = $row['title'];
    	$data['intro'] = $row['intro'];
    	$data['content'] = $row['content'];
    	
    	
    	$data['trang_chu'] = $row['trang_chu'];
    	$data['hide'] = $row['hide'];
    	$this->view($_GET['p'] . '/view/add',$data);
    }
    
	function homepageshow(){
		$this->query("Update #__chuong_trinh_dinh_cu Set trang_chu=0 Where trang_chu=1 and id <>".$_GET['id']);
		$this->query("Update #__chuong_trinh_dinh_cu Set trang_chu=if(trang_chu='1','0','1'),date_create=".time()." Where id=" . $_GET['id']);
		$this->redirect('index.php?p=' . $_GET['p']);
	}
    //publish
    function publish() {
        $this->query("Update #__chuong_trinh_dinh_cu Set hide=if(hide='1','0','1') ,date_create=".time()." Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

    //publish
    function remove() {
        $this->query("Delete From #__chuong_trinh_dinh_cu Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

}

?>