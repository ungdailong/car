<?php if(!defined('DIR_APP')) die('Your have not permission');

class Admin {
	function sendMailCreateNews($idhome)
	{
		global $mod;
		$sql = "select * from tbl_logsupscribers where id_home = '".$idhome."'";
		$rows = $mod->rows($sql);

		//nguoi cap nhat
		$sqlpubnm1 = "Select * from tbl_customers where  id =  ".$idhome ;
		$res11 = mysql_query($sqlpubnm1);
		$user1 = mysql_fetch_array($res11);

		if(!empty($rows))
		{
			foreach($rows as $row)
			{
				$sqlpubnm = "Select * from tbl_customers where  id =  ".$row['id_per'] ;
				$res1 = mysql_query($sqlpubnm);
				$user = mysql_fetch_array($res1);


				$email = $user['email'];
				$subject = "HotGril";
				$content = "Hi bạn ".@$user['username']." <br> Bạn ".@$user1['username']." vừa mới cập nhật thêm album hình, Mời bạn quay lại để xem  <br> <img src='".BASE_NAME."upload/avatar/".$user1['image']."' width='120px'  />  <br> ";
				$bc = "thanhthu@yeah1.vn";$cc = "";
				$kq = $mod->sendMailSmtp($email,FROM, FROM_NAME, $subject, $content, SIGNATURE_MAIL, $cc,"",$bc);
				//echo $kq;
			}
		}


	}
	//Support log thongke
	function TopView($id,$type)
	{
		global $mod;
		$sqlu = "";
		if($type == 1 )//La hotgirl
		{
			$sqlu = "update #__customers set topview = topview + 1 where id =".$id;

		}else if($type == 2) //La topview
		{
			$sqlu = "update #__album set topview = topview + 1 where id =".$id;
		}
		$numu = $mod->query($sqlu);
	}
	function getRealIpAddr()
	{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
	}
//end thong ke

	function logEdit($title_vi,$title_en,$idmod,$action_vi,$action_en,$idob)
	{
		global $mod;
		$title_vi = addslashes($title_vi);
		$title_en = addslashes($title_en);
		//Ghi log hanh dong them, xoa, sua
		//Insert vào log
		$sql = "insert into #__logeditmodule set date = now(), title_vi = '".$title_vi."', title_en ='".$title_en."', idob ='".$idob."', idmod ='".$idmod."', action_vi ='".$action_vi."', action_en ='".$action_en."', author= '".$_SESSION['admin_id']."', nameauthor='".$_SESSION['admin_name']."'";
		$num = $mod->query($sql);
	}
	function checkcombobox($idmod)
	{
		global $mod;
		if($idmod != 7)
		{
			$sql = "select * from #__permision where idmod = '".$idmod."' and idgroup = '".@$_SESSION['admin_group_id']."'";

			$num = $mod->num($sql);
			if($num <1)
				 $mod->aRedirect("Link này không tồn tại.",".");
		}
		else
		{
			$sql = "select * from #__permision where idmod = '3' and idsec > 0 and idgroup = '".@$_SESSION['admin_group_id']."'";

			$num = $mod->num($sql);
			if($num <1)
			{
				$sql1 = "select * from #__permision where idmod = '".$idmod."' and idgroup = '".@$_SESSION['admin_group_id']."'";

				$num1 = $mod->num($sql1);
				if($num1 <1)
					 $mod->aRedirect("Link này không tồn tại.",".");
			}
			Admin :: checkpermisiondetail($idmod);
		}

	}

