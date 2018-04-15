<?php
class Download extends CI_Controller
{
 
public function __construct()
{
 parent::__construct();
}
 
public function index()
{
 $this->load->view('v_download');
}
 
public function download()
{
 $this->load->helper('download'); //jika sudah diaktifkan di autoload, maka tidak perlu di tulis kembali
 
 $name = 'komitmen.pdf';
 $data = file_get_contents("uploads/komitmen.pdf"); // letak file pada aplikasi kita
 
 force_download($name,$data);
 
}
 
}
?>