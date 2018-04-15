<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping extends Admin {
	
	function __construct(){
		parent::__construct();
	
		// if($this->session->userdata('Login_Status') != TRUE){
		// 	redirect('');
		// }

	$this->load->model('model_app');
		$this->load->model('model_app_user');
    
        $this->load->model('model_auth');
        $this->load->model('sales_force_model');


	}

	public function index(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket,
	a.IsDiscontinued as IsDiscontinued
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	
	")->result();


//print_r($query_mapping);die();
// foreach ($quer as $datas) {
// 	echo $datas->atasan;
// }


$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/mapping_list',$data);
	}
//=========================
	public function sales_code_list(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket,
	a.IsDiscontinued as IsDiscontinued
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	WHERE a.ParentEmployeeID IS NULL	

	")->result();


//print_r($query_mapping);die();
// foreach ($quer as $datas) {
// 	echo $datas->atasan;
// }


$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/mapping_list',$data);
	}



	public function terminate_list(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket,
	a.IsDiscontinued as IsDiscontinued
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	WHERE  a.EmployeeNewCode IS NOT NULL  AND a.ParentEmployeeID IS NOT NULL  
	AND a.IsDiscontinued = 1
	
	")->result();


//print_r($query_mapping);die();
// foreach ($quer as $datas) {
// 	echo $datas->atasan;
// }


$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/terminate_list',$data);
	}

	public	function terminate_add(){


// $query_modal = $this->model_app_user->query_all_employee();	
$query_modal = $this->model_app_user->query_all_employee_aktif();	

	$data = array(
	'title' 		=> "Update Posisi",
	'subtitle' 		=> "Update Posisi",		

	'query_all_employee' => $query_modal,		

	);	


		$this->load->view('mapping/terminate_add',$data);
	}	

	public function terminate_add_save(){

// print_r($_POST);die();
/*
Array
(
    [sales_code] => P5N
    [nama] => tsubasa ozora
    [agency] => PT Pesona Putra Perkasa
    [sales_center] => PPP Palembang
    [kode_atasan] => Q4F
    [tgl_nonaktif] => 2018-04-09
    [keterangan] => zzzzzzzzzzzzzzzzz
    [subbmit] => 
)

*/

$tgl_nonaktif=$_POST['tgl_nonaktif'];

// $tanggal = date('Y-m-d');
$Pecah = explode( "-", $tgl_nonaktif );
$bulan_nonaktif = $Pecah[1];
$tgl_nonaktif = $Pecah[2];


// print_r($tgl_nonaktif); die();

$data = array(

	'tgl_nonaktif' =>$this->input->post('tgl_nonaktif'), 
	'keterangan' => $this->input->post('keterangan') , 
	'IsDiscontinued' => 1, 

);
//employee id??????????????
$field_key = array('id' =>$this->input->post('id_employee') , );

//=====
$tgl_now = date("d");
$bulan_now = date("m");		 
$bulan_back = $bulan_now - $bulan_nonaktif;
//cek jk tgl_nonaktif >=7 and 
//$tgl_nonaktif<=7 AND 
if($bulan_nonaktif == $bulan_now AND $tgl_nonaktif <=7   ){

// echo "BULAN SEKARANG OK";
$cek =  $this->db->update('Employee',$data,$field_key);


		if($cek==1){
		echo "<script>
		alert('Update Sukses');

		</script>";
		redirect('/mapping/terminate_list/','refresh');
		}else{
		echo "<script>
		alert('Update Gagal');
		history.go(-1);

		</script>";
		}

	
}elseif($bulan_back ==1 AND $tgl_nonaktif >=7){
// echo "BULAN BACKDATE OK";
$cek =  $this->db->update('Employee',$data,$field_key);


		if($cek==1){
		echo "<script>
		alert('Update Sukses');

		</script>";
		redirect('/mapping/terminate_list/','refresh');
		}else{
		echo "<script>
		alert('Update Gagal');
		history.go(-1);

		</script>";
		}


}else{
// echo "GAGAL";
		echo "<script>
		alert('Terminate hanya dibulan berjalan');
		history.go(-1);

		</script>";


}

/*
Array
(
    [employee_id] => 1677
    [tgl_nonaktif] => 2018-04-03
    [keterangan] => sadasdesawd
)

*/





	}

	public	function posisi_add(){


// $query_modal = $this->model_app_user->query_all_employee();	
$query_modal = $this->model_app_user->query_all_employee_aktif();	

	$data = array(
	'title' 		=> "Update Posisi",
	'subtitle' 		=> "Update Posisi",		

	'query_all_employee' => $query_modal,		

	);	


		$this->load->view('mapping/posisi_add',$data);
	}	



//???
	public function posisi_list(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket,
	a.IsDiscontinued as IsDiscontinued
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	WHERE  a.EmployeeNewCode IS NOT NULL  AND a.ParentEmployeeID IS NOT NULL  	
	
	")->result();


//print_r($query_mapping);die();
// foreach ($quer as $datas) {
// 	echo $datas->atasan;
// }


$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/posisi_list',$data);
	}

	public function posisi_update(){

//employee is_discontione=0 and EmployeeNewCode not null and EmoployeeParentID not null
// $query_modal = $this->model_app_user->query_all_employee();	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========


// 	$data = array(

// 		'title' 			=> "SALES FORCE",
// 		'subtitle' 			=> "ADD SALES UPDATE",
// 		'query_ktp' 		=> $query_ktp,
// 		'query_employee'	=> $query_employee,
// 		'query_posisi' 		=> $query_posisi,
// 		'query_history' 	=> $query_history,
// 		'query_agency'		=> $query_agency,
// 		'query_notif' 		=> $query_notif,
// //======================
// 'query_user_grup' => $query_user_grup,
// 'query_grup_area' => $query_grup_area,
// 'query_area' => $query_area,
// 'query_agency' => $query_agency,
// 'query_sales_center' => $query_sales_center,
// 'query_all_employee' => $query_modal,		
// //=======================		
			
// 	);	

// xx





// 	$data = array(

// 		'title' 			=> "SALES FORCE",
// 		'subtitle' 			=> "ADD SALES UPDATE",
// 		'query_ktp' 		=> $query_ktp,
// 		'query_employee'	=> $query_employee,
// 		'query_posisi' 		=> $query_posisi,
// 		'query_history' 	=> $query_history,
// 		'query_agency'		=> $query_agency,
// 		'query_notif' 		=> $query_notif,
// //======================
// 'query_user_grup' => $query_user_grup,
// 'query_grup_area' => $query_grup_area,
// 'query_area' => $query_area,
// 'query_agency' => $query_agency,
// 'query_sales_center' => $query_sales_center,
// 'query_all_employee' => $query_modal,		
// //=======================		
		
// // //=======================					



// 	);	


	$data = array(
	'title' 		=> "Update Posisi",
	'subtitle' 		=> "Update Posisi",		

	'query_all_employee' => $query_modal,		

	);	


		$this->load->view('mapping/update_posisi',$data);

	}

//=======================

	public function tes_tgl(){
// echo "Today is " . date("d") . "<br>";

$tgl_now = date("d");

if($tgl_now<7){

echo "okkkk";

}		
	}
	public function mapping_code(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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

$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/mapping_list_code',$data);
	}



	public function mapping_atasan(){
//where spv + EmployeeNewCode ==>NULL & ket=5
//echo "Mapping list";

$query_mapping = $this->db->query("

	SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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
	where a.ParentEmployeeID IS NULL 
	ORDER BY tgl ASC
	")->result();

$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping List",	
	'query_mapping' => $query_mapping,  
);
//print_r($data);die();

		$this->load->view('mapping/mapping_list_atasan',$dat);
	}


//=========================
//update sales code
public function update_sales_code($id,$no_ktp){

$get_by_ktp = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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
	where a.no_ktp='$no_ktp' ORDER BY a.tgl ASC


	")->result();
//??? 
// $query_all_employee = $this->model_app->getAllData('Employee');
$query_all_employee = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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
	


	")->result();


$sales_code = $this->model_app->getNewSalesCode();
// print_r($sales_code);die();

$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping Update",	
	'query_mapping' => $get_by_ktp,  
	'sales_code' => $sales_code,
	'query_all_employee' => $query_all_employee,  
  
);

//print_r($query_all_employee);die();

		$this->load->view('mapping/mapping_update',$data);



}


