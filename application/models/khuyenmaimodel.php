<?php
class khuyenmaimodel extends CI_Model {
	function getKhuyenMai(){
		$query = $this->db->query("select * from tbl_khuyen_mai where hide = 0");
		return $query -> row();
	}
}