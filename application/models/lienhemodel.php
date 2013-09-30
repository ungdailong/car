<?php
class lienhemodel extends CI_Model {
	function insertContact(){
		extract($_POST);
		$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'content' => $content,
				'date_create' => time()
		);
		
		$this->db->insert('tbl_contact', $data);
	}
}