//update sales code
public function update_atasan_code($id,$no_ktp){

$get_by_ktp = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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
	where a.no_ktp='$no_ktp' ORDER BY a.tgl ASC


	")->result();
//??? 
// $query_all_employee = $this->model_app->getAllData('Employee');
$query_all_employee = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
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
	


	")->result();


$sales_code = $this->model_app->getNewSalesCode();
// print_r($sales_code);die();

//xx 

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
		//print_r($id);die();	
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_sales_center	 = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	//============
//combobox
$query_user_grup = $this->db->query(" SELECT * FROM AppUserGroup WHERE is_sales=1 ")->result();	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========


// 	$data = array(

// 		'title' 			=> "SALES FORCE",
// 		'subtitle' 			=> "ADD SALES UPDATE",
// 		'query_ktp' 		=> $query_ktp,
// 		'query_employee'	=> $query_employee,
// 		'query_posisi' 		=> $query_posisi,
// 		'query_history' 	=> $query_history,
// 		'query_agency'		=> $query_agency,
// 		'query_notif' 		=> $query_notif,
// //======================
// 'query_user_grup' => $query_user_grup,
// 'query_grup_area' => $query_grup_area,
// 'query_area' => $query_area,
// 'query_agency' => $query_agency,
// 'query_sales_center' => $query_sales_center,
// 'query_all_employee' => $query_modal,		
// //=======================		
			
// 	);	

// xx

$data = array(

	'title' 		=> "Mapping",
	'subtitle' 		=> "Mapping Update",	
	'query_mapping' => $get_by_ktp,  
	'sales_code' => $sales_code,
	'query_all_employee' => $query_all_employee,  
//xxx 
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
//======================
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query_all_employee' => $query_modal,		
// xxxx
  
);

//print_r($query_all_employee);die();

		$this->load->view('mapping/mapping_update_atasan_code',$data);



}




	public function update_save(){

/*

Array
(
    [id] => 1677
    [nama] => papa
    [no_ktp] => 6555555566555555
    [sales_code] => 1VJ
    [atasan] => FQ9
    [posisi] => RSH
    [agency] => 
    [sales_center] => 
)
*/
// print_r($_POST);die();

$data = array(
//'id' => $this->input->post('id') , 
'EmployeeNewCode' => $this->input->post('sales_code') , 
'ParentEmployeeID' => $this->input->post('atasan') , 
'ket' => '99' , 

);



 $field_key = array(
 	'id' => $this->input->post('id'), 
 	// 'no_ktp' => $this->input->post('no_ktp'), 
 );

// $cek = $this->model_app->updateData('Employee',$data,$field_key);
 $cek = $this->db->update('Employee',$data,$field_key);
if ($cek==1) {

	echo "<script>alert('Data Terupdate');</script>";
	redirect('/mapping/','refresh');
}else{
	echo "<script>alert('Data Gagal Terupdate');</script>";
	redirect('/mapping/','refresh');}

	}


	public function terminate($id,$no_ktp){

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
		//print_r($id);die();	
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_sales_center	 = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	//============
//combobox
$query_user_grup = $this->db->query(" SELECT * FROM AppUserGroup WHERE is_sales=1 ")->result();	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========


	$data = array(

		'title' 			=> "SALES FORCE",
		'subtitle' 			=> "ADD SALES UPDATE",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
//======================
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query_all_employee' => $query_modal,		
//=======================		
			
	);	
 	$this->load->view('mapping/terminate',$data);			
 	// $this->load->view('mapping/update_mapping',$data);			


	}

	public function terminate_save(){

// print_r($_POST);die();

$tgl_nonaktif=$_POST['tgl_nonaktif'];

// $tanggal = date('Y-m-d');
$Pecah = explode( "-", $tgl_nonaktif );
$bulan_nonaktif = $Pecah[1];
$tgl_nonaktif = $Pecah[2];


// print_r($tgl_nonaktif); die();

$data = array(
	'tgl_nonaktif' =>$this->input->post('tgl_nonaktif'), 
	'keterangan' => $this->input->post('keterangan') , 
	'IsDiscontinued' => 1, 

);
$field_key = array('id' =>$this->input->post('employee_id') , );

//=====
$tgl_now = date("d");
$bulan_now = date("m");		 
$bulan_back = $bulan_now - $bulan_nonaktif;
//cek jk tgl_nonaktif >=7 and 
//$tgl_nonaktif<=7 AND 
if($bulan_nonaktif == $bulan_now AND $tgl_nonaktif <=7   ){

// echo "BULAN SEKARANG OK";
$cek =  $this->db->update('Employee',$data,$field_key);
	
}elseif($bulan_back ==1 AND $tgl_nonaktif >=7){
// echo "BULAN BACKDATE OK";
$cek =  $this->db->update('Employee',$data,$field_key);

}else{
// echo "GAGAL";
		echo "<script>
		alert('Update Gagal');
		history.go(-1);

		</script>";


}

/*
Array
(
    [employee_id] => 1677
    [tgl_nonaktif] => 2018-04-03
    [keterangan] => sadasdesawd
)

*/



		if($cek==1){
		echo "<script>
		alert('Update Sukses');

		</script>";
		redirect('/mapping/','refresh');
		}else{
		echo "<script>
		alert('Update Gagal');
		history.go(-1);

		</script>";
		}


/*
*/

	}

		public function view($id,$no_ktp){

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
		//print_r($id);die();	
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_sales_center	 = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	//============
//combobox
$query_user_grup = $this->db->query(" SELECT * FROM AppUserGroup WHERE is_sales=1 ")->result();	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========


	$data = array(

		'title' 			=> "SALES FORCE",
		'subtitle' 			=> "ADD SALES UPDATE",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
//======================
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query_all_employee' => $query_modal,		
//=======================		
			
	);	
 	$this->load->view('mapping/update',$data);			
 	// $this->load->view('mapping/update_mapping',$data);			


	}


	public function mapping_posisi($id,$no_ktp){

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
		//print_r($id);die();	
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_sales_center	 = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	//============
//combobox
$query_user_grup = $this->db->query(" SELECT * FROM AppUserGroup WHERE is_sales=1 ")->result();	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========

//xx 

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
		//print_r($id);die();	
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_sales_center	 = $this->db->query("SELECT * FROM AgencySalesCenter")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	//============
//combobox
$query_user_grup = $this->db->query(" SELECT * FROM AppUserGroup WHERE is_sales=1 ")->result();	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//==========


// 	$data = array(

// 		'title' 			=> "SALES FORCE",
// 		'subtitle' 			=> "ADD SALES UPDATE",
// 		'query_ktp' 		=> $query_ktp,
// 		'query_employee'	=> $query_employee,
// 		'query_posisi' 		=> $query_posisi,
// 		'query_history' 	=> $query_history,
// 		'query_agency'		=> $query_agency,
// 		'query_notif' 		=> $query_notif,
// //======================
// 'query_user_grup' => $query_user_grup,
// 'query_grup_area' => $query_grup_area,
// 'query_area' => $query_area,
// 'query_agency' => $query_agency,
// 'query_sales_center' => $query_sales_center,
// 'query_all_employee' => $query_modal,		
// //=======================		
			
// 	);	

// xx





	$data = array(

		'title' 			=> "SALES FORCE",
		'subtitle' 			=> "ADD SALES UPDATE",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
//======================
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query_all_employee' => $query_modal,		
//=======================		
		
// //=======================					



	);	
 	// $this->load->view('mapping/update',$data);			
 	$this->load->view('mapping/mapping_posisi',$data);			


	}

	public function update_posisi_save(){

	// print_r($_POST);die();		
/*
Array
(
    [user_group] => 9
    [nama_sales] => papa
    [sales_code] => P7D
    [sales_code_atasan] => P5N
    [nama_atasan] => tsubasa ozora
    [agency_atasan] => PT Pesona Putra Perkasa
    [sales_center_atasan] => PPP Palembang
    [area_group] => 1
    [area] => 1
    [agency] => 15
    [sales_center] => 63
)

*/

$data = array(
	'ParentEmployeeID' => $this->input->post('sales_code_atasan') , 
	'UserGroupID' => $this->input->post('user_group') , 
	'AgencyID' => $this->input->post('agency') , 
	'SalesCenterID' => $this->input->post('sales_center') , 
);

 $field_key = array(
 	'EmployeeNewCode' => $this->input->post('sales_code'), 
 	// 'no_ktp' => $this->input->post('no_ktp'), 
 );

$cek =$this->db->update('Employee',$data,$field_key);


if($cek==1){
echo "<script>
alert('Update Sukses');
</script>";
	redirect('/mapping/','refresh');
//redirect('site_url('')','refresh');
}else{
echo "<script>alert('Upload Gagal');history.go(-1);
</script>";


}


	}

}
