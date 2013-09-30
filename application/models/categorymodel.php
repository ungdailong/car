<?php
class categorymodel extends CI_Model {
	function getCategory(){
		$query = $this->db->query("select * from tbl_category where status = 1  ORDER BY name ASC");
		return $query -> result_array();
	}

	function getCategoryByUriParentId($uri,$parent_id){
		if($uri != '' && $uri != null){
			$query = $this->db->query("select * from tbl_category where uri='".$uri."' and parent_id=".$parent_id);
			return $query -> row();
		}
	}
	function getChildCategoryByParentId($category_id){
		if(intval($category_id) > 0 ){
			$query = $this->db->query("select * from tbl_category where parent_id=".$category_id);
			return $query -> result_array();
		}
	}
}