<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	
		// if($this->session->userdata('Login_Status') != TRUE){
		// 	redirect('');
		// }
	}

	public function index()
	{
		// $query_notif =$this->db->query("SELECT COUNT(notif) AS total FROM Employee where id='$id'")->result();
		
		// $data = array(
		// //	'query_notif' 	=> $query_notif
		// 	);

//print_r($_SESSION);
		$this->load->view('dashboard1');
	}
}
