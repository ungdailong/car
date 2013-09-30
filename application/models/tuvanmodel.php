<?php
class tuvanmodel extends CI_Model {
	function getAll($offset,$pagesize){
		$query = $this->db->query("select * from tbl_tu_van where hide=0 order by id desc LIMIT ".$offset.",".$pagesize);
		return $query -> result_array();
	}
	function CountRecord(){
		$query = $this->db->query("select * from tbl_tu_van where hide=0");
		return $query -> num_rows();
	}
	function CountRecordByType($category_tuvan_id){
		$query = $this->db->query("select * from tbl_tu_van where hide=0 and category_tu_van_id = ".$category_tuvan_id);
		return $query -> num_rows();
	}
	function getDetail($detailid){
		$query = $this->db->query("select * from tbl_tu_van where hide=0 and id=".$detailid);
		return $query -> row();
	}

	function getTinByNum($num){
		if(intval($num > 0)){
			$query = $this->db->query("select * from tbl_tu_van where hide=0 ORDER BY id DESC LIMIT " . $num);
			return $query -> result_array();
		}
	}
	function getCategory(){
		$query = $this->db->query("select * from tbl_category_tu_van where status=1 ORDER BY name ASC");
		return $query -> result_array();
	}
	function getCategoryByUri($uri){
		if($uri != '' && $uri != null){
			$query = $this->db->query("select * from tbl_category_tu_van where uri='".$uri."'");
			return $query -> row();
		}
	}
	function getAllByType($category_tuvan_id,$offset,$pagesize){
		if(intval($category_tuvan_id) > 0){
			$query = $this->db->query("select * from tbl_tu_van where hide=0 and category_tu_van_id = ".$category_tuvan_id." order by id desc LIMIT ".$offset.",".$pagesize);
			return $query -> result_array();
		}
	}
}