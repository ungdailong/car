<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class Modeltour_history {

    function insert() {

        extract($_POST);
        
        $sql = "insert into #__tour_history set 
                name='" . trim(addslashes($name)) . "',
				short_desc='" . trim(addslashes($short_desc)) . "', 
                description='" . trim(addslashes($description)) . "', 
                status=" . $publish . " ";
		
        //die($sql);
        $this->query($sql);
        $hid = $this->id();
        
        return $hid;
    }

    function update($id) {

        extract($_POST);

        $sql = "update  #__tour_history set 
	                name='" . trim(addslashes($name)) . "',
					short_desc='" . trim(addslashes($short_desc)) . "', 
	                description='" . trim(addslashes($description)) . "', 
	                status=" . $publish . "
                    where id = " . $id . "";
        $res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {

        foreach ($data as $id) {

           $this->deleteAllPhoto($id);

            $sql = "delete from #__tour_history where id = " . $id . "";

            $this->query($sql);
        }
    }
    

    function deletePhoto($id) {
    	$photo = $this->row("SELECT * From tbl_photo Where id=" . $id);
    	//var_dump("../upload/photos/" . $photo); exit;
    	unlink("../upload/tour_history/" . $photo['image']);
    	unlink("../upload/tour_history/" . "small_" . $photo['image']);
    	$sql = "Delete From tbl_photo Where id=" . $id;
    	$this->query($sql);
    }
    
    function updatePhoto($id, $order_item) {
    	extract($_POST);
    	//$update_img = $img != "" ? ",  image = '" . $img . "'" : " ";
    	$sql = "UPDATE tbl_photo SET
                `order` = '" . $order_item . "'
                WHERE id=" . $id;
    	$this->query($sql);
    }
    
    function deleteAllPhoto($p_id) {
    	$photo = $this->rows("SELECT * From tbl_photo Where pid=" . $p_id);
    	foreach ($photo as $p){
    		unlink("../upload/tour_history/" . $p['image']);
    		unlink("../upload/tour_history/" . "small_" . $p['image']);
    	}
    	$sql = "Delete From tbl_photo Where project_id=" . $p_id;
    	$this->query($sql);
    }
    
    function insertImage($img, $collection_id, $order_item, $publish) {
    
    	if ($img != "") {
    		$sql = "insert into #__photo set pid = '" . $collection_id . "',  image = '" . $img . "', `order` = '" . $order_item . "', publish = '" . $publish . "' ";
    	} else {
    		$sql = "insert into #__photo set pid = '" . $collection_id . "',  `order` = '" . $order_item . "', publish = '" . $publish . "' ";
    	}
    	$res = $this->query($sql);
    
    	return $res ? true : false;
    }

}

?>