<?php
class tintuctrangchumodel extends CI_Model {
	function getAll(){
		$query = $this->db->query("select * from tbl_tin_tuc_trang_chu");
		return $query -> result_array();
	}
}