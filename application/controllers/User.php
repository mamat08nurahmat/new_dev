<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
    parent::__construct();
	
	$this->load->model('model_user');
    }

	public function index()
	{
		
//$query_user = $this->model_user->getAllData('AppUser');
$q="

SELECT 
a.UserName as nama,
a.NPP as npp,
a.UserLoginID as login_id,
b.UserGroupName as user_grup,
a.EmailAddress as email,
c.AreaName as nama_area,
d.AgencyName as nama_agency


FROM AppUser a
JOIN AppUserGroup b ON a.UserGroupID=b.UserGroupID
JOIN Area c ON a.AreaID=c.AreaID
JOIN Agency d ON A.AgencyID=d.AgencyID

";
$query_user_list = $this->model_user->manualQuery($q)->result();
//print_r($query_user_list);die();
$data = array(
'title' => 'User',
'active' => 'User List',
'query_user_list' => $query_user_list,

);		
		$this->load->view('user/user_list' ,$data);
	}

	public function add()
	{
//combobox
$query_user_grup = $this->model_user->getAllData("AppUserGroup");	
$query_grup_area = $this->model_user->getAllData("AreaGroup");	
$query_area = $this->model_user->getAllData("Area");	
$query_agency = $this->model_user->getAllData("Agency");	
$query_sales_center = $this->model_user->getAllData("AgencySalesCenter");	
$query_modal = $this->model_user->getAllData("Employee");	

	//	$query = $this->db->query("SELECT * FROM Employee")->result();


	
$data = array(
'title' => 'User',
'active' => 'User Add',
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query' => $query_modal,

);	
		$this->load->view('user/user_add',$data);
	}

//---- ajaxc change select
	public function getArea(){
		// POST data
		$postData = $this->input->post();
//$id = $postData['area_grup'];
		//load model
//		$this->load->model('Main_model');
//$data = $this->db->query("SELECT  AreaID, AreaName FROM Area WHERE AreaGroupID='$id' ")->result();
//$data = $postData;
		// get data
		$data = $this->model_user->getArea($postData);

		echo json_encode($data);
	}	


//---- ajaxc change select
	public function getAgency(){
		// POST data
		$postData = $this->input->post();

		$data = $this->model_user->getAgency($postData);

		echo json_encode($data);
	}	

	
//---- ajaxc change select multiple
	public function getSalesCenter(){
		// POST data
		$postData = $this->input->post();

		//$data = $postData;
		$data = $this->model_user->getSalesCenter($postData);

		echo json_encode($data);
	}	
	




	
	
