<?php
class tintuctrangchumodel extends CI_Model {
	function getAll(){
		$query = $this->db->query("select * from tbl_tin_tuc_trang_chu");
		return $query -> result_array();
	}
	function insertSubcribe($id = 0){
		extract($_POST);
		if($require == 2)
			$typeName = 'price';
		elseif($require == 1)
			$typeName = 'testdrive';
		else
			$typeName = 'catalogue';
		$data = array(
				'name' => $name,
				'type' => $typeName,
				'email' => $email,
				'mobile' => $mobile,
				'content' => $content,
				'record_id' => $id,
				'date_create' => time()
		);
		$this->db->insert('tbl_subcribe', $data);
	}
}