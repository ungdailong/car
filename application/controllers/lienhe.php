<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lienhe extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$_SESSION['path'] = 'lienhe';
	}
	public function index()
	{
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$this -> load -> model('lienhemodel');
			$this -> lienhemodel -> insertContact();
			$data['message'] = 'Cảm ơn ý kiến đóng góp của bạn';
		}
		$data['header_title'] = 'Century - Liên Hệ';
		$this->load->view('lienhe',$data);
	}
}