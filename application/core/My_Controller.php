<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . '/libraries/Jwt/BeforeValidException.php';
// require_once APPPATH . '/libraries/Jwt/ExpiredException.php';
// require_once APPPATH . '/libraries/Jwt/SignatureInvalidException.php';
// require_once APPPATH . '/libraries/Jwt/JWT.php';
// require_once APPPATH . '/libraries/REST_Controller.php';

// use \Firebase\JWT\JWT;

class MY_Controller extends CI_Controller {

    // public $data = [];

    public function __construct()
    {
        parent::__construct();


//     if($this->session->userdata('Login_Status') != TRUE){

// // echo "<script>alert('SORRY');
// // </script>
// // ";

//             redirect('');
//         }


        // $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        // $this->output->set_header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
        // $this->output->set_header("Pragma: no-cache"); 

        // if (installation_complete()) {
        //     date_default_timezone_set(get_option('timezone', 'asia/jakarta'));
        //     load_extensions();
        //     $this->load->library(['aauth', 'cc_html', 'cc_page_element', 'cc_app']);
        // }

//set time zone
    // date_default_timezone_set(get_option('timezone', 'asia/jakarta'));


    }

    // /**
    // * Response JSON
    // * 
    // * @param Array $data
    // * @param String $status
    // *
    // * @return JSON
    // */
    // public function response($data, $status = 200)
    // {
    //     die(json_encode($data));

    //     $this->output
    //         ->set_content_type('application/json')
    //         ->set_status_header($status)
    //         ->set_output(json_encode($data));
    // }


}

/**
* Admin controller
*
* This class will be extended with administrator class modules
*/
class Admin extends MY_Controller
{
    // public $limit_page = 10;

    public function __construct()
    {
        parent::__construct();  
        
        // if (!installation_complete()) {
        //     redirect('');
        // }      
    }



}








