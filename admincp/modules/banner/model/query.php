<?php

if (!defined('DIR_APP'))
    die('Your have not permission');

class ModelBanner {

    function insert($image_title) {

        extract($_POST);
        
        $link = (strstr(trim($link), "http://") == "") ? "http://" . $link : $link;
        $sql = "insert into #__banner set 
                image='" . $image_title . "', 
                link='" . $link . "',
                title='" . trim(addslashes($title)) . "',              
                created=now(),
				type='" . $type . "',
                status=" . $publish . " ";

        $res = $this->query($sql);

        return $res ? true : false;
    }

    function update($image_title, $id) {

        extract($_POST);

        $link = (strstr(trim($link), "http://") == "") ? "http://" . $link : $link;
        if ($image_title == null) {
            $sql = "update  #__banner set 
                    link='" . $link . "',
                    title='" . trim(addslashes($title)) . "',
					type='" . $type . "',
                    status=" . $publish . "
                    where id = " . $id . "";
        } else {
            $sql = "update  #__banner set 
                    link='" . $link . "',
                    title='" . trim(addslashes($title)) . "',
                    image='" . $image_title . "',
					type='" . $type . "',
                    status=" . $publish . "
                    where id = " . $id . "";
        }
        $res = $this->query($sql);

        return $res ? true : false;
    }

    function delete($data = array()) {

        foreach ($data as $id) {

            $row = $this->row('select * from #__banner where id = ' . $id . '');
            $img = $row['image'];
            @unlink("../upload/banner/" . $img);
            @unlink("../upload/banner/small_" . $img);

            $sql = "delete from #__banner where id = " . $id . "";

            $this->query($sql);
        }
    }

}

?>