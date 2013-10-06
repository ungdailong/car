<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tuvan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('tuvanmodel');
		$this -> load -> library('tool');
		$_SESSION['path'] = 'tuvan';
	}
	public function index($page = 1)
	{
		$pagesize = 5;
		$page = $page - 1;
		$offset = $page * $pagesize;
		$data['tuvan'] = $this -> tuvanmodel -> getAll($offset,$pagesize);
		$num = $this -> tuvanmodel -> CountRecord();
		if($num > $pagesize)
			$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'tu-van');
		$_SESSION['title'] = 'Tư vấn';
		$this->load->view('tuvan',$data);
	}
	public function chitiet($id){
		if(intval($id) > 0){
			$data['tuvan'] = $this -> tuvanmodel -> getDetail($id);
			$this->load->view('tuvan_chitiet',$data);
		}
	}
	public function typeTuvan($type,$page = 1){
		if($type != '' && $type != null){
			$pagesize = 5;
			$page = $page - 1;
			$offset = $page * $pagesize;
			$category_tuvan = $this -> tuvanmodel -> getCategoryByUri($type);
			$category_tuvan_id = $category_tuvan -> caid;
			$data['tuvan'] = $this -> tuvanmodel -> getAllByType($category_tuvan_id,$offset,$pagesize);
			$num = $this -> tuvanmodel -> CountRecordByType($category_tuvan_id);
			if($num > $pagesize)
				$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'tu-van/'.$type);
			$_SESSION['title'] = 'Tư vấn - '.$category_tuvan -> name;
			$this->load->view('tuvan',$data);
		}
	}
}