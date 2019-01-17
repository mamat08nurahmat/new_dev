<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemupload extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
		/*
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Maaf, Anda tidak diperbolehkan masuk tanpa login !');
            redirect('auth');
        };	
		*/
		
        // $this->load->model('Employee_model');
        // $this->load->library('form_validation');
    }

//=============
//======

    public function index()
    {
print_r('indexxxxxxxxxxxxxxx');
    }


    public function edc()
    {
print_r('indexxxxxxxxxxxxxxx');
    }


    public function upload_edc()
    {
// print_r('create EDC');

$data = array('tittle' => 'EDC', );

    $this->load->view('systemupload/upload_edc', $data);

    }



    public function report_edc()
    {

$data = array('tittle' => 'EDC', );

    $this->load->view('systemupload/upload_edc', $data);

    }


}