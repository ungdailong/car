<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xemoi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('categorymodel');
		$this -> load -> model('xemoimodel');
		$this -> load -> library('tool');
		$_SESSION['path'] = 'gioithieu';
	}
	public function index($page = 1)
	{
		$pagesize = 5;
		$category = $this -> categorymodel -> getCategory();
		foreach ($category as $index => $value){
			$data[$value['parent_id']][] = $value;
		}
		$data['category'] = $data;

		$countCarsByCat = $this -> xemoimodel -> countCarsByCat();
		$countCarsByCat = Tool :: changeKey($countCarsByCat,'category_id');
		$data['countCarsByCat'] = $countCarsByCat;
		$page = $page - 1;
		$offset = $page * $pagesize;
		$data['cars'] = $this -> xemoimodel -> getXe('Xe mới',$offset,$pagesize);
		$num = $this -> xemoimodel -> CountRecord('Xe mới');
		$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'xe-moi');
		$this->load->view('xemoi',$data);
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

			$countCarsByCat = $this -> xemoimodel -> countCarsByCat();
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

				$data['cars'] = $this -> xemoimodel -> getXeByCategoryId($category_id,$offset,$pagesize);
				$num = $this -> xemoimodel -> countCarsByCategory($category_id);
				if($subtype == 'null')
					$curpage = 'xe-moi/'.$type;
				else
					$curpage = 'xe-moi/'.$type.'/'.$subtype;
				$data['pagination'] = Tool :: pagination($num,$pagesize,$page,$curpage);
			//}
			$this->load->view('xemoi',$data);
		}
	}
}