<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chuongtrinhdinhcu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('dinhcumodel');
		$_SESSION['path'] = 'dinhcu';
	}
	public function index($page=0)
	{
		$pagesize = PAGE_SIZE;
		if($page == 0){
			$page = 1 ;
			$offset = 0;
		}
		
		$offset = ($page - 1) * $pagesize;
		
		
		$data['data'] = $this -> dinhcumodel -> getAll($pagesize,$offset);
		foreach ($data['data'] as $index => $one){
			$id_arr[] = $one['id'];
		}
		$idarr = '('.implode(',', $id_arr).')';
		$data['tinlienquan'] = $this -> dinhcumodel -> getTinLienQuan($idarr);
		$numrecord = $this -> dinhcumodel -> getCountAll();
		$data['pagecount'] = ceil($numrecord / $pagesize);
		$data['page'] = $page;
		$data['header_title'] = 'Century - Chương trình định cư';
		$this->load->view('ChuongTrinhDinhCu',$data);
	}
	public function detail($detailid){
		$data['detail'] = $this -> dinhcumodel -> getDetail($detailid);
		$data['header_title'] = 'Century - '.$data['detail'][0]['title'];
		$this->load->view('detail',$data);
	}
}