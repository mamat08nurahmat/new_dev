<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group extends CI_Controller {

    function __construct(){
    parent::__construct();
	
	$this->load->model('model_User_group');
    }

	public function index()
	{
		
$data = array(
'title' => 'User_group',
'active' => 'User_group List',

);		
//		$this->load->view('User_group/User_group_list' ,$data);
$cek = $this->model_User_group->getAllData('User_group');
print_r($cek);die();
	}
	
	public function view()
	{
		$this->load->view('User_group/User_group_view');
	}
	

	
	public function edit()
	{
		$this->load->view('User_group/User_group_edit');
	}

	public function add()
	{
		$this->load->view('User_group/User_group_add');
	}
	
}
