<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelNote {

    function insert($image_title) {
        extract($_POST);
        $title = addslashes($title);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		
		
		$sql = "insert into #__thong_tin_can_luu_y set 
			title ='" . $title . "', 
			intro='" . $intro . "', 
			content='" . $content . "' ,
			hinh='" . $image_title . "' ,
			date_create=".time().",				 
			hide=".$hide; 

        
		$res = $this->query($sql);
		
        return $res ? true : false;
    }

    function update($image_title, $id) {
        extract($_POST);
        $title = addslashes($title);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		if ($image_title == null) {
			$sql = "update #__thong_tin_can_luu_y set
			title ='" . $title . "',
			intro='" . $intro . "',
			content='" . $content . "' ,
			date_create=".time().",
			hide=".$hide."
			where id='" . $id . "'";
		}
		else{
			$sql = "update #__thong_tin_can_luu_y set
			title ='" . $title . "',
			intro='" . $intro . "',
			content='" . $content . "' ,
			hinh='" . $image_title . "' ,
			date_create=".time().",
			hide=".$hide."
			where id='" . $id . "'";
		}
        
		$res = $this->query($sql);
		
        return $res ? true : false;
    }
    function delete($data = array()) {
    	$idstr = '('.implode(',', $data).')';
    	$sql = "delete from #__thong_tin_can_luu_y where id IN " . $idstr . "";
    	$res = $this->query($sql);
    	return $res ? true : false;
    }

}

?>