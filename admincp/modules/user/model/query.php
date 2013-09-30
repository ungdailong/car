<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class ModelUser {

	function getuser() {
	
		extract($_POST);
	
		$sql = "select * from #__users where username = '".$username."'";
		
		$num = $this->num($sql);
		
		return $num ? true : false;
	}

	function insert(){
	
		extract($_POST);
                
		$sql = "insert into #__users set fullname = '".$fullname."', username = '".$username."', password = '".md5(sha1($password))."', group_id = '".$group_id."', email = '".$email."', publish = '".$publish."'";
		
                $res = $this->query($sql);
                
		return $res ? true : false;
	}
	
	function update($id){
	
		extract($_POST);
		
		$pass = empty($password) ? "" : "password = '".md5(sha1($password))."',";
		
		$sql = "update #__users set  ".$pass." fullname = '".$fullname."', username = '".$username."', group_id = '".$group_id."', email = '".$email."', publish = '".$publish."' where id = '".$id."' ";
		
		
		$res = $this->query($sql);
		
		return $res ? true : false;
	}
	
	function delete($data = array()){
	
		foreach($data as $id) {
			
			$sql = "delete from #__users where id = '".$id."'";
		
			$res = $this->query($sql);
			
			return $res ? true : false;
		}
	
	}

}

?>