<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelCar {

    function insert($image_title) {
        extract($_POST);
        $name = addslashes($name);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		$thongso_kithuat = addslashes($thongso_kithuat);
		$hide = $hide == 1 ? 'Y' : 'N';

		$sql = "insert into #__cars set
			name ='" . $name . "',
			type_car = '" . $type_car . "',
			category_id = " . $category_id . ",
			intro='" . $intro . "',
			price='".$price ."',
			content='" . $content . "' ,
			hinh='" . $image_title . "' ,
			date_create=".time().",
			thongso_kithuat='".$thongso_kithuat . "',
			hide='".$hide."'";

		$res = $this->query($sql);

        return $res ? true : false;
    }

    function update($image_title, $id) {
        extract($_POST);
        $name = addslashes($name);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		$thongso_kithuat = addslashes($thongso_kithuat);
		$hide = $hide == 1 ? 'Y' : 'N';
		if ($image_title == null) {
			$sql = "update #__cars set
			name ='" . $name . "',
			type_car = '" . $type_car . "',
			category_id = " . $category_id . ",
			intro='" . $intro . "',
			price='".$price ."',
			content='" . $content . "' ,
			date_update=".time().",
			thongso_kithuat='".$thongso_kithuat . "',
			hide='".$hide."'
			where id='" . $id . "'";
		}
		else{
			$sql = "update #__cars set
			name ='" . $name . "',
			type_car = '" . $type_car . "',
			category_id = " . $category_id . ",
			intro='" . $intro . "',
			price='".$price ."',
			content='" . $content . "' ,
			hinh='" . $image_title . "' ,
			date_update=".time().",
			thongso_kithuat='".$thongso_kithuat . "',
			hide='".$hide."'
			where id='" . $id . "'";
		}
		$res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {
    	$idstr = '('.implode(',', $data).')';
    	$sql = "delete from #__cars where id IN " . $idstr . "";
    	$res = $this->query($sql);
    	return $res ? true : false;
    }

    function getAllCar($offset,$pagesize){
		$sql = "select * from #__cars order by id desc Limit $offset, $pagesize";
		$res = $this->rows($sql);
		return $res;
    }
    function countCar(){
    	$sql = "select * from #__cars";
    	return $this -> num($sql);
    }
    function getRecordById($carId){
    	if(intval($carId) > 0){
    		$sql = "select * from #__cars where id=".$carId;
    		$res = $this->row($sql);
    		return $res;
    	}
    }
}

?>