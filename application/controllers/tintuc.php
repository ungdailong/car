<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('tintucmodel');
		$this -> load -> library('tool');
		$_SESSION['path'] = 'tintuc';
	}
	public function index($page = 1)
	{
		$pagesize = 5;
		$page = $page - 1;
		$offset = $page * $pagesize;
		$data['tintuc'] = $this -> tintucmodel -> getAll($offset,$pagesize);
		$num = $this -> tintucmodel -> CountRecord();
		if($num > $pagesize)
			$data['pagination'] = Tool :: pagination($num,$pagesize,$page,'tin-tuc');
		$this->load->view('tintuc',$data);
	}
	public function chitiet($id){
		if(intval($id) > 0){
			$data['tintuc'] = $this -> tintucmodel -> getDetail($id);
			$this->load->view('tintuc_chitiet',$data);
		}
	}
}