public function add_save(){

//var_dump($_POST);die();

//auto increment UserID
$user_id = $this->model_user->getKodeUser();	



// $data = "";	
// $data =  array();	
// //$target['tar'] = $this->input->post('tar');
// foreach($UserSalesCenterID as $x){
// 	//'UserID' => ,  $x //UserID
// //$id_user_grup[]= array( 'id'=>$x);


// $data= array("'UserID' => $x ,"); //UserID
// }

//print_r($arrayName);die();	
// $data3 =  array(
// 	'UserID' => ,  $pk //UserID
// foreach($UserGroupID as $x){
// 	'UserID' => ,  $x //UserID


// }
// //	'' => ,  //SalesCenterID

// );



//print_r($pk);die();	
$data = array(
/*
'LastName'=>'abcd',
'FirstName'=>'xyz',
'Age'=>'99',
*/
/*
[sales] => S01
    [user_grup] => 1
    [user_login] => 
    [nama] => ADITYA HARTATY
    [npp] => 
    [password] => 
    [email] => aditia_hartaty@yahoo.com
    [tgl_aktif] => 
    [tgl_akhir] => 
    [area_grup] => 1
    [area] => 1
    [agency] => 17
    [sales_center] => Array
        (
            [0] => 4
            [1] => 69
        )
*/
 "UserID" => $user_id,
/*
"UserGroupID" => $this->input->post('user_grup'),
"ParentUserID" => "99",
"UserLoginID" => $this->input->post('user_login'),
"UserName" => $this->input->post('nama'),
"NPP" => $this->input->post('npp'),
"Password" => $this->input->post('password'), //dihashhhh
"SRLanguage" => "999",
"EmailAddress" => $this->input->post('email'),
"PhoneNumber" => "999",
"ActiveDate" => '2014-12-31 00:00:00.000',
"ExpireDate" => '2014-12-31 00:00:00.000',


//"ActiveDate" => $this->input->post('tgl_aktif'),
//"ExpireDate" => $this->input->post('tgl_akhir'),
"IsActive" => 1,
"AreaGroupID" => $this->input->post('area_grup'),
"AreaID" => $this->input->post('area'),
"AgencyID" => $this->input->post('agency'),
"EmployeeID" => $this->input->post('sales'),
"PhotoFilePath" => "xxxx",
"PhotoFileName" => "xxxx",
"IconPhotoFilePath" => "xxxx",
*/ 

"UserGroupID" => $this->input->post('user_grup'),
"ParentUserID" => "99",
"UserLoginID" => $this->input->post('user_login'),
"UserName" => $this->input->post('nama'),
"NPP" => $this->input->post('npp'),
"Password" => $this->input->post('password'), //dihashhhh
"SRLanguage" => "999",
"EmailAddress" => $this->input->post('email'),
"PhoneNumber" => "999",
// "ActiveDate" => '2014-12-31 00:00:00.000',
// "ExpireDate" => '2014-12-31 00:00:00.000',


"ActiveDate" => $this->input->post('tgl_aktif'),
"ExpireDate" => $this->input->post('tgl_akhir'),
"IsActive" => 1,
"AreaGroupID" =>  $this->input->post('area_grup'),
"AreaID" =>  $this->input->post('area'),
"AgencyID" => $this->input->post('agency'),
 "EmployeeID" =>  $this->input->post('sales'),
// "EmployeeID" =>  '123123',
"PhotoFilePath" => "xxxx",
"PhotoFileName" => "xxxx",
"IconPhotoFilePath" => "xxxx",


);	

$data2 =  array(
	'UserID' => $user_id,  //UserID

	'UserGroupID' => $this->input->post('user_grup'),  //UserGroupID

);

//=====================
//select multiple
$UserSalesCenterID = $this->input->post('sales_center');
foreach($UserSalesCenterID as $key => $value){

$data3[]= array(
	'UserID' => $user_id,
	'SalesCenterID' => $value, 
);


}

//print_r($data3);die();
//AppUser
$cek1 = $this->model_user->insertData('AppUser',$data);	
//AppUserUserGroup
$cek2 = $this->model_user->insertData('AppUserUserGroup',$data2);	
//AppUserSalesCenter	
$cek3 = $this->db->insert_batch('AppUserSalesCenter',$data3);





/*
print_r($cek);
*/
	if($cek1==1){
		
		echo"
<script>alert('Data Tersimpan');</script>		
		";
 redirect('user', 'refresh');		
			
	}else{
		
		echo"
<script>alert('Data Gagal Tersimpan');</script>		
		";
		
 redirect('user', 'refresh');		

	}
	
	
	
}	
	
		

	
	public function view()
	{
		$this->load->view('User/User_view');
	}
	

	
	public function edit()
	{
		$this->load->view('User/User_edit');
	}


	public function select_multiple()
	{

//combobox
$query_user_grup = $this->model_user->getAllData("AppUserGroup");	
$query_grup_area = $this->model_user->getAllData("AreaGroup");	
$query_area = $this->model_user->getAllData("Area");	
$query_agency = $this->model_user->getAllData("Agency");	
$query_sales_center = $this->model_user->getAllData("AgencySalesCenter");	
$query_modal = $this->model_user->getAllData("Employee");	

	//	$query = $this->db->query("SELECT * FROM Employee")->result();


	
$data = array(
'title' => 'User',
'active' => 'User Add',
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query' => $query_modal,

);			
		$this->load->view('User/select_multiple',$data);
	}


public function save_tes(){
var_dump($_POST);	
/*
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO like_table(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
*/


}

	
}
