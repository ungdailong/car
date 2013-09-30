<?php
class slidemodel extends CI_Model {
	function getAll(){
		$query = $this->db->query("select * from tbl_slide where hinh <> '' and hide = 'N'");
		return $query -> result_array();
	}
	function getByType($type){
		if($type != '' && $type != null){
			$query = $this->db->query("select * from tbl_slide where hinh <> '' and hide = 'N' and type = '$type'");
			return $query -> result_array();
		}
	}
}