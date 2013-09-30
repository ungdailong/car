<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class ModelUserGroup {

	function insert(){
	
		extract($_POST);
		
		$sql = "insert into #__user_group set group_name = '".$group_name."' ";
		
		$res = $this->query($sql);
		
		return $res ? true : false;
	}
	
	function update($id){
	
		extract($_POST);
		
		$sql = "update #__user_group set group_name = '".$group_name."' where id = '".$id."' ";
		
		$res = $this->query($sql);
		
		return $res ? true : false;
	}
	
	function delete($data = array()){
	
		foreach($data as $id) {
			
			$this->query("delete from #__user_group where id = '".$id."'");
			
		}
	
	}

}

?>