<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Khuyenmai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('khuyenmaimodel');
		$_SESSION['path'] = 'khuyenmai';
	}
	public function index()
	{
		//$data['gioithieu'] = $this -> gioithieumodel -> getGioiThieu();
		//$data['header_title'] = 'Century - Giới thiệu';
		$data['khuyenmai'] = $this -> khuyenmaimodel -> getKhuyenMai();
		$this->load->view('khuyenmai',$data);
	}
}