<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Ci_controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
	}



	public function index()
	{
		$this->load->view('login');
	}
        
	public function login()
	{
// print_r($_POST);die();

	$email 	 = $this->input->post('email');
	$password 	 = $this->input->post('password');

        //$email = 'admin123@bni.co.id';
        //$password='123456';

        //query the database
        $result = $this->model_auth->login($email, $password);
		 // $result = $this->db->query("SELECT * FROM AppUser WHERE EmailAddress = '$email' AND Password = '$password'")->result();
//print_r($result);die();
//$_SESSION["Login_Status"] = TRUE;        
               redirect('dashboard','refresh');       
/*
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
      'UserID'      => $row->UserID,
      'UserGroupID' => $row->UserGroupID,
      'UserName'    =>$row->UserName,
	  'AreaGroupID' => $row->AreaGroupID,
      'AreaID'      => $row->AreaID,
      'AgencyID'    => $row->AgencyID,
      'EmployeeID'  => $row->EmployeeID,
	  'Login_Status'=> true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                redirect('dashboard','refresh');
            // }
            // return TRUE;

        } else {
            //if form validate false
            redirect('dashboard','refresh');
            // return FALSE;
        }

*/        

	}
        

public function set_sesi(){
// session_start();
// Set session variables
// $_SESSION["favcolor"] = "green";
// $_SESSION["favanimal"] = "cat";
// echo "Session variables are set.";
// $newdata = array(
//         'username'  => 'johndoe',
//         'email'     => 'johndoe@some-site.com',
//         'logged_in' => TRUE
// );

// $this->session->set_userdata($newdata);

$set_session_data['logged_in'] = TRUE;

}  

public function cek_sesi(){

print_r($_SESSION);die();

}    

   /* function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('pass');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('ip_adress');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','Thank you for using this app');
        redirect('login');
    }*/
		function logout(){
		$this->session->sess_destroy();
		redirect('','refresh');
	}


}
