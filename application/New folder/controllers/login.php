<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('login',$data);
    }

    function cek_login() {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //query the database
        $result = $this->model_app->login($email, $password);
//        print_r($result);die();
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
            }
            return TRUE;
        } else {
            //if form validate false
            redirect('dashboard','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('UserID');
        $this->session->unset_userdata('UserGroupID');
        $this->session->unset_userdata('UserName');
        $this->session->unset_userdata('AreaID');
        $this->session->unset_userdata('AgencyID');
        $this->session->unset_userdata('EmployeeID');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','Thank you for using this app');

        $this->session->sess_destroy();

        redirect('login');
    }
//==================
    function cek_sesi(){

        print_r($_SESSION);

    }

    function set_dummy_sesi(){

       $sess_array = array(
      'UserID'      => '1',
      'UserGroupID' => '1',
      'UserName'    =>'superrrr',
      'AreaGroupID' => '99',
      'AreaID'      => '99',
      'AgencyID'    => '99',
      'EmployeeID'  => '99',
      'Login_Status'=> true,  

      );              //set session with value from database
                $this->session->set_userdata($sess_array);

    print_r($_SESSION);                

    }


    function set_dummy_admin_agency(){

//admin agency 42
       $sess_array = array(
      'UserID'      => '12345',
      'UserGroupID' => '42',
      'UserName'    =>'admin agency 123',
      'AreaGroupID' => '99',
      'AreaID'      => '6', //bandung
      'AgencyID'    => '99',
      'EmployeeID'  => '99',
      'Login_Status'=> true,  

      );              //set session with value from database
                $this->session->set_userdata($sess_array);

    print_r($_SESSION);                

    }




}
