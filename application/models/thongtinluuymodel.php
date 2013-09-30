<?php
class thongtinluuymodel extends CI_Model {
	function getAll($pagesize,$offset){
		$query = $this->db->query("select * from tbl_thong_tin_can_luu_y where hide=0 order by id desc LIMIT ".$offset.",".$pagesize);
		return $query -> result_array();
	}
	function getCountAll(){
		$query = $this->db->query("select * from tbl_thong_tin_can_luu_y where hide=0");
		return $query -> num_rows();
	}
	function getTinLienQuan($idstring){
		$query = $this->db->query("select * from tbl_thong_tin_can_luu_y where hide=0 and id NOT IN ".$idstring);
		return $query -> result_array();
	}
	function getDetail($detailid){
		$query = $this->db->query("select * from tbl_thong_tin_can_luu_y where hide=0 and id=".$detailid);
		return $query -> result_array();
	}
}