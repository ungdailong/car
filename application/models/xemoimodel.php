<?php
class xemoimodel extends CI_Model {

	function getXe($type,$offset,$pagesize){
		$query = $this->db->query("select * from tbl_cars where type_car = '".$type."' and hide = 'N' ORDER BY id DESC LIMIT $offset,$pagesize");
		return $query -> result_array();
	}

	function CountRecord($type){
		$query = $this->db->query("select * from tbl_cars where type_car = '".$type."' and hide = 'N'");
		return $query -> num_rows();
	}

	function getXeById($id){
		$query = $this->db->query("select * from tbl_cars where id = $id and hide = 'N'");
		return $query -> row();
	}

	function countCarsByCat($type){
		$query = $this->db->query("select count(*) as countt,category_id from tbl_cars where hide = 'N' and type_car = '".$type."' GROUP BY category_id");
		return $query -> result_array();
	}
	function countCarsByCategory($category_id,$type){
		if(is_array($category_id)){
			$category_id_str = implode(',', $category_id);
			$query = $this->db->query("select * from tbl_cars where type_car = '".$type."' and hide = 'N' and category_id IN (".$category_id_str.")");
		}
		else
			$query = $this->db->query("select * from tbl_cars where type_car = '".$type."' and hide = 'N' and category_id =".$category_id);
		return $query -> num_rows();
	}
	function getXeByCategoryId($category_id,$offset,$pagesize,$type){
		if(is_array($category_id)){
			$category_id_str = implode(',', $category_id);
			$query = $this->db->query("select * from tbl_cars where hide = 'N' and type_car = '".$type."' and category_id IN (".$category_id_str . ") ORDER BY id DESC LIMIT $offset,$pagesize");

		}
		else
			$query = $this->db->query("select * from tbl_cars where hide = 'N' and type_car = '".$type."' and category_id =".$category_id . " ORDER BY id DESC LIMIT $offset,$pagesize");
		return $query -> result_array();
	}
}