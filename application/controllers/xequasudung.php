<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xequasudung extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('categorymodel');
		$this -> load -> model('xemoimodel');
		$this -> load -> library('tool');
		$_SESSION['path'] = 'gioithieu';
	}
	public function index($page = 1)
	{
		$GLOBALS['slide'] = $this -> slidemodel -> getByTypeLimit('category',4);
		$pagesize = 5;
		$category = $this -> categorymodel -> getCategory();
		foreach ($category as $index => $value){
			$data[$value['parent_id']][] = $value;
		}
		$data['category'] = $data;

		$countCarsByCat = $this -> xemoimodel -> countCarsByCat('Xe đã sử dụng');
		$countCarsByCat = Tool :: changeKey($countCarsByCat,'category_id');
		$data['countCarsByCat'] = $countCarsByCat;

		$page = $page - 1;
		$offset = $page * $pagesize;
		$data['cars'] = $this -> xemoimodel -> getXe('Xe đã sử dụng',$offset,$pagesize);
		$num = $this -> xemoimodel -> CountRecord('Xe đã sử dụng');
		if($num > $pagesize)
			$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'xe-qua-su-dung');
		$data['path'] = '/xe-qua-su-dung/';
		$this->load->view('xequasudung',$data);
	}
	public function chitiet($id){
		if(intval($id) > 0){
			$category = $this -> categorymodel -> getCategory();
			foreach ($category as $index => $value){
				$data[$value['parent_id']][] = $value;
			}
			$data['category'] = $data;

			$data['car'] = $this -> xemoimodel -> getXeById($id);
			//print_r($data['car']);die();
			$data['path'] = '/xe-qua-su-dung/';
			$this->load->view('xemoi_chitiet',$data);
		}
	}
	public function typeCar($type,$subtype,$page = 1){
		if($type != '' && $type != null){
			$pagesize = 5;
			$category = $this -> categorymodel -> getCategory();
			foreach ($category as $index => $value){
				$data[$value['parent_id']][] = $value;
			}
			$data['category'] = $data;

			$countCarsByCat = $this -> xemoimodel -> countCarsByCat('Xe đã sử dụng');
			$countCarsByCat = Tool :: changeKey($countCarsByCat,'category_id');
			$data['countCarsByCat'] = $countCarsByCat;
			$getCategoryByUri = $this -> categorymodel -> getCategoryByUriParentId($type,0);
			if($subtype != 'null')
			{
				$getCategoryByUri = $this -> categorymodel -> getCategoryByUriParentId($subtype,$getCategoryByUri -> caid);
			}
			$page = $page - 1;
			$offset = $page * $pagesize;
			$data['cars'] = array();
			//if(count($getCategoryByUri) > 0){
			$category_id = $getCategoryByUri -> caid;
			if($subtype == 'null'){
				$childCategory = $this -> categorymodel -> getChildCategoryByParentId($category_id);
				if(count($childCategory) > 0)
					$category_id = Tool :: getColumns($childCategory,'caid');
			}

			$data['cars'] = $this -> xemoimodel -> getXeByCategoryId($category_id,$offset,$pagesize,'Xe đã sử dụng');
			$num = $this -> xemoimodel -> countCarsByCategory($category_id);
			if($subtype == 'null'){
				$slides = $this -> slidemodel -> getByCategory('category',$getCategoryByUri -> caid);
				if(count($slides) > 0)
					$GLOBALS['slide'] = $slides;
				else
					$GLOBALS['slide'] = $this -> slidemodel -> getByTypeLimit('category',4);
			}
			else{
				$slides = $this -> slidemodel -> getByCategory('category',$category_id);
				if(count($slides) > 0)
					$GLOBALS['slide'] = $slides;
				else
					$GLOBALS['slide'] = $this -> slidemodel -> getByTypeLimit('category',4);
			}
			if($num > $pagesize) {
				if($subtype == 'null')
					$curpage = 'xe-qua-su-dung/'.$type;
				else
					$curpage = 'xe-qua-su-dung/'.$type.'/'.$subtype;
				$data['pagination'] = Tool :: pagination($num,$pagesize,$page,$curpage);
			}
			//}
			$data['path'] = '/xe-qua-su-dung/';
			$this->load->view('xemoi',$data);
		}
	}
}