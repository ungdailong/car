<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('searchmodel');
		$_SESSION['path'] = 'search';
	}
	public function index()
	{
		$keyword = $_REQUEST['keyword'];
		$data['keyword'] = $keyword;
		$data['data'] = array();
		if($keyword != ''){
			$data['data'] = $this -> searchmodel -> searchByKeyword($keyword);
		}
		//print_r($data['data']);die();
		$this->load->view('search',$data);
	}
}