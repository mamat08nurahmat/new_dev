<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ApprovedSalesCenterCard extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performancedetail_model');
        $this->load->library('form_validation');
    }
	
	
	    public function index()
    {
//        $performanceunmatch = $this->Performanceunmatch_model->get_all();

        $data = array(
			  'title' => 'ApprovedSalesCenterCard',
/*
            'select_agency' => $select_agency,
			'select_sales_center' => $select_sales_center,
			'select_bulan' => $select_bulan,
			'select_tahun' => $select_tahun,
			'select_jenis_kartu' => $select_jenis_kartu,
*/			  
			
        );

        $this->template->load('template','ApprovedSalesCenterCard_list', $data);
    }
	

}	