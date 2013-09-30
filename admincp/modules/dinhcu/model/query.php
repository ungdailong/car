<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelDinhcu {

    function insert() {
        extract($_POST);
        $title = addslashes($title);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		if($trang_chu == 1){
			$sql1 = "update #__chuong_trinh_dinh_cu set trang_chu=0 where trang_chu=1";
			$this->query($sql1);
		}
		
		$sql = "insert into #__chuong_trinh_dinh_cu set 
			title ='" . $title . "', 
			intro='" . $intro . "', 
			content='" . $content . "' ,
			date_create=".time().",				
			trang_chu=" . $trang_chu . ", 
			hide=".$hide; 

        
		$res = $this->query($sql);
		
        return $res ? true : false;
    }

    function update($id) {
        extract($_POST);
        $title = addslashes($title);
        $intro = addslashes($intro);
		$content = addslashes($content_);
		$sql = "update #__chuong_trinh_dinh_cu set 
			title ='" . $title . "', 
			intro='" . $intro . "', 
			content='" . $content . "' ,
			date_create=".time().",				
			trang_chu=" . $trang_chu . ", 
			hide=".$hide." 
			where id='" . $id . "'";
        if($trang_chu == 1){
        	$sql1 = "update #__chuong_trinh_dinh_cu set trang_chu=0 where trang_chu=1 and id <>" . $id . "";
        	$this->query($sql1);
        }
		$res = $this->query($sql);
		
        return $res ? true : false;
    }
	
	function delete($data = array()) {
		$idstr = '('.implode(',', $data).')';
		$sql = "delete from #__chuong_trinh_dinh_cu where id IN " . $idstr . "";
		$res = $this->query($sql);
		return $res ? true : false;
    }

}

?>