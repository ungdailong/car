<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelCategoryTuvan {

    function insert() {

        extract($_POST);

        $name = addslashes($name);
		$description = addslashes($description);

        $sql = "insert into #__category_tu_van set
                name='" . $name . "',
				description='" . $description . "',
                status=" . $publish . " ";

        $res = $this->query($sql);

        return $res ? true : false;
    }

    function update($id) {
        extract($_POST);

        $name = addslashes($name);
		$description = addslashes($description);

		$sql = "update #__category_tu_van set
			name ='" . $name . "',
			description='" . $description . "',
			status=" . $publish . "
			where caid='" . $id . "'";

		$res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {

        foreach ($data as $id) {
            //$row = $this->row('select * from #__category_tu_van where caid = ' . $id . '');

            $sql = "delete from #__category_tu_van where caid = '" . $id . "'";

            $this->query($sql);
        }
    }

    function getCatByIds($arrId){
		if(is_array($arrId)){
			$arrIdStr = implode(',', $arrId);
			$sql = "select * from #__category_tu_van where caid IN (".$arrIdStr.')';
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
    	$sql = "select * from #__category_tu_van order by name asc";
    	$res = $this->rows($sql);
    	return $res;
    }

}

?>