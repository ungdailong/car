<?php
class tintucmodel extends CI_Model {
	function getAll($offset,$pagesize){
		$query = $this->db->query("select * from tbl_tin_tuc where hide=0 order by id desc LIMIT ".$offset.",".$pagesize);
		return $query -> result_array();
	}
	function CountRecord(){
		$query = $this->db->query("select * from tbl_tin_tuc where hide=0");
		return $query -> num_rows();
	}

	function getDetail($detailid){
		$query = $this->db->query("select * from tbl_tin_tuc where hide=0 and id=".$detailid);
		return $query -> row();
	}

	function getTinByNum($num){
		if(intval($num > 0)){
			$query = $this->db->query("select * from tbl_tin_tuc where hide=0 ORDER BY id DESC LIMIT " . $num);
			return $query -> result_array();
		}
	}
}