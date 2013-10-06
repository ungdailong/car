<?php
class provenexclusivitymodel extends CI_Model {
	function getByRecordId($recordId){
		if(intval($recordId) > 0){
			$query = $this->db->query("select * from tbl_proven_exclusivity where hide = 0 and id = ".$recordId);
			return $query -> row();
		}
	}
}