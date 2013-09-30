<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Tour extends Module {

    function __construct() {
        global $db, $mod;
        $this->model($_GET['p'] . '/model/query');
    }

    function index() {


        $rowpage = PAGE_ROWS_ADMIN;
        $curpage = CUR_ROWS;
        $getpage = empty($_GET['page']) ? 1 : $_GET['page'];
        $offset = ($getpage - 1) * $rowpage;

        //if($getpage == 1)


        $sql = "select * from #__tour order by id desc";

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
            if (ModelTour::delete($_POST['id'])) {
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
            //Kiem tra dinh dang hinh				 
            $imga = $_FILES['image']['type'];
			$img_name = $_FILES['image']['name'];
            if ($imga != "") {
                //Kết thúc
                if ($imga == 'image/jpeg' || $imga == 'image/gif' || $imga == 'image/png') {
					
                    $image_title = Admin::upload('image', rand(100,900)."_".substr($img_name,0,-4), "../upload/tour/");
                    $image_title1 = Admin::createThumbnail($image_title, 190, 130, "../upload/tour/", "../upload/tour/", 'small_');

                } else {
                    $_SESSION['message'] = 'File hình không đúng định dạng ';
                    $this->redirect('index.php?p=' . $_GET['p']);
                }
            }
            if (ModelTour::insert($image_title)) {
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
            //Kiem tra dinh dang hinh				 
            $imga = $_FILES['image']['type'];
			$img_name = $_FILES['image']['name'];
            if ($imga != "") {
                //Kết thúc
                if ($imga == 'image/jpeg' || $imga == 'image/gif' || $imga == 'image/png') {

                    $image_title = Admin::upload('image', rand(100,900)."_".substr($img_name,0,-4), "../upload/tour/");
                    $image_title1 = Admin::createThumbnail($image_title, 190, 130, "../upload/tour/", "../upload/tour/", 'small_');

                    $row = $this->row('select * from #__tour where id = "' . $_GET['id'] . '"');
                    $img = $row['image'];
                    unlink("../upload/tour/" . $img);
                    unlink("../upload/tour/small_" . $img);

                    if (ModelTour::update($image_title, $_GET['id'])) {
                        $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                        $this->redirect('index.php?p=' . $_GET['p']);
                    } else {
                        $_SESSION['message'] = LANG_UPDATE_FAILED;
                    }
                } else {
                    $_SESSION['message'] = 'File hình không đúng định dạng ';
                }
            } else {
                if (ModelTour::update('', $_GET['id'])) {
                    $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                    $this->redirect('index.php?p=' . $_GET['p']);
                } else {
                    $_SESSION['message'] = LANG_UPDATE_FAILED;
                }
            }
        }

        // Load data
        $row = $this->row('select * from #__tour where id = "' . $_GET['id'] . '"');
        $data = array();
        $data['uri'] = _path_image . 'tour/small_' . $row['image'];
        $data['image_name'] = $row['image'];
        $data['name'] = (empty($_POST['name'])) ? $row['name'] : $_POST['name'];  
		$data['short_desc'] = (empty($_POST['short_desc'])) ? $row['short_desc'] : $_POST['short_desc'];
        $data['description'] = (empty($_POST['description'])) ? $row['description'] : $_POST['description'];
		$data ['point_start'] = (empty ( $_POST ['point_start'] )) ? $row ['point_start'] : $_POST ['point_start'];
		$data ['point_to'] = (empty ( $_POST ['point_to'] )) ? $row ['point_to'] : $_POST ['point_to'];
        $data['date_start'] = (empty($_POST['date_start'])) ? $row['date_start'] : $_POST['date_start'];
        $data['date_end'] = (empty($_POST['date_end'])) ? $row['date_end'] : $_POST['date_end'];
		$data['khoihanh_tour'] = (empty($_POST['khoihanh_tour'])) ? $row['khoihanh_tour'] : $_POST['khoihanh_tour'];
        $data['vehicle'] = (empty($_POST['vehicle'])) ? $row['vehicle'] : $_POST['vehicle'];
        $data['price'] = (empty($_POST['price'])) ? $row['price'] : $_POST['price'];
        $data['tax'] = (empty($_POST['tax'])) ? $row['tax'] : $_POST['tax'];
        $data['type'] = (empty($_POST['type'])) ? $row['type'] : $_POST['type'];
        $data['cat_id'] = (empty($_POST['cat_id'])) ? $row['cat_id'] : $_POST['cat_id'];
        $data['publish'] = (empty($_POST['status'])) ? $row['status'] : $_POST['status'];
		$data['khoikhanh'] = (empty($_POST['khoikhanh'])) ? $row['khoikhanh'] : $_POST['khoikhanh'];
		$data['homepage'] = (empty($_POST['homepage'])) ? $row['homepage'] : $_POST['homepage'];
        
        $this->view($_GET['p'] . '/view/add', $data);
    }

    //publish
    function publish() {
        $this->query("Update #__tour Set status=if(status='1','0','1') Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

    //publish
    function remove() {
        $row = $this->row('select * from #__tour where id = "' . $_GET['id'] . '"');
        $img = $row['image'];
        unlink("../upload/tour/" . $img);
        unlink("../upload/tour/small_" . $img);
        $this->query("Delete From #__tour Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }
	
	//find
    function find() {
        $rowpage = PAGE_ROWS;
        $curpage = CUR_ROWS;
        $getpage = empty($_GET['page']) ? 1 : $_GET['page'];
        $offset = ($getpage - 1) * $rowpage;

        //if($getpage == 1)


        $sql = 'select * from #__tour where name like "%' . $_GET['id'] . '%" order by id desc';

        $num = $this->num($sql);

        $query = $num > 0 ? $sql . " Limit $offset, $rowpage" : $sql;

        $data['rows'] = $this->rows($query);

        // Load Paging
        $data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=" . $_GET['p'] . "&q=" . $_GET['q'] . "&id=" . $_GET['id']);
        //Load Type

        $data['countrows'] = ($rowpage * $getpage) - $rowpage + 1;
        $this->view($_GET['p'] . '/view/list', $data);
    }
    
    //find
    function filter() {
        $rowpage = PAGE_ROWS;
        $curpage = CUR_ROWS;
        $getpage = empty($_GET['page']) ? 1 : $_GET['page'];
        $offset = ($getpage - 1) * $rowpage;

        //if($getpage == 1)

        $where = ($_GET['id'] > 0) ? 'where type = "' . $_GET['id'] . '"' : "";
        $sql = 'select * from #__tour ' .$where . ' order by id desc';
		//echo $sql;
        $num = $this->num($sql);

        $query = $num > 0 ? $sql . " Limit $offset, $rowpage" : $sql;

        $data['rows'] = $this->rows($query);

        // Load Paging
        $data['paging'] = Paging::load($getpage, $num, $rowpage, $curpage, "index.php?p=" . $_GET['p'] . "&q=" . $_GET['q'] . "&id=" . $_GET['id']);
        //Load Type

        $data['countrows'] = ($rowpage * $getpage) - $rowpage + 1;
        $this->view($_GET['p'] . '/view/list', $data);
    }
}

?>