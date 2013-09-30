<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thongtincanluuy extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('thongtinluuymodel');
		$_SESSION['path'] = 'thongtin';
	}
	public function index($page = 0)
	{
		$pagesize = PAGE_SIZE;
		if($page == 0){
			$page = 1 ;
			$offset = 0;
		}
		
		$offset = ($page - 1) * $pagesize;
		
		
		$data['data'] = $this -> thongtinluuymodel -> getAll($pagesize,$offset);
		foreach ($data['data'] as $index => $one){
			$id_arr[] = $one['id'];
		}
		$idarr = '('.implode(',', $id_arr).')';
		$data['tinlienquan'] = $this -> thongtinluuymodel -> getTinLienQuan($idarr);
		$numrecord = $this -> thongtinluuymodel -> getCountAll();
		$data['pagecount'] = ceil($numrecord / $pagesize);
		$data['page'] = $page;
		$data['header_title'] = 'Century - Thông tin cần lưu ý';
		$this->load->view('ThongTinCanLuuY',$data);
	}
	public function detail($detailid){
		$data['detail'] = $this -> thongtinluuymodel -> getDetail($detailid);
		$data['header_title'] = 'Century - '.$data['detail'][0]['title'];
		$this->load->view('detail',$data);
	}
}