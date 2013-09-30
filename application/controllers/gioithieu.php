<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gioithieu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('gioithieumodel');
		$_SESSION['path'] = 'gioithieu';
	}
	public function index()
	{
		$data['gioithieu'] = $this -> gioithieumodel -> getGioiThieu();
		$data['header_title'] = 'Century - Giới thiệu';
		$this->load->view('gioithieu',$data);
	}
}