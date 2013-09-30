<?php
class Tool{
	function getColumns($arr,$column = 'id'){
		$arr_temp = array();
		foreach ($arr as $index => $value){
			$arr_temp[] = $value[$column];
		}
		return array_filter(array_unique($arr_temp));
	}
	function changeKey($arr,$key = 'id'){
		$arr_temp = array();
		foreach ($arr as $index => $value){
			$arr_temp[$value[$key]] = $value;
		}
		return $arr_temp;
	}
	function changeArrayByKey($arr,$key = 'id'){
		$arr_temp = array();
		foreach ($arr as $index => $value){
			$arr_temp[$value[$key]][] = $value;
		}
		return $arr_temp;
	}
	function addImage($type = 'tintuc',$model){

		// Kiem tra dinh dang hinh
		$imga = $_FILES ['image'] ['type'];
		$img_name = $_FILES ['image'] ['name'];



		if ($imga != "") {
			// Kết thúc
			if ($imga == 'image/jpeg' || $imga == 'image/gif' || $imga == 'image/png' || $imga == 'application/octet-stream') {

				$image_title = Admin::upload ( 'image', rand ( 100, 900 ) . "_" . substr ( $img_name, 0, - 4 ), "../application/static/upload/images/$type/" );
				$image_title1 = Admin::createThumbnail ( $image_title, 190, 130, "../application/static/upload/images/$type/", "../application/static/upload/images/$type/", 'small_' );
			} else {
				$_SESSION ['message'] = 'File hình không đúng định dạng ';
				$this->redirect ( 'index.php?p=' . $_GET ['p'] );
			}
		}
		if ($model::insert ($image_title)) {
			$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
			$this->redirect ( 'index.php?p=' . $_GET ['p'] );
		} else {
			$_SESSION ['message'] = LANG_UPDATE_FAILED;
		}
	}
	function addImageSlide($type = 'tintuc',$model,$typeSlide,$recordId){
		$imga = $_FILES ['image'] ['type'];
		$img_name = $_FILES ['image'] ['name'];
		if ($imga != "") {
			// Kết thúc
			if ($imga == 'image/jpeg' || $imga == 'image/gif' || $imga == 'image/png' || $imga == 'application/octet-stream') {

				$image_title = Admin::uploadSlide ( 'image', rand ( 100, 900 ) . "_" . substr ( $img_name, 0, - 4 ), "../application/static/upload/images/$type/" );
				$image_title1 = Admin::createThumbnail ( $image_title, 190, 130, "../application/static/upload/images/$type/", "../application/static/upload/images/$type/", 'small_' );
			} else {
				$_SESSION ['message'] = 'File hình không đúng định dạng ';
				$this->redirect ( 'index.php?p=' . $_GET ['p'] );
			}
		}
		if ($model::insert ($image_title,$typeSlide,$recordId)) {
			$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
			//$this->redirect ( 'index.php?p=' . $_GET ['p'] );
		} else {
			$_SESSION ['message'] = LANG_UPDATE_FAILED;
		}
	}
	function editImage($type = 'tintuc',$model){
		// Kiem tra dinh dang hinh
		$imga = $_FILES ['image'] ['type'];
		$img_name = $_FILES ['image'] ['name'];
		if ($imga != "") {
			// Kết thúc
			if ($imga == 'image/jpeg' || $imga == 'image/gif' || $imga == 'image/png') {
				$image_title = Admin::upload ( 'image', rand ( 100, 900 ) . "_" . substr ( $img_name, 0, - 4 ), "../application/static/upload/images/$type/" );
				$image_title1 = Admin::createThumbnail ( $image_title, 190, 130, "../application/static/upload/images/$type/", "../application/static/upload/images/$type/", 'small_' );
				$row = $model :: getRecordById($_GET ['id']);
				$img = $row ['hinh'];

				unlink ( "../application/static/upload/images/$type/" . $img );
				unlink ( "../application/static/upload/images/$type/small_" . $img );
				if ($model::update ( $image_title, $_GET ['id'] )) {
					$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
					//$this->redirect ( 'index.php?p=' . $_GET ['p'] );
				} else {
					$_SESSION ['message'] = LANG_UPDATE_FAILED;
				}
			} else {
				$_SESSION ['message'] = 'File hình không đúng định dạng ';
			}
		} else {
			if ($model::update ( '', $_GET ['id'] )) {
				$_SESSION ['message'] = LANG_UPDATE_SUCCESS;
				//$this->redirect ( 'index.php?p=' . $_GET ['p'] );
			} else {
				$_SESSION ['message'] = LANG_UPDATE_FAILED;
			}
		}
	}
	function pagination($num,$pagesize,$curPage,$pagename){

		$curPage = $curPage + 1;
		$pages = ceil($num/$pagesize);
		$html = '<div class="pageNum alr">';
		for($i = 1; $i <= $pages; $i ++){
			if($i == $curPage)
				$html .= '<a href="'.WEB_ROOT.'/'.$pagename.'/'.$i.'" class="active">'.$i.'</a>';
			else
				$html .= '<a href="'.WEB_ROOT.'/'.$pagename.'/'.$i.'">'.$i.'</a>';
		}
		$html .= '</div>';
		return $html;
	}
	function bo_dau ($str){
		$unicode = array(
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
				'd'=>'đ',
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
				'i'=>'í|ì|ỉ|ĩ|ị',
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
				'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'D'=>'Đ',
				'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
				'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
				'-'=>',',
				'-'=>' '
		);

		foreach($unicode as $nonUnicode=>$uni){
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		}
		return $str;
	}
}