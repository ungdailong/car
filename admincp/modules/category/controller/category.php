<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Category extends Module {

    function __construct() {
        global $db, $mod;
        $this->lang('news');
        $this->lang('user');
        $this->model($_GET['p'] . '/model/query');
        $this->model('slider/model/query');
    }

    function index() {


        $rowpage = PAGE_ROWS_ADMIN;
        $curpage = CUR_ROWS;
        $getpage = empty($_GET['page']) ? 1 : $_GET['page'];
        $offset = ($getpage - 1) * $rowpage;

        //if($getpage == 1)


        $sql = "select ct.* from #__category ct Where parent_id=0 order by caid desc";


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
				if (ModelCategory::insert()) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=' . $_GET['p']);
				} else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}

            }
        }
        $sql = "select ct.* from #__category ct where ct.parent_id = 0 order by name ASC";
        $data['rows'] = $this->rows($sql);
        $this->view($_GET['p'] . '/view/add', $data);
    }

    function edit() {
    	//print_r($_FILES);die();
		global $db, $mod;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);

            // Update data
            if (empty($name)) {
                $_SESSION['message'] = LANG_REQUIRE;
            } else {
				if($_POST['id_slide_delete'] != ''){
					$id_slide_delete = ltrim($_POST['id_slide_delete'],',');
					$images = ModelSlider::delete($id_slide_delete);
					foreach ($images as $index => $one){
						unlink( "../application/static/upload/images/slider/" . $one);
						unlink( "../application/static/upload/images/slider/small_" . $one);
					}
				}
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

                if (ModelCategory::update($_GET['id'])) {
					$_SESSION['message'] = LANG_UPDATE_SUCCESS;
					$this->redirect('index.php?p=' . $_GET['p']);
				} else {
					$_SESSION['message'] = LANG_UPDATE_FAILED;
				}
            }
        }
        // Load data
        $row = $this->row('select * from #__category where caid = "' . $_GET['id'] . '"');
        $row_slide = $this->rows('select * from #__slide where type = "category" and record_id = "' . $_GET['id'] . '"');

        $data = array();
        $data['slide'] = $row_slide;
        $data['publish'] = empty($publish) ? $row['status'] : $publish;
        $data['name'] = empty($name) ? $row['name'] : $name;
		$data['description'] = $row['description'];
		$data['parent_id'] = empty($parent) ? $row['parent_id'] : $parent;
        $sql = "select ct.* from #__category ct where ct.parent_id = 0 and ct.caid <> '" . $_GET['id'] . "'";
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