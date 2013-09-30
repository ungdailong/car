<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelCategory {

    function insert() {

        extract($_POST);

        $name = addslashes($name);
		$description = addslashes($description);
		$uri = strtolower(Tool :: bo_dau($name));
        $sql = "insert into #__category set
                name='" . $name . "',
				description='" . $description . "',
				parent_id='" . $parent_id . "',
				uri='".$uri."',
                status=" . $publish . " ";

        $res = $this->query($sql);

        return $res ? true : false;
    }

    function update($id) {
        extract($_POST);

        $name = addslashes($name);
		$description = addslashes($description);
		$uri = strtolower(Tool :: bo_dau($name));
		$sql = "update #__category set
			name ='" . $name . "',
			description='" . $description . "',
			status=" . $publish . " ,
			uri='" . $uri . "',
			parent_id='" . $parent_id . "'
			where caid='" . $id . "'";

		$res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {

        foreach ($data as $id) {
            $row = $this->row('select * from #__category where caid = ' . $id . '');

            $sql = "delete from #__category where caid = '" . $id . "'";

            $this->query($sql);
        }
    }

    function getCatByIds($arrId){
		if(is_array($arrId)){
			$arrIdStr = implode(',', $arrId);
			$sql = "select * from #__category where caid IN (".$arrIdStr.')';
			$res = $this->rows($sql);
			return $res;
		}
    }

    function getCatById($catId){
		if(intval($catId) > 0){
			$sql = "select * from #__category where caid  = " . $catId;
			$res = $this->rows($sql);
			return $res;
		}
    }

    function getAllCategory(){
    	$sql = "select * from #__category order by name asc";
    	$res = $this->rows($sql);
    	return $res;
    }

}

?>