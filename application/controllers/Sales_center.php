<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales_center extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	
		// if($this->session->userdata('Login_Status') != TRUE){
		// 	redirect('');
		// }
	$this->load->model('model_app');
	$this->load->model('model_sales_center');
	$this->load->model('model_app_user');
	}

	public function index()
	{

	$query = $this->db->query("
	SELECT 
	a.SalesCenterID as id,
	b.AgencyName as agency,
	c.AreaName as area,
	d.CityName as kota,
	b.UserType as type,
	a.SalesCenterCode as kode,
	a.SalesCenterName as nama,
	a.IsActive as aktif
	FROM AgencySalesCenter a
	left JOIN Agency b ON a.AgencyID = b.AgencyID		
	left JOIN Area c ON a.AreaID = c.AreaID
	left JOIN City d ON a.CityID = d.CityID
	ORDER BY b.AgencyID DESC
		
	
		")->result();
	//$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		
	$data = array(

			'title'			 => "Sales Center",
			'subtitle'		 => "List Sales Center",
			'query'			 => $query,
			//'query_notif' 	 => $query_notif,
		);	
		$this->load->view('sales_center/list',$data);
	}	


	/*public function add(){


$sc_code = $this->model_app->getNewSalesCenterCode();

//print_r($sc_code);

	}*/

	public function tes_kode(){

//$postData = $array('area_id' => 1, );
// $hash = $this->hash_kode($postData);
$hash = $this->hash_kode();
echo $hash;
	}
	public function hash_kode($postData){
	// public function hash_kode(){

    //parameter
//===post dari data ajax ketika change combo box
$area=$postData['area_id'];
// $area=1;
//-------------

    $now1 = explode(' ', microtime());
$now= $now1[1] ;
//print_r($now);die();  
    // $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charset = "ABCDEFGHJKLMNPRTVWXYZ0123456789";
  $base = strlen($charset);
  $result = '';

  while ($now >= $base){
    $i = $now % $base;
    $result = $charset[$i] . $result;
    $now /= $base;
  }
  
//  return substr($result, -3);
    $hash = substr($result, -1);

// print_r($hash);die();
    $cek = $this->db->query("
    	SELECT 
    	a.SalesCenterCode,
    	b.AreaCode 
    	FROM AgencySalesCenter a
    	JOIN Area b ON a.AreaID=b.AreaID 
    	WHERE a.AreaID='$area'  ")->result();    

 $kode_area=$cek[0]->AreaCode;
// print_r($kode_area);die();

    foreach($cek as $kode){
 // 2 digit   array
   // $kode_ada[]=$kode->SalesCenterCode;
    

     $kode=$kode->SalesCenterCode;
    // $kode_area = substr($kode,0,1);
    // $kode_area= $kode[0]->AreaCode;
// 
//1 digit array    
    $kode_belakang[] = substr($kode,1,1);

    //echo $kode_ada;
    //echo"<br>";
}

// print_r($kode_area);
// print_r('<br>');
// print_r($hash);
// print_r('<br>');
// print_r($kode_belakang);

// die();

//print_r($kode_ada);die();

if (in_array($hash, $kode_belakang)){
// $new_code = $hash =$this->getNewSalesCenterCode();          
$new_code = $hash =$this->hash_kode();          
  //echo "Match found";
}else{
$new_code =$kode_area."".$hash;     
  //echo "Match not found";
  }


return	  $new_code;
    
}




	public function add(){
		$query_agency = $this->db->query("SELECT * FROM Agency")->result();
		$query_area = $this->db->query("SELECT * FROM Area")->result();
$sc_code = $this->model_app->getNewSalesCenterCode();

	$data = array(

		'title' 		=> "sales_center",
		'subtitle' 		=> "Add sales center",
		'query_agency' 		=> $query_agency,
		'query_area' 		=> $query_area,
		'sc_code' 		=> $sc_code,
	);	
 	$this->load->view('sales_center/add',$data);			
	}	



	public function add_dev(){
		$query_agency = $this->db->query("SELECT * FROM Agency")->result();
		$query_area = $this->db->query("SELECT * FROM Area")->result();
$sc_code = $this->model_app->getNewSalesCenterCode();

	$data = array(

		'title' 		=> "sales_center",
		'subtitle' 		=> "Add sales center",
		'query_agency' 		=> $query_agency,
		'query_area' 		=> $query_area,
		'sc_code' 		=> $sc_code,
	);	
 	$this->load->view('sales_center/sales_center_add',$data);			
	}		
//========================================
//---- ajaxc change select
	public function getKota1(){
		// POST data
		$postData = $this->input->post();

		$data = $this->model_sales_center->getKota($postData);

		// echo json_encode($data);
		echo json_encode($postData);
	}	


//=========
	//--------------------------

	public function getSalesCenterCode(){
		// POST data
		$postData = $this->input->post();
$data = $this->hash_kode($postData);
		// $data = $this->model_app_user->getCity($postData);

		echo json_encode($data);
	}

//----------------------------
//====================================	

//---- ajaxc change select
	public function getCity(){
		$postData = $this->input->post();

		$data = $this->model_app_user->getCity($postData);

		echo json_encode($data);
	}	

//------	
//ajax change select area get city

	public function getKota(){

	$post_data = $this->input->post();
	$area_id = $post_data['area_id'];
$data = $this->db->query("SELECT CityID,CityName FROM City WHERE AreaID='$area_id'")->result_array();
 // $data = $this->model_sales_center->getCity($post_data);
	echo json_encode($data);
	// echo json_encode($area_id);

	}


	public function add_save(){


 // print_r($_POST);die();
/*

Array
(
    [agency] => 5
    [area] => 2
    [kota] => 14
    [kode] => AT
    [nama_sales_center] => SSSSSSSSSS
    [jalan] => sadsfasfasf
    [no_telpon] => 122323412
    [email] => ppp_admin@gmail.com
    [no_fax] => 23412412
    [tgl_aktif] => 2018-04-02
    [kode_pos] => 17413
    [provinsi] => JAWA BARAT
    [kabupaten] => BEKASI
    [kecamatan] => PONDOK GEDE
    [keluranan] => JATIMAKMUR
)

*/



$data = array(
// '' => , 



// 'AgencyID' 	  => '9',
// 'AreaID' 		  => '9',
// 'CityID' 		  => '9',
// 'AsuradurID' 	  => '9',


// 'SalesCenterID' => '888',


 'AgencyID' 	  => $this->input->post('agency'),
'AreaID' 		  => $this->input->post('area'),
'CityID' 		  => $this->input->post('kota'),
'AsuradurID' 	  => '9',
'SourceData'	  => '9',
'SalesCenterCode' => $this->input->post('kode'),
'SalesCenterName' => $this->input->post('nama_sales_center'),
'StreetAddress' => $this->input->post('jalan'),
'VillageAddress' => $this->input->post('kelurahan'),
'SubDistrictAddress' => $this->input->post('kecamatan'),
'CityAddress' => $this->input->post('kabupaten'),
'PostalCode' => $this->input->post('kode_pos'),
'PhoneNumber' => $this->input->post('no_telpon'),
'FaxNumber' => $this->input->post('no_fax'),
'EmailAddress' => $this->input->post('email'),
'IsActive' => '1',
'ActiveDate' => '2015-06-30 00:00:00.000',
'Enddate' => '2015-06-30 00:00:00.000',
'ReasonEnd' => '2015-06-30 00:00:00.000',
);

$cek = $this->model_app->insertData('AgencySalesCenter',$data);

if($cek==1){
echo "<script>alert('Data Tersimpan');</script>";
redirect('sales_center','refresh');
}else{
echo "<script>alert('Data Gagal Tersimpan');</script>";
redirect('sales_center/add','refresh');

}

	}


	public function view($id){

// $data1 = array('SalesCenterID' => $id );

// $query_update = $this->model_sales_center->getSelectedData('AgencySalesCenter',$data1)->result();


$query_update = $this->db->query("

SELECT     
a.SalesCenterID, 
b.AgencyName, 
c.AreaName, 
d.CityName, 

a.AsuradurID, 
a.SourceData, 
a.SalesCenterCode, 
a.SalesCenterName,
a.StreetAddress, 
a.VillageAddress,
a.SubDistrictAddress, 
a.CityAddress, 
a.PostalCode, 
a.PhoneNumber, 
a.FaxNumber, 
a.EmailAddress, 
a.IsActive, 
a.ActiveDate, 
a.Enddate, 
a.ReasonEnd
FROM  dbo.AgencySalesCenter AS a 
LEFT OUTER JOIN dbo.Agency AS b ON a.AgencyID = b.AgencyID 
LEFT OUTER JOIN dbo.Area AS c ON a.AreaID = c.AreaID 
LEFT OUTER JOIN dbo.City AS d ON a.CityID = d.CityID
WHERE a.SalesCenterID='$id'
	")->result();

 // print_r($query_update);die();


$data = array(
			'title'			 => "Sales Center",
			'subtitle'		 => "List Sales Center",
			'query_update'			 => $query_update,
);

$this->load->view('sales_center/view',$data);

	}


	public function update($id){

// $data1 = array('SalesCenterID' => $id );

// $query_update = $this->model_sales_center->getSelectedData('AgencySalesCenter',$data1)->result();


$query_update = $this->db->query("

SELECT     
a.SalesCenterID, 
b.AgencyName, 
c.AreaName, 
d.CityName, 

a.AsuradurID, 
a.SourceData, 
a.SalesCenterCode, 
a.SalesCenterName,
a.StreetAddress, 
a.VillageAddress,
a.SubDistrictAddress, 
a.CityAddress, 
a.PostalCode, 
a.PhoneNumber, 
a.FaxNumber, 
a.EmailAddress, 
a.IsActive, 
a.ActiveDate, 
a.Enddate, 
a.ReasonEnd
FROM  dbo.AgencySalesCenter AS a 
LEFT OUTER JOIN dbo.Agency AS b ON a.AgencyID = b.AgencyID 
LEFT OUTER JOIN dbo.Area AS c ON a.AreaID = c.AreaID 
LEFT OUTER JOIN dbo.City AS d ON a.CityID = d.CityID
WHERE a.SalesCenterID='$id'
	")->result();

 // print_r($query_update);die();


$data = array(
			'title'			 => "Sales Center",
			'subtitle'		 => "List Sales Center",
			'query_update'			 => $query_update,
);

$this->load->view('sales_center/update',$data);

	}


	public function update_save(){

 // print_r($_POST);die();

$data = array(
// '' => , 



// 'AgencyID' 	  => '9',
// 'AreaID' 		  => '9',
// 'CityID' 		  => '9',
// 'AsuradurID' 	  => '9',


// 'SalesCenterID' => '888',

/*
 'AgencyID' 	  => $this->input->post('agency'),
'AreaID' 		  => $this->input->post('area'),
'CityID' 		  => $this->input->post('kota'),
'AsuradurID' 	  => '9',
'SourceData'	  => '9',
'SalesCenterCode' => $this->input->post('kode'),
'SalesCenterName' => $this->input->post('nama_sales_center'),
*/
'StreetAddress' => $this->input->post('jalan'),
'VillageAddress' => $this->input->post('kelurahan'),
'SubDistrictAddress' => $this->input->post('kecamatan'),
'CityAddress' => $this->input->post('kota'),
'PostalCode' => $this->input->post('kode_pos'),
'PhoneNumber' => $this->input->post('no_telpon'),
'FaxNumber' => $this->input->post('no_fax'),
'EmailAddress' => $this->input->post('email'),
/*
'IsActive' => '1',
'ActiveDate' => '2015-06-30 00:00:00.000',
'Enddate' => '2015-06-30 00:00:00.000',
'ReasonEnd' => '2015-06-30 00:00:00.000',
*/
);

// $cek = $this->model_app->insertData('AgencySalesCenter',$data);
//update 
$field_key = array('SalesCenterID' =>$this->input->post('sales_center_id') , );

$cek = $this->model_app->updateData('AgencySalesCenter',$data,$field_key);

if($cek==1){
echo "<script>alert('Data Tersimpan');</script>";
redirect('sales_center','refresh');
}else{
echo "<script>alert('Data Gagal Tersimpan');</script>";
redirect('sales_center','refresh');

}



	}



}