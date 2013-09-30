<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelTintucTrangchu {



    function update($image_title, $id) {
        extract($_POST);
        $title = addslashes($title);
		$content = addslashes($content_);
		if ($image_title == null) {
			$sql = "update #__tin_tuc_trang_chu set
			title ='" . $title . "',
			content='" . $content . "' ,
			date_update=".time()."
			where id='" . $id . "'";
		}
		$res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {
    	$idstr = '('.implode(',', $data).')';
    	$sql = "delete from #__tin_tuc where id IN " . $idstr . "";
    	$res = $this->query($sql);
    	return $res ? true : false;
    }
    function getAllTinTuc($offset,$pagesize){
    	$sql = "select * from #__tin_tuc_trang_chu order by id desc Limit $offset, $pagesize";
    	$res = $this->rows($sql);
    	return $res;
    }
    function countTinTuc(){
    	$sql = "select * from #__tin_tuc";
    	return $this -> num($sql);
    }
    function getRecordById($tinTucId){
    	if(intval($tinTucId) > 0){
    		$sql = "select * from #__tin_tuc_trang_chu where id=".$tinTucId;
    		$res = $this->row($sql);
    		return $res;
    	}
    }
}

?>