	function checkpermision($idmod)
	{
		global $mod;
		if($idmod != 7)
		{
			$sql = "select * from #__permision where idmod = '".$idmod."' and idgroup = '".@$_SESSION['admin_group_id']."'";

			$num = $mod->num($sql);
			if($num <1)
				 $mod->aRedirect("Link này không tồn tại.",".");
		}
		else
		{
			//$sql = "select * from #__permision where idmod = '3' and idsec > 0 and idgroup = '".@$_SESSION['admin_group_id']."'";
//
//			$num = $mod->num($sql);
//			if($num <1)
//			{
//				$sql1 = "select * from #__permision where idmod = '".$idmod."' and idgroup = '".@$_SESSION['admin_group_id']."'";
//
//				$num1 = $mod->num($sql1);
//				if($num1 <1)
//					 $mod->aRedirect("Link này không tồn tại.",".");
//			}
			Admin :: checkpermisiondetail($idmod);
		}

	}
	function checkpermisiondetail($idmod)
	{
		global $mod;
		if($idmod == 7)
		{
			$sql = "select * from #__permision where idmod = '7' and idsec > 0 and idgroup = '".@$_SESSION['admin_group_id']."'";

			$num = $mod->num($sql);
			if($num <1)
			{
				$sql1 = "select * from #__permision where idmod = '7' and idsec = 0 and idgroup = '".@$_SESSION['admin_group_id']."'";

				$num1 = $mod->num($sql1);
				if($num1 <1)
					 $mod->aRedirect("Link này không tồn tại.",".");
			}
			else
			{
				$row = $this->row($sql);
				$_SESSION['secNews'] = $row['idsec'];
				$_SESSION['permisionNews'] = $row['permison'];
			}
		}


	}
	function button($action) {
		global $mod;

		$button = explode(',', str_replace(' ', '', $action));

		$html = '<div class="buttons">';

		foreach($button as $key) {

			if($key=='add' ) {
				$html .= '<a class="button" onclick="location.href=\''.$mod->url('index.php?p='.$_GET['p'].'&q=add').'\'"><span>Add New</span></a>';
			}
			if($key=='delete'  ) {
				$html .= '<a class="button" onclick="tbl.deleted(\'document.form2.submit()\', \'Are you sure?\')"><span>Delete</span></a>';
				//$html .= '<a class="button" onclick="document.form2.submit();"><span>Delete</span></a>';remove
			}
			if($key=='delete1'  ) {
				$html .= '<a class="button" onclick="tbl.deleted1(\'document.form2.submit()\', \'Are you sure?\')"><span>Delete</span></a>';
				//$html .= '<a class="button" onclick="document.form2.submit();"><span>Delete</span></a>';remove
			}
			if($key=='save'  ) {
				$html .= '<a class="button" onclick="document.myform.submit();"><span>Save</span></a>';
			}
			if($key=='cancel') {
				$html .= '<a class="button" onclick="location.href=\''.$mod->url('index.php?p='.$_GET['p']).'\'"><span>Cancel</span></a>';
			}
			if($key=='back') {
				$html .= '<a class="button" onclick="location.href=\''.$mod->url('index.php?p='.$_GET['p']).'\'"><span>Back</span></a>';
			}
			if($key=='hdan' ) {
				$html .= '<a class="button" onclick="location.href=\''.$mod->url('index.php?p='.$_GET['p'].'&q=huongdan').'\'"><span>Hướng dẫn</span></a>';
			}
		}

		echo $html .= '</div>';
	}

	function export($id) {
		global $mod;
		if( $_SESSION['admin_id'] ) {
			echo '[ <a href="'.$mod->url('index.php?p='.$_GET['p'].'&q=export&id='.$id).'">Export</a> ]';
		}
	}

	function edit($id) {
		global $mod;
		if( $_SESSION['admin_id'] ) {
			echo ' <a class="edit" href="'.$mod->url('index.php?p='.$_GET['p'].'&q=edit&id='.$id).'">Edit</a>';
		}
	}

	function send($id) {
		global $mod;
		if( $_SESSION['admin_id'] ) {
			echo ' <a href="'.$mod->url('index.php?p='.$_GET['p'].'&q=send&id='.$id).'"><img src="images/message.png" title="Send" /></a>';
		}
	}
	function delete($id) {
		global $mod;
		if( $_SESSION['admin_id'] ) {

			$html = '<a class="delete" style="cursor:pointer" onclick="remove1(\''.$_GET['p'].'/remove/'.$id.'\', \'Are you sure delete ?\')"><span>Delete</span></a>';
			echo $html;
		}
	}
	function deleteImg($id) {
		global $mod;
		if( $_SESSION['admin_id'] ) {

			$html = '<a class="delete" style="cursor:pointer" onclick="remove(\''.$_GET['p'].'/deletegallery/'.$id.'\', \'Are you sure delete ?\')"><span>Delete</span></a>';
			echo $html;
		}
	}

	function view($id) {
		global $mod;
		if( $_SESSION['admin_id']  ) {
			echo '<a class="edit" href="'.$mod->url('index.php?p='.$_GET['p'].'&q=viewdetail&id='.$id).'">View</a>';
		}
	}
	function uploadSlide($file, $rename='', $dir='../upload/'){
			$tmp = $_FILES[$file]['tmp_name'];
			$name = $_FILES[$file]['name'];

			if(is_array($name)){
				for($i=0; $i<count($name); $i++){
					$ext[$i] = strtolower(strrchr($name[$i],'.'));
					$name[$i] = empty($rename) ? $name[$i] : $rename . $i . $ext[$i];
					if( move_uploaded_file($tmp[$i], $dir.$name[$i]) ){
						chmod($dir, 0777);
						$arr[] = $name[$i];
					}
				}
				return $arr;
			}
			else{
				$ext = strtolower(strrchr($name,'.'));
				$name = empty($rename) ? $name : $rename . $ext;

				if( move_uploaded_file($tmp, $dir.$name) ){

					@chmod($dir, 0777);
					return $name;
				}
			}
	}
	function upload($file, $rename='', $dir='../upload/'){
		if($_SESSION['admin_id'])
		{
			$tmp = $_FILES[$file]['tmp_name'];
			$name = $_FILES[$file]['name'];

			if(is_array($name)){
				for($i=0; $i<count($name); $i++){
					$ext[$i] = strtolower(strrchr($name[$i],'.'));
					$name[$i] = empty($rename) ? $name[$i] : $rename . $i . $ext[$i];
					if( move_uploaded_file($tmp[$i], $dir.$name[$i]) ){
						chmod($dir, 0777);
						$arr[] = $name[$i];
					}
				}
				return $arr;
			}
			else{
				$ext = strtolower(strrchr($name,'.'));
				$name = empty($rename) ? $name : $rename . $ext;

				if( move_uploaded_file($tmp, $dir.$name) ){

					@chmod($dir, 0777);
					return $name;
				}
			}
		}

	}

	function uploadUser($file, $rename='', $dir='../upload/'){
		if($_SESSION['user_id'])
		{
			$tmp = $_FILES[$file]['tmp_name'];
			$name = $_FILES[$file]['name'];
			$size = $_FILES[$file]['size'];

			//check if its image file
			if (!getimagesize($tmp))
			{
				echo "Invalid Image File...";
				exit();
			}
			$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
			foreach ($blacklist as $file)
			{
				if(preg_match("/$file\$/i", $name))
				{
					echo "ERROR: Uploading executable files Not Allowed\n";
					exit;
				}
			}

			if(is_array($name)){
				for($i=0; $i<count($name); $i++){
					$ext[$i] = strtolower(strrchr($name[$i],'.'));
					$name[$i] = empty($rename) ? $name[$i] : $rename . $i . $ext[$i];
					if( move_uploaded_file($tmp[$i], $dir.$name[$i]) ){
						chmod($dir, 0774);
						$arr[] = $name[$i];
					}
				}
				return $arr;
			}
			else{
				$ext = strtolower(strrchr($name,'.'));
				$name = empty($rename) ? $name : $rename . $ext;
				if( move_uploaded_file($tmp, $dir.$name) ){
					chmod($dir, 0774);
					return $name;
				}
			}
		}
	}

/*
* Create Photo Thumbnail
* Admin: createThumbnail($name,380,550,_product_orginal_path,_product_thumb_path,'');
* Admin :: createThumbnail($idmod,380,550,$file,"upload/thumb/",'');
*/
function createThumbnail($image,$largeur_max,$hauteur_max,$source,$destination,$prefixe) {
	//echo $source.$image;
	if (!file_exists($source.$image)) {
		echo "Error: no directory";
		exit;
	}
	$ext=strtolower(strrchr($image,'.'));
	if ($ext==".jpg" || $ext==".jpeg" || $ext==".gif" || $ext==".png" || $ext==".JPG" || $ext==".JPEG") {
		$size = getimagesize($source.$image);
		$largeur_src=$size[0];
		$hauteur_src=$size[1];
		if ($size[2]==1 || $size[2]!=2 || $size[2]!=3 || $size[2]!=6) {
			if($size[2]==1) {
				// format gif
				$image_src=imagecreatefromgif($source.$image);
			}
			if($size[2]==2) {
				// format jpg ou jpeg
				$image_src=imagecreatefromjpeg($source.$image);
			}
			if($size[2]==3) {
				// format png
				$image_src=imagecreatefrompng($source.$image);
			}
			if($size[2]==6) {
				// format bmp
				$image_src=imagecreatefromwbmp($source.$image);
			}
			if ($largeur_src>$largeur_max OR $hauteur_src>$hauteur_max) {
				if ($hauteur_src<=$largeur_src) {
					$ratio=$largeur_max/$largeur_src;
				} else {
					$ratio=$hauteur_max/$hauteur_src;
				}
			} else {
				$ratio=1;
			}
			if($largeur_src/$hauteur_src>=1 && $largeur_src/$hauteur_src<=1.5){
				$newHeight=$hauteur_max;
				$newWidth=($largeur_src/$hauteur_src)*$hauteur_max;
				$image_dest=imagecreatetruecolor($newWidth, $newHeight);
				imagecopyresampled($image_dest,$image_src,0,0,0,0,$newWidth,$newHeight,$largeur_src,$hauteur_src);
			}else{
				$image_dest=imagecreatetruecolor(round($largeur_src*$ratio), round($hauteur_src*$ratio));
				imagecopyresampled($image_dest,$image_src,0,0,0,0,round($largeur_src*$ratio),round($hauteur_src*$ratio),$largeur_src,$hauteur_src);
			}
			/*
			$image_dest=imagecreatetruecolor(round($largeur_src*$ratio), round($hauteur_src*$ratio));
			imagecopyresampled($image_dest,$image_src,0,0,0,0,round($largeur_src*$ratio),round($hauteur_src*$ratio),$largeur_src,$hauteur_src);*/
			if(!imagejpeg($image_dest, $destination.$prefixe.$image)) {
				exit;
			}
		}
	}
}


function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) {
	list($width, $height) = getimagesize($SourceFile);
	$image_p = imagecreatetruecolor($width, $height);
	$image = imagecreatefromjpeg($SourceFile);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
	$black = imagecolorallocate($image_p, 252, 79, 133);
	$font = 'lib/juggernaut.ttf';
	$font_size = 20;
	imagettftext($image_p, $font_size, 0, 10, 30, $black, $font, $WaterMarkText);
	if ($DestinationFile<>'') {
	  imagejpeg ($image_p, $DestinationFile, 100);
	} else {
	  header('Content-Type: image/jpeg');
	  imagejpeg($image_p, null, 100);
	};
	imagedestroy($image);
	imagedestroy($image_p);
	}

}
//warter mark logo
function waterMarkLogo($orginal, $newImage, $logo){

	$i1 = asido::image($orginal, $newImage);
	Asido::watermark($i1, $logo, ASIDO_WATERMARK_BOTTOM_RIGHT);
	$i1->save(ASIDO_OVERWRITE_ENABLED);
}
//crop image
function cropPhoto($orginal, $newImage, $w, $h, $x, $y){
	$i11 = asido::image($orginal, $newImage);
	Asido::Crop($i11, $x, $y, $w,$h);

	$i11->save(ASIDO_OVERWRITE_ENABLED);
}
//crop image
function framePhoto($orginal, $newImage, $w, $h){
	$i111 = asido::image($orginal, $newImage);
	Asido::Frame($i111, $w, $h, Asido::Color(252,106,151));
	$i111->save(ASIDO_OVERWRITE_ENABLED);
}
?>