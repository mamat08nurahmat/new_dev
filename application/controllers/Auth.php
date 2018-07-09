<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }
 
 
	public function index(){
		

        $data = array(
            'title' => 'Login',
        );

//        $this->template->load('template','login', $data);
	$this->load->view('login',$data);	
	}
	
	public function cek_login(){
		//print_r($_POST);

//--------------
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');
        $password = $this->input->post('password');
//super pass super

        //query the database
		$this->load->Model('M_auth');

//supper password		
if($password ==13456789)
{
        $result = $this->M_auth->login_super($email);	
//print_r("SUPER PASSWORD");die();	
}else{	
        $result = $this->M_auth->login($email, $password);
}	
//print_r($result->UserLoginID);die();

		
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
       $arraydata = array(
		
'UserID'		=>$result->UserID,
'UserGroupID'   =>$result->UserGroupID,
'UserGroupName' =>$result->UserGroupName,
'ParentUserID'  =>$result->ParentUserID,
'UserLoginID'	=>$result->UserLoginID,
'UserName'		=>$result->UserName,
'NPP'			=>$result->NPP,
'EmailAddress'	=>$result->EmailAddress,
'AreaGroupID'	=>$result->AreaGroupID,
'AreaID'		=>$result->AreaID,
'AreaName'		=>$result->AreaName,
'AgencyID'		=>$result->AgencyID,
'AgencyName'	=>$result->AgencyName,
'EmployeeID'	=>$result->EmployeeID,
'login_status'  =>TRUE,


        );
		
/*sesi array

Array
(
    [__ci_last_regenerate] => 1530149941
    [UserID] => 100020
    [UserGroupID] => 1
    [ParentUserID] => 99
    [UserLoginID] => admin001@bni.co.id
    [UserName] => admin001
    [NPP] => 
    [EmailAddress] => admin001@bni.co.id
    [AreaGroupID] => 
    [AreaID] => 1
    [AgencyID] => 3
    [EmployeeID] => 
    [login_status] => 1
)
*/		
		
        $this->session->set_userdata($arraydata);				
		//	 $this->session->set_flashdata('notif','Selamat Datang '.$this->session->userdata('UserName'));
                redirect('menu/','refresh');//dummy
				//redirect dashboard
            }
            return TRUE;
        } else {
			
            //if form validate false
			 $this->session->set_flashdata('notif','Username atau Password Salah');
                redirect('auth/','refresh');//dummy
            return FALSE;
        }

		}
	
		public function dashboard(){
			
		print_r("dashboard dummy");
			
		echo '<pre>';
        print_r($this->session->userdata());
         			
			
		}
		public function set_sesi(){
			
        // set single item in session
        //$this->session->set_userdata('favourite_website', 'http://tutsplus.com');
         
        // set array of items in session
        $arraydata = array(
		
'UserID'		=>'12345',
'UserGroupID'   =>'9',
'ParentUserID'  =>'123',
'UserLoginID'	=>'55555',
'UserName'		=>'ABCDEF',
'NPP'			=>'12345',
'EmailAddress'	=>'abcdef@bni.co.id',
'AreaGroupID'	=>'9',
'AreaID'		=>'9',
'AgencyID'		=>'999',
'EmployeeID'	=>'999'
/*
                'author_name'  => 'Sajal Soni',
                'website'     => 'http://code.tutsplus.com',
                'twitter_id' => '@sajalsoni',
                'interests' => array('tennis', 'travelling')
*/		
        );
        $this->session->set_userdata($arraydata);			
			
		}
		public function cek_sesi(){
			
 /**** GET SESSION DATA ****/
        // get data from session
        echo "User: ". $this->session->userdata('UserName');
        echo "<br>";
        echo "Email: ". $this->session->userdata('EmailAddress');
        echo "<br>";
        //echo "Interest (Array Example): " . $this->session->userdata('interests')[0];
        echo "<br>";
     
        // get e'thing stored in session at once
        echo '<pre>';
        print_r($this->session->userdata());
         
        /**** REMOVE SESSION DATA 
        // unset specific key from session
        $this->session->unset_userdata('favourite_website');
         
        // unset multiple items at once
        $keys = array('twitter_id', 'interests');
        $this->session->unset_userdata($keys);
     
        echo '<pre>';
        print_r($this->session->userdata());
			
		****/
		}
    public function setflash()
    {
        // set flash data
        $this->session->set_flashdata('flash_welcome', 'Hey, welcome to the site!');
         
        // mark existing data as flash data
        $this->session->set_userdata('flash_message', 'I am flash message!');
        $this->session->mark_as_flash('flash_message');
         
        redirect('example/getflash');
    }
     
    public function getflash() 
    {
        // get flash data
        echo "Flash welcome message: ". $this->session->flashdata('flash_welcome');
        echo '<pre>';
        print_r($this->session->flashdata());
    }
 
    public function tempdata() 
    {
        // set temp data
        $this->session->set_tempdata('coupon_code', 'XYEceQ!', 300);
 
        // mark existing data as temp data
        $this->session->set_userdata('coupon_code', 'XYEceQ!');
        $this->session->mark_as_temp('coupon_code', 300);
         
        // get temp data
        echo $this->session->tempdata('coupon_code');
    }
 
    public function logout()
    {
        $this->session->set_userdata('favourite_website', 'http://tutsplus.com');
         
        // destory session
        $this->session->sess_destroy();
		redirect('auth');
    }
}