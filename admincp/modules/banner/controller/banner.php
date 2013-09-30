<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Banner extends Module {

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


        $sql = "select * from #__banner order by id desc";

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
            if (Modelbanner::delete($_POST['id'])) {
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

                    $image_title = Admin::upload('image', rand(100,900)."_".substr($img_name,0,-4), "../upload/banner/");
                    if($type == 2)
                    	$image_title1 = Admin::createThumbnail($image_title, 200, 130, "../upload/banner/", "../upload/banner/", 'small_');

                    if (Modelbanner::insert($image_title)) {
                        $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                        $this->redirect('index.php?p=' . $_GET['p']);
                    } else {
                        $_SESSION['message'] = LANG_UPDATE_FAILED;
                    }
                } else {
                    $_SESSION['message'] = 'File hình không đúng định dạng ';
                }
            }
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

                    $image_title = Admin::upload('image', rand(100,900)."_".substr($img_name,0,-4), "../upload/banner/");
                    if($type == 2)
                    	$image_title1 = Admin::createThumbnail($image_title, 200, 130, "../upload/banner/", "../upload/banner/", '');

                    $row = $this->row('select * from #__banner where id = "' . $_GET['id'] . '"');
                    $img = $row['image'];
                    @unlink("../upload/banner/" . $img);
                    @unlink("../upload/banner/" . $img);

                    if (Modelbanner::update($image_title, $_GET['id'])) {
                        $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                        $this->redirect('index.php?p=' . $_GET['p']);
                    } else {
                        $_SESSION['message'] = LANG_UPDATE_FAILED;
                    }
                } else {
                    $_SESSION['message'] = 'File hình không đúng định dạng ';
                }
            } else {
                if (Modelbanner::update('', $_GET['id'])) {
                    $_SESSION['message'] = LANG_UPDATE_SUCCESS;
                    $this->redirect('index.php?p=' . $_GET['p']);
                } else {
                    $_SESSION['message'] = LANG_UPDATE_FAILED;
                }
            }
        }

        // Load data
        $row = $this->row('select * from #__banner where id = "' . $_GET['id'] . '"');
        $data = array();
        $data['uri'] = _path_image . 'banner/' . $row['image'];
        $data['image_name'] = $row['image'];
        $data['title'] = $row['title'];       
        $data['publish'] = $row['status'];
        $data['link'] = $row['link'];
        
        $this->view($_GET['p'] . '/view/add', $data);
    }

    //publish
    function publish() {
        $this->query("Update #__banner Set status=if(status='1','0','1') Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

    //publish
    function remove() {
        $row = $this->row('select * from #__banner where id = "' . $_GET['id'] . '"');
        $img = $row['image'];
        @unlink("../upload/banner/" . $img);
        @unlink("../upload/banner/small_" . $img);
        $this->query("Delete From #__banner Where id=" . $_GET['id']);
        $this->redirect('index.php?p=' . $_GET['p']);
    }

}

?>