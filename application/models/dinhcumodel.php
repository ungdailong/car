<?php
class dinhcumodel extends CI_Model {
	function getAll($pagesize,$offset){
		$query = $this->db->query("select * from tbl_chuong_trinh_dinh_cu where hide=0 order by id desc LIMIT ".$offset.",".$pagesize);
		return $query -> result_array();
	}
	function getCountAll(){
		$query = $this->db->query("select * from tbl_chuong_trinh_dinh_cu where hide=0");
		return $query -> num_rows();
	}
	function getTinLienQuan($idstring){
		$query = $this->db->query("select * from tbl_chuong_trinh_dinh_cu where hide=0 and id NOT IN ".$idstring);
		return $query -> result_array();
	}
	function getDetail($detailid){
		$query = $this->db->query("select * from tbl_chuong_trinh_dinh_cu where hide=0 and id=".$detailid);
		return $query -> result_array();
	}
	function getHome(){
		$query = $this->db->query("select * from tbl_chuong_trinh_dinh_cu where hide=0 and trang_chu=1");
		return $query -> result_array();
	}
}