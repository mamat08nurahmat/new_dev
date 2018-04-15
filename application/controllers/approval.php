<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class approval extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('approval_model');
    }

	public function index() {
	$query = $this->db->query("
	SELECT 
	a.id as id,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tanggal_buat as tgl_buat,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
		")->result();
		
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='5'")->result();

		$data = array(

			'title'			=> "Approval",
			'subtitle'	 	=> "Approval",
			'query' 	 	=> $query,
			'query_notif' 	=> $query_notif,

		);	
		
		//print_r($data);	
		$this->load->view('approval/approve',$data);
		//$this->load->view('blank');
	}	
//untuk cek ktp	
	public function ajax_cek_ktp($no_ktp)
    {
          $data = $this->db->query("SELECT * FROM Employee WHERE no_ktp='$no_ktp'")->row();
	echo json_encode($data);
    }
	
//untuk data list approve rsm
	public function approve_rsm(){
	$query = $this->db->query("
	SELECT
	a.id as id,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	where ket=2 ORDER BY tgl ASC
	
		")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='1'")->result();

		$data = array(

			'title' 		=> "Approval",
			'subtitle' 		=> "Approval RSM",
			'query' 		=> $query,
			'query_notif' 	=> $query_notif,
	);		
 	$this->load->view('approval/approve_rsm',$data);			
	}
	
//untuk data list approve sgv wilayah
	public function approve_sgv_wil(){
	$query = $this->db->query("

	SELECT 
	a.id as id,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	where a.ket=3 ORDER BY a.tgl ASC
	
		")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='2'")->result();

		$data = array(

			'title' 		=> "Approval",
			'subtitle' 		=> "Approval SGV Wilayah",
			'query' 		=> $query,
			'query_notif' 	=> $query_notif,

	);		
 	$this->load->view('approval/approve_sgv_wil',$data);		
		
	}

//untuk data list approve sgv pusat
	public function approve_sgv_pus(){
	$query = $this->db->query("

	SELECT 
	a.id as id,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	where a.ket=4 ORDER BY a.tgl ASC
	
		")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='3'")->result();

		$data = array(

			'title' 		=> "Approval",
			'subtitle'		=> "Approval SGV PUSAT",
			'query' 		=> $query,
			'query_notif' 	=> $query_notif,
			
			

	);	
 	$this->load->view('approval/approve_sgv_pus',$data);			
	}

//untuk data list approve
	public function approve(){
	$query = $this->db->query("

	SELECT
	a.id as id,	
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	where ket=1 ORDER BY tgl ASC
	
		")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='4'")->result();

		$data = array(

			'title' 		=> "Approval",
			'subtitle' 		=> "Approval SGV PUSAT",
			'query' 		=> $query,
			'query_notif' 	=>$query_notif,

	);	
 	$this->load->view('approval/approve',$data);			
	}
	
//untuk data view approve
	public function v_approve_rsm($no_ktp,$id){

		$query_ktp 			= $this->approval_model->get_by_ktp($no_ktp);	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
		$query_employee 	= $this->db->query("SELECT * FROM Employee")->result();
		$query_posisi 		= $this->db->query("SELECT * FROM Posisi")->result();
		$query_agency 		= $this->db->query("SELECT * FROM Agency")->result();
		$query_sales_center = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
		$query_history = $this->db->query("SELECT * FROM Employee_history where id=$id")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		$data = array(

		'title' 			=> "Approval",
		'subtitle' 			=> "View Approve",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_sales_center'=> $query_sales_center,
		'query_notif' 		=> $query_notif,
		);	
		$this->load->view('approval/v_approve_rsm',$data);		
		}
		
	public function v_approve_sgv_wil($no_ktp,$id){

		$query_ktp 			= $this->approval_model->get_by_ktp($no_ktp);	
		$query = $this->db->query("SELECT * FROM Employee WHERE no_ktp ='$no_ktp' ")->result();		
		$query_employee 	= $this->db->query("SELECT * FROM Employee")->result();
		$query_posisi 		= $this->db->query("SELECT * FROM Posisi")->result();
		$query_agency 		= $this->db->query("SELECT * FROM Agency")->result();
		$query_sales_center = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
		$query_history = $this->db->query("SELECT * FROM Employee_history where id=$id")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		$data = array(

		'title' 			=> "Approval",
		'subtitle' 			=> "View Approve",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_sales_center'=> $query_sales_center,
		'query_notif' 		=> $query_notif,
		);	
		$this->load->view('approval/v_approve_sgv_wil',$data);		
		}

		public function v_approve_sgv_pus($no_ktp,$id){

		$query_ktp 			= $this->approval_model->get_by_ktp($no_ktp);	
		$query = $this->db->query("SELECT * FROM Employee WHERE no_ktp ='$no_ktp' ")->result();		
		$query_employee 	= $this->db->query("SELECT * FROM Employee")->result();
		$query_posisi 		= $this->db->query("SELECT * FROM Posisi")->result();
		$query_agency 		= $this->db->query("SELECT * FROM Agency")->result();
		$query_sales_center = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
		$query_history = $this->db->query("SELECT * FROM Employee_history where id=$id")->result();
		$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		$data = array(

		'title' 			=> "Approval",
		'subtitle' 			=> "View Approve",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_sales_center'=> $query_sales_center,
		'query_notif' 		=> $query_notif,
		);	
		$this->load->view('approval/v_approve_sgv_pus',$data);		
		}

//untuk save data Employee_history
//	public function save_history($no_ktp){
	public function update_dummy(){
		
					
		$data_save = array(
		'id'				=>'99',
     	'ket'				=>'5',
		'keterangan'		=>'xxxxxxxxxxx',
		//'tanggal'			=>'',
		//'npp'				=>$this->input->post('npp')
		);


		
		
		$data_update = array(
		'ket'				=>'8',
	//	'keterangan'		=>$this->input->post('keterangan'),
		//'tanggal'			=>$this->input->post('tanggal'),
	
		);
		
		$key = array(
		'id' => '1625',
		);

		
		

			
		$cek = $this->db->insert('Employee_history',$data_save);
		$update=$this->db->update('Employee',$data_update,$key);
			
		
		
		
	}
	
		public function save_history(){
			
//$no_ktp = $this->input->post('no_ktp'); 			
//$id = $this->input->post('id');			
			
			
		$data_save = array(
		'id'				=>$this->input->post('id'),
     	'ket'				=>$this->input->post('ket'),
		'keterangan'		=>$this->input->post('keterangan'),
		'tgl'				=>$this->input->post('tgl'),
		'notif'				=>$this->input->post('notif'),
		//'npp'				=>$this->input->post('npp')
		);		
		
		$data_update = array(
		'ket'				=>$this->input->post('ket'),
		'tgl'				=>$this->input->post('tgl'),
		'notif'				=>$this->input->post('notif'),
		);
//print_r($data_update);die();		
		$key = array(
		'id' => $this->input->post('id'),
		);
		
		$cek = $this->db->insert('Employee_history',$data_save);
		$update=$this->db->update('Employee',$data_update,$key);
		
		if($update && $cek ) {
		?><script>window.alert('DATA SUKSES DITAMBAHKAN');
			</script>
<?
				redirect('approval', 'refresh');				
		}else{
		$this->alert =$this->alert("<p class='alert alert-danger'>","GAGAL DITAMBAHKAN");
		}
	}

}