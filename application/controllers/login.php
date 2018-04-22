<?php
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    function index(){
           $this->load->view('login');
    }


function tes_menu(){

//session user group

$AppUserGroup = 6;    

$map = $this->db->query("SELECT id_group, id_menu FROM menu_mapping_group WHERE id_group='$AppUserGroup'")->result();
$id_menu = $map[0]->id_menu;
//$id_menu = explode(',', $id_menu); //array

//print_r($id_menu);die();


//  $main_menu = $this->db->get_where('tabel_menu', array(
//     'is_main_menu' => 0,
//     'id' => $id_menu,    
// ));

$main_menu = $this->db->query("SELECT * FROM tabel_menu WHERE id IN($id_menu) AND is_main_menu=0 ");

 print_r($main_menu->result());






}

    function aksi_login() {
        //Field validation succeeded.  Validate against database
	$email 	 = $this->input->post('EmailAddress');
	$password 	 = $this->input->post('Password');
    
        //$email = 'admin123@bni.co.id';
        //$password='123456';

        //query the database
        $result = $this->login_model->login($email, $password);
		 // $result = $this->db->query("SELECT * FROM AppUser WHERE EmailAddress = '$email' AND Password = '$password'")->result();
//print_r($result);die();


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




    function set_sesi(){

         $sess_array = array(
                    'ID' => '999999',
                    'EMAIL' => 'xxxxx@gmail.com',
                    'PASS'=>'123456',
                    'NAME'=>'xxxx',
                    'LEVEL' => '1',
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);

    print_r($_SESSION);                

    }




// public function cek_sesi(){
// print_r($_SESSION);die();

// // session_start();


// // Echo session variables that were set on previous page
// // echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
// // echo "Favorite animal is " . $_SESSION["favanimal"] . ".";


// }    

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
