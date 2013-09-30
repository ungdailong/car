<?php if(!defined('DIR_APP')) die('Your have not permission'); 

class ModelArticles {

	function insert(){	
		extract($_POST);
		 
	 
		$content_vi=addslashes($content_vi);		 
		 		
		
		$sql = "insert into #__articles set date = now(), description_vi = '".$content_vi."', description_en = '".$content_en."', meta_keywords = '".$meta_keywords."', meta_description = '".$meta_description."', type='".$id_type."'";
		
		$res = $this->query($sql);
		
		return $res ? true : false;
	}
	
	function update($id){	
		extract($_POST);
		$content_vi=addslashes($content_vi);		
		
		$sql = "update #__articles set date = now(),  description_vi = '".$content_vi."', description_en = '".$content_en."', meta_keywords = '".$meta_keywords."', meta_description = '".$meta_description."', type='".$id_type."' where id = '".$id."' ";
		
		$res = $this->query($sql);
		
		return $res ? true : false;
	}
	
	function delete($data = array()){
	
		foreach($data as $id) {
			
			$sql = "delete from #__articles where id = '".$id."'";
		
			$res = $this->query($sql);
			
			
		}
	
	}

}

?>