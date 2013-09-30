<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Tour_history extends Module {

    function __construct() {
        global $db, $mod;
        $this->model($_GET['p'] . '/model/query');
    }

    function index() {


        $rowpage = PAGE_ROWS;
        $curpage = CUR_ROWS;
        $getpage = empty($_GET['page']) ? 1 : $_GET['page'];
        $offset = ($getpage - 1) * $rowpage;

        //if($getpage == 1)


        $sql = "select * from #__tour_history order by id desc";

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
            if (Modeltour_history::delete($_POST['id'])) {
                $_SESSION['message'] = LANG_DELETE_SUCCESS;
            } else {
                $_SESSION['message'] = LANG_DELETE_SUCCESS;
            }
        }

        $this->redirect('index.php?p=' . $_GET['p']);
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            extract($_POST);
            
            $coll_id = Modeltour_history::insert();
            if ($coll_id) {
            	//Kiem tra dinh dang hinh
            	for ($i = 1; $i <= count($_FILES); $i++) {
            		$img_type = $_FILES['photo_item_' . $i]['type'];
            		if ($img_type != "") {
            			$filename_uploaded = time() . $i . "_" . substr($_FILES['photo_item_' . $i]['name'], 0, -4);
            	
            			$image_name = Admin::upload('photo_item_' . $i, $filename_uploaded, "../upload/tour_history/");
            			$image_title1 = Admin::createThumbnail($image_name, 220, 110, "../upload/tour_history/", "../upload/tour_history/", 'small_');
            			Modeltour_history::insertImage($image_name, $coll_id, $_POST['order_' . $i], $_POST['publish_' . $i], $_POST['name_' . $i]);
            		}
            	}
            	$_SESSION['message'] = LANG_UPDATE_SUCCESS;
            } else {
            	$_SESSION['message'] = LANG_UPDATE_FAILED;
            }
            
            $this->redirect('index.php?p=' . $_GET['p']);
        }
        $this->view($_GET['p'] . '/view/add');
    }

    function edit() {

        extract($_POST);

        // Update data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            extract($_POST);
            
            if(Modeltour_history::update($_GET['id'])){
	            //if (count($_FILES) <= 1) {
	            //delete all photo
	            //ModelGallery::deleteAllPhoto($_GET['id']);
	            //}
	            //var_dump($_FILES);exit;
	            $rows = $this->rows('select id from #__photo where pid = "' . $_GET['id'] . '"');
	            $count_img = count($rows);
	            for ($i = 1; $i <= $count_img; $i++) {
	            	$img_type = @$_FILES['photo_item_' . $i]['type'];
	            	//delete if file old _id not exist
	            	if (!isset($_POST['file_id_old_' . $i]) && isset($_POST['file_id_old_tmp_' . $i])) {
	            		Modeltour_history::deletePhoto($_POST['file_id_old_tmp_' . $i]);
	            	} else if (isset($_POST['file_id_old_' . $i]) && isset($_POST['file_id_old_tmp_' . $i])) {
	            		if($_POST['file_id_old_' . $i] == $_POST['file_id_old_tmp_' . $i]) {
	            			Modeltour_history::updatePhoto($_POST['file_id_old_tmp_' . $i], $_POST['order_' . $i], $_POST['name_' . $i]);
	            			//exit();
	            		}
	            	}
	            }
	            for ($i = 1; $i <= count($_FILES); $i++) {
	            	$img_type = @$_FILES['photo_item_' . $i]['type'];
	            	if ($img_type != "") {
	            		if (isset($_POST['file_id_old_' . $i])) {
	            			if ($_POST['file_id_old_' . $i] > 0) {
	            				//delete old photo
	            				Modeltour_history::deletePhoto($_POST['file_id_old_' . $i]);
	            			}
	            		}
	            
	            		$filename_uploaded = time() . $i . "_" . substr($_FILES['photo_item_' . $i]['name'], 0, -4);
	            		$image_name = Admin::upload('photo_item_' . $i, $filename_uploaded, "../upload/tour_history/");
	            		$image_title1 = Admin::createThumbnail($image_name, 220, 110, "../upload/tour_history/", "../upload/tour_history/", 'small_');
	            		Modeltour_history::insertImage($image_name, $_GET['id'], $_POST['order_' . $i], $_POST['publish_' . $i], $_POST['name_' . $i]);
	            	}
	            }
	            $_SESSION['message'] = LANG_UPDATE_SUCCESS;
            }else {
            	$_SESSION['message'] = LANG_UPDATE_FAILED;
            }
            $this->redirect('index.php?p=' . $_GET['p']);
        }

        // Load data
        $row = $this->row('select * from #__tour_history where id = "' . $_GET['id'] . '"');
        $data = array();
		$data['short_desc'] = (empty($_POST['short_desc'])) ? $row['short_desc'] : $_POST['short_desc'];
        $data['name'] = (empty($_POST['name'])) ? $row['name'] : $_POST['name'];  
        $data['description'] = (empty($_POST['description'])) ? $row['description'] : $_POST['description'];
        $data['type'] = (empty($_POST['type'])) ? $row['type'] : $_POST['type'];
        $data['publish'] = (empty($_POST['status'])) ? $row['status'] : $_POST['status'];
        
        //get project photo
        $sql = "Select * From #__photo Where pid= '" . $_GET['id'] . "' Order By `order` ASC";
        $data['photos'] = $this->rows($sql);
        
        $this->view($_GET['p'] . '/view/add', $data);
    }

    //publish
    function publish() {
        $this->query("Update #__tour_history Set status=if(status='1','0','1') Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

    //publish
    function remove() {
        $row = $this->row('select * from #__tour_history where id = "' . $_GET['id'] . '"');
        $img = $row['image'];
        unlink("../upload/tour_history/" . $img);
        unlink("../upload/tour_history/small_" . $img);
        $this->query("Delete From #__tour_history Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

}

?>