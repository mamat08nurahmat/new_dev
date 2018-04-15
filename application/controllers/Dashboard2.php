<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

	public function index()
	{
		$query_notif =$this->db->query("SELECT COUNT(notif) AS total FROM Employee")->result();
		
		$data = array(
			'query_notif' 	=> $query_notif
			);
		$this->load->view('dashboard2',$data);
	}
}
