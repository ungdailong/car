<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('tintucmodel');
		$this -> load -> model('tintuctrangchumodel');
		$this -> load -> library('tool');
		$_SESSION['path'] = 'home';
	}
	public function index()
	{
		$data['tintuc'] = $this -> tintucmodel -> getTinByNum(2);
		$data['tintuc_trangchu'] = $this -> tintuctrangchumodel -> getAll();
		$data['header_title'] = 'Chào mừng đến với Century - Trang chủ';
		$this->load->view('index',$data);
	}
}