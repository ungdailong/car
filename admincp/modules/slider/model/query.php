<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelSlider {
    function update($image_title,$id) {
        if($image_title != null)
			$sql = "update #__slide set
				hinh ='" . $image_title . "',
				date_update=".time()."
				where id=".$id;
		$res = $this->query($sql);

        return $res ? true : false;
    }
    function insert($image_title,$type,$recordID) {
    	$sql = "insert into #__slide set
			hinh ='" . $image_title . "',
			type = '" . $type . "',
			record_id = ".$recordID.",
			date_create=".time().",
			hide='N'";
    	$mod = new Module ();
    	$res = $mod->query($sql);
    	return $res ? true : false;
    }
	function getRecordById($slideId){
    	if(intval($slideId) > 0){
    		$sql = "select * from #__slide where id=".$slideId;
    		$res = $this->row($sql);
    		return $res;
    	}
    }
}

?>