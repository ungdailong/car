<?php
class gioithieumodel extends CI_Model {
	function getGioiThieu(){
		$query = $this->db->query("select * from tbl_about");
		return $query -> result_array();
	}
}