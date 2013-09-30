<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelTour {

    function insert($image_title) {

        extract($_POST);
        
        $sql = "insert into #__tour set 
                image='" . $image_title . "', 
                name='" . trim(addslashes($name)) . "',
				short_desc='" . trim(addslashes($short_desc)) . "', 
                description='" . trim(addslashes($description)) . "', 
				point_start='" . trim ( addslashes ( $point_start ) ) . "',
                point_to='" . trim ( addslashes ( $point_to ) ) . "', 
                date_start='" . $date_start . "', 
                date_end='" . $date_end . "',  
				khoihanh_tour='" . $khoihanh_tour . "', 
                vehicle='" . $vehicle . "', 
                price='" . $price . "',
                tax='" . $tax . "',         
				type='" . $type . "', 
				cat_id='" . $cat_id . "',
				khoikhanh='" . $khoikhanh . "',
				homepage='" . $homepage . "',
                status=" . $publish . " ";
        $res = $this->query($sql);

        return $res ? true : false;
    }

    function update($image_title, $id) {

        extract($_POST);

        if ($image_title == null) {
            $sql = "update  #__tour set 
	                name='" . trim(addslashes($name)) . "',
					short_desc='" . trim(addslashes($short_desc)) . "', 
	                description='" . trim(addslashes($description)) . "', 
					point_start='" . trim ( addslashes ( $point_start ) ) . "',
					point_to='" . trim ( addslashes ( $point_to ) ) . "', 
	                date_start='" . $date_start . "', 
	                date_end='" . $date_end . "',  
					khoihanh_tour='" . $khoihanh_tour . "',
	                vehicle='" . $vehicle . "', 
	                price='" . $price . "',
	                tax='" . $tax . "',         
					type='" . $type . "', 
					cat_id='" . $cat_id . "',
					khoikhanh='" . $khoikhanh . "',
					homepage='" . $homepage . "',
	                status=" . $publish . "
                    where id = " . $id . "";
        } else {
            $sql = "update  #__tour set 
                    image='" . $image_title . "', 
	                name='" . trim(addslashes($name)) . "',
					short_desc='" . trim(addslashes($short_desc)) . "', 
	                description='" . trim(addslashes($description)) . "', 
					point_start='" . trim ( addslashes ( $point_start ) ) . "',
					point_to='" . trim ( addslashes ( $point_to ) ) . "', 
	                date_start='" . $date_start . "', 
	                date_end='" . $date_end . "', 
                    khoihanh_tour='" . $khoihanh_tour . "',					
	                vehicle='" . $vehicle . "', 
	                price='" . $price . "',
	                tax='" . $tax . "',         
					type='" . $type . "', 
					cat_id='" . $cat_id . "',
					khoikhanh='" . $khoikhanh . "',
					homepage='" . $homepage . "',
	                status=" . $publish . "
                    where id = " . $id . "";
        }
		//echo $sql;exit;
        $res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {

        foreach ($data as $id) {

            $row = $this->row('select * from #__tour where id = ' . $id . '');
            $img = $row['image'];
            unlink("../upload/tour/" . $img);
            unlink("../upload/tour/small_" . $img);

            $sql = "delete from #__tour where id = " . $id . "";

            $this->query($sql);
        }
    }

}

?>