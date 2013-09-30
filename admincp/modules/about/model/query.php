<?php
if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelAbout {

    function update() {
        extract($_POST);
        $title = addslashes($title);
		$content = addslashes($content_);
		$intro = addslashes($intro);
		$sql = "update #__about set 
			title ='" . $title . "', 
			intro ='" . $intro . "', 
			content='" . $content . "', 
			hide=" . $display . ", 
			date_create=".time()."  
			where id=1";
        
		$res = $this->query($sql);

        return $res ? true : false;
    }
}

?>