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
		$pagesize = 5;
		$category = $this -> categorymodel -> getCategory();
		foreach ($category as $index => $value){
			$data[$value['parent_id']][] = $value;
		}
		$data['category'] = $data;
		$page = $page - 1;
		$offset = $page * $pagesize;
		$data['cars'] = $this -> xemoimodel -> getXe('Xe đã sử dụng',$offset,$pagesize);
		$num = $this -> xemoimodel -> CountRecord('Xe đã sử dụng');
		$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'xe-qua-su-dung');
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
			$this->load->view('xemoi_chitiet',$data);
		}
	}
}