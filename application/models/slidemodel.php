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
	function getByTypeLimit($type,$limit){
		if($type != '' && $type != null){
			$query = $this->db->query("select * from tbl_slide where hinh <> '' and hide = 'N' and type = '$type' ORDER BY RAND() LIMIT ". $limit);
			return $query -> result_array();
		}
	}
	function getByCategory($type,$categoryId){
		if($type != '' && $type != null){
			$query = $this->db->query("select * from tbl_slide where hinh <> '' and hide = 'N' and type = '$type' and record_id = $categoryId ORDER BY RAND()");
			return $query -> result_array();
		}
	}
	function getByRecordId($type,$recordId){
		if(intval($recordId) > 0){
			$query = $this->db->query("select * from tbl_slide where hinh <> '' and hide = 'N' and type = '$type' and record_id = ".$recordId." ORDER BY RAND()");
			return $query -> result_array();
		}
	}
}