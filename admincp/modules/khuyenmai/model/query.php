<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelKhuyenmai {

    function insert($image_title) {
        extract($_POST);
        $title = addslashes($title);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		$sql = "insert into #__khuyen_mai set
			title ='" . $title . "',
			intro='" . $intro . "',
			content='" . $content . "' ,
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
			$sql = "update #__khuyen_mai set
			title ='" . $title . "',
			intro='" . $intro . "',
			content='" . $content . "' ,
			date_create=".time().",
			hide=".$hide."
			where id='" . $id . "'";
		}
		$res = $this->query($sql);
        return $res ? true : false;
    }

    function delete($data = array()) {
    	$idstr = '('.implode(',', $data).')';
    	$sql = "delete from #__khuyen_mai where id IN " . $idstr . "";
    	$res = $this->query($sql);
    	return $res ? true : false;
    }
    function getAllTinTuc($offset,$pagesize){
    	$sql = "select * from #__khuyen_mai order by id desc Limit $offset, $pagesize";
    	$res = $this->rows($sql);
    	return $res;
    }
    function countTinTuc(){
    	$sql = "select * from #__khuyen_mai";
    	return $this -> num($sql);
    }
    function getRecordById($tinTucId){
    	if(intval($tinTucId) > 0){
    		$sql = "select * from #__khuyen_mai where id=".$tinTucId;
    		$res = $this->row($sql);
    		return $res;
    	}
    }
}

?>