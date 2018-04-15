<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {
	
	/*function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}*/

	public function index()
	{
		//$query_notif =$this->db->query("SELECT COUNT(notif) AS total FROM Employee where id='$id'")->result();
		
		//$data = array(
			//'query_notif' 	=> $query_notif
			//);
		$this->load->view('dashboard1');
	}
}
