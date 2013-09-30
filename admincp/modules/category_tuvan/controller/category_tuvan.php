<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Category_tuvan extends Module {

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

        //if($getpage == 1)


        $sql = "select ct.* from #__category_tu_van ct order by caid desc";


        $num = $this->num($sql);

        $query = $num > 0 ? $sql . " Limit $offset, $rowpage" : $sql;

        $data['rows'] = $this->rows($query);

        // Load Paging
        $data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=" . $_GET['p']);
        //Load Type

        $data['countrows'] = ($rowpage * $getpage) - $rowpage + 1;

        $this->view($_GET['p'] . '/view/list', $data);
    }

    function delete() {

        if (empty($_POST['id'])) {
            $_SESSION['message'] = LANG_CHOOSE_ID;
        } else {
            if (ModelCategory::delete($_POST['id'])) {
                $_SESSION['message'] = LANG_DELETE_SUCCESS;
            } else {
                $_SESSION['message'] = LANG_DELETE_SUCCESS;
            }
        }

        $this->redirect('index.php?p=' . $_GET['p']);
    }

    function add() {
		global $db, $mod;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if (empty($name)) {
                $_SESSION['message'] = LANG_REQUIRE;
            } else {
				if (ModelCategoryTuvan::insert()) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=' . $_GET['p']);
				} else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}

            }
        }
        $sql = "select ct.* from #__category_tu_van ct where ct.parent_id = 0";
        $data['rows'] = $this->rows($sql);
        $this->view($_GET['p'] . '/view/add', $data);
    }

    function edit() {
		global $db, $mod;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);

            // Update data
            if (empty($name)) {
                $_SESSION['message'] = LANG_REQUIRE;
            } else {
                if (ModelCategoryTuvan::update($_GET['id'])) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=' . $_GET['p']);
				} else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
            }
        }
        // Load data
        $row = $this->row('select * from #__category_tu_van where caid = "' . $_GET['id'] . '"');
        $data = array();

        $data['publish'] = empty($publish) ? $row['status'] : $publish;
        $data['name'] = empty($name) ? $row['name'] : $name;
		$data['description'] = $row['description'];

        $sql = "select ct.* from #__category_tu_van ct where ct.caid <> '" . $_GET['id'] . "'";
        $data['rows'] = $this->rows($sql);

        $this->view($_GET['p'] . '/view/add', $data);
    }

    //publish
    function publish() {
        $this->query("Update #__category Set status=if(status='1','0','1') Where caid=" . $_GET['id']);
        //echo "Update #__category Set status=if(status='1','0','1') Where caid=" . $_GET['id'];
        $this->redirect('index.php?p=' . $_GET['p']);
    }

    //publish
    function remove() {
        $row=$this->row("Select * From #__category Where caid=" . $_GET['id']);

		$this->query("Delete From #__category Where caid=" . $_GET['id']);

        $this->redirect('index.php?p=' . $_GET['p']);
    }

}

?>