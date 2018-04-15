<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| User Controller
*| --------------------------------------------------------------------------
*| user site
*|
*/
class App_user extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_app_user');
	}

	/**
	* show all users
	*
	* @var $offset String
	*/
	// public function index($offset = 0)
	// {
	// 	$this->is_allowed('user_list');

	// 	$filter = $this->input->get('q');
	// 	$field 	= $this->input->get('f');

	// 	$this->data['users'] = $this->model_user->get($filter, $field, $this->limit_page, $offset);
	// 	$this->data['user_counts'] = $this->model_user->count_all($filter, $field);

	// 	$config = [
	// 		'base_url'     => 'administrator/user/index/',
	// 		'total_rows'   => $this->model_user->count_all($filter, $field),
	// 		'per_page'     => $this->limit_page,
	// 		'uri_segment'  => 4,
	// 	];

	// 	$this->data['pagination'] = $this->pagination($config);

	// 	$this->template->title('User List');
	// 	$this->render('backend/standart/administrator/user/user_list', $this->data);
	// }



public	function index(){


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
$query_user_list = $this->model_app_user->manualQuery($q);
//print_r($query_user_list);die();
$data = array(
'title' => 'User',
'active' => 'User List',
'query_user_list' => $query_user_list,

);		
		$this->load->view('app_user/app_user_list' ,$data);


}

	/**
	* show all users
	*
	*/
	public function add()
	{
		// $this->is_allowed('user_add');




//combobox
$query_user_grup = $this->model_app_user->getAllData("AppUserGroup");	
$query_grup_area = $this->model_app_user->getAllData("AreaGroup");	
$query_area = $this->model_app_user->getAllData("Area");	
$query_agency = $this->model_app_user->getAllData("Agency");	
$query_sales_center = $this->model_app_user->getAllData("AgencySalesCenter");	

$query_modal = $this->model_app_user->query_all_employee();	

	//	$query = $this->db->query("SELECT * FROM Employee")->result();


	
$data = array(
'title' => 'User',
'active' => 'User Add',
'query_user_grup' => $query_user_grup,
'query_grup_area' => $query_grup_area,
'query_area' => $query_area,
'query_agency' => $query_agency,
'query_sales_center' => $query_sales_center,
'query_all_employee' => $query_modal,

);	
		$this->load->view('app_user/app_user_add',$data);



	}



//================ajax change select


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
		$data = $this->model_app_user->getArea($postData);

		echo json_encode($data);
	}	


//---- ajaxc change select
	public function getAgency(){
		// POST data
		$postData = $this->input->post();

		$data = $this->model_app_user->getAgency($postData);

		echo json_encode($data);
	}	

	
//---- ajaxc change select multiple
	public function getSalesCenter(){
		// POST data
		$postData = $this->input->post();

		//$data = $postData;
		$data = $this->model_app_user->getSalesCenter($postData);

		echo json_encode($data);
	}	




//==========


	/**
	* Add New users
	*
	* @return JSON
	*/
	public function add_save(){


// print_r($_POST);die();		
//auto increment UserID
$user_id = $this->model_app_user->getKodeUser();	



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

"UserGroupID" => $this->input->post('user_group'),

"ParentUserID" => "99",
"UserLoginID" => $this->input->post('email'),
"UserName" => $this->input->post('nama'),
"NPP" => $this->input->post('npp'),
// "Password" => $this->input->post('password'), //dihashhhh
//pass default
"Password" => 'bni1946', //dihashhhh



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

	'UserGroupID' => $this->input->post('user_group'),  //UserGroupID

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
$cek1 = $this->model_app_user->insertData('AppUser',$data);	
//AppUserUserGroup
$cek2 = $this->model_app_user->insertData('AppUserUserGroup',$data2);	
//AppUserSalesCenter	
$cek3 = $this->db->insert_batch('AppUserSalesCenter',$data3);





/*
print_r($cek);
*/
	if($cek1==1){
		
		echo"
<script>alert('Data Tersimpan');</script>		
		";
 redirect('app_user', 'refresh');		
			
	}else{
		
		echo"
<script>alert('Data Gagal Tersimpan');</script>		
		";
		
 redirect('app_user/add', 'refresh');		

	}



	}

	/**
	* Update view users
	*
	* @var $id String
	*/
	public function edit($id)
	{
		// $this->is_allowed('user_update');

		// $this->data = [
		// 	'user' 			=> $this->model_user->find($id),
		// 	'group_user' 	=> $this->model_user->get_group_user($id)
		// ];

		// $this->template->title('User Update');
		// $this->render('backend/standart/administrator/user/user_update', $this->data);
	}

	/**
	* Update users
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		// if (!$this->is_allowed('user_update', false)) {
		// 	return $this->response([
		// 		'success' => false,
		// 		'message' => 'Sorry you do not have permission to access'
		// 		]);
		// }

		// $this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');

		// if ($this->form_validation->run()) {
		// 	$user_avatar_uuid = $this->input->post('user_avatar_uuid');
		// 	$user_avatar_name = $this->input->post('user_avatar_name');

		// 	$save_data = [
		// 		'full_name' 	=> $this->input->post('full_name'),
		// 	];

		// 	if (!empty($user_avatar_name)) {
		// 		if (!empty($user_avatar_uuid)) {
		// 			$user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;
		
		// 			rename(FCPATH . '/uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 
		// 					FCPATH . '/uploads/user/' . $user_avatar_name_copy);

		// 			if (!is_file(FCPATH . '/uploads/user/' . $user_avatar_name_copy)) {
		// 				return $this->response([
		// 					'success' => false,
		// 					'message' => 'Error uploading avatar'
		// 					]);
		// 				exit;
		// 			}

		// 			$save_data['avatar'] = $user_avatar_name_copy;
		// 		}
		// 	}

		// 	if ($pass = $this->input->post('password')) {
		// 		$password = $pass;
		// 	} else {
		// 		$password = false;
		// 	}

		// 	$save_user = $this->aauth->update_user($id, $this->input->post('email'), $password, $this->input->post('username'), $save_data);

		// 	if ($save_user) {
		// 		//update user to group
		// 		$this->db->delete('aauth_user_to_group', ['user_id' => $id]);
		// 		if (count($this->input->post('group'))) {
		// 			foreach ($this->input->post('group') as $group_id) {
		// 				$this->aauth->add_member($id, $group_id);				
		// 			}
		// 		}

		// 		if ($this->input->post('save_type') == 'stay') {
		// 			$this->response['success'] = true;
		// 			$this->response['message'] = 'Your data has been successfully saved into the';
		// 		} else {
		// 			set_message('Your data has been successfully saved into the database. ');
	 //        		$this->response['success'] = true;
		// 			$this->response['redirect'] = site_url('administrator/user');
		// 		}
		// 	} else {
		// 		$this->response['success'] = false;
		// 		$this->response['message'] = 'Data not change '.$this->aauth->print_errors();
		// 	}

		// } else {
		// 	$this->response['success'] = false;
		// 	$this->response['message'] = validation_errors();
		// }

		// return $this->response($this->response);
	}

	/**
	* delete users
	*
	* @var $id String
	*/
	public function delete($id)
	{
		// $this->is_allowed('user_delete');

		// $this->load->helper('file');

		// $arr_id = $this->input->get('id');
		// $remove = false;

		// if (!empty($id)) {
		// 	$remove = $this->_remove($id);
		// } elseif (count($arr_id) >0) {
		// 	foreach ($arr_id as $id) {
		// 		$remove = $this->_remove($id);
		// 	}
		// }

		// if ($remove) {
  //           set_message('User has been deleted.', 'success');
		// } else {
  //           set_message('Error delete user.', 'error');
		// }

		// redirect('administrator/user');
	}

	/**
	* View view users
	*
	* @var $id String
	*/
	public function view($id)
	{
		// $this->is_allowed('user_view');

		// $this->data['user'] = $this->model_user->find($id);

		// $this->template->title('User Detail');
		// $this->render('backend/standart/administrator/user/user_view', $this->data);
	}

	/**
	* Profile user
	*
	*/
	public function profile()
	{
		// $this->is_allowed('user_profile');

		// $this->data['user'] = $this->model_user->find($this->aauth->get_user()->id);

		// $this->template->title('User Profile');
		// $this->render('backend/standart/administrator/user/user_profile', $this->data);
	}

	/**
	* Update view profile
	*
	*/
	public function edit_profile()
	{
		// $this->is_allowed('user_update_profile');
		// $id_user = $this->aauth->get_user()->id;
		// $this->data = [
		// 	'user' 			=> $this->model_user->find($id_user),
		// 	'group_user' 	=> $this->model_user->get_group_user($id_user)
		// ];

		// $this->template->title('Update Profile');
		// $this->render('backend/standart/administrator/user/user_update_profile', $this->data);
	}

	/**
	* Update profile
	*
	* @var $id String
	*/
	public function edit_profile_save($id)
	{
		// if (!$this->is_allowed('user_update_profile', false)) {
		// 	return $this->response([
		// 		'success' => false,
		// 		'message' => 'Sorry you do not have permission to access'
		// 		]);
		// }

		// $this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');

		// if ($this->form_validation->run()) {
		// 	$user_avatar_uuid = $this->input->post('user_avatar_uuid');
		// 	$user_avatar_name = $this->input->post('user_avatar_name');

		// 	$save_data = [
		// 		'full_name' 	=> $this->input->post('full_name'),
		// 	];

		// 	if (!empty($user_avatar_name)) {
		// 		if (!empty($user_avatar_uuid)) {
		// 			$user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;
		
		// 			rename(FCPATH . '/uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 
		// 					FCPATH . '/uploads/user/' . $user_avatar_name_copy);

		// 			if (!is_file(FCPATH . '/uploads/user/' . $user_avatar_name_copy)) {
		// 				return $this->response([
		// 					'success' => false,
		// 					'message' => 'Error uploading avatar'
		// 					]);
		// 				exit;
		// 			}

		// 			$save_data['avatar'] = $user_avatar_name_copy;
		// 		}
		// 	}

		// 	if ($pass = $this->input->post('password')) {
		// 		$password = $pass;
		// 	} else {
		// 		$password = false;
		// 	}

		// 	$save_user = $this->aauth->update_user($id, $this->input->post('email'), $password, $this->input->post('username'), $save_data);

		// 	if ($save_user) {
		// 		//update user to group
		// 		$this->db->delete('aauth_user_to_group', ['user_id' => $id]);
		// 		if (count($this->input->post('group'))) {
		// 			foreach ($this->input->post('group') as $group_id) {
		// 				$this->aauth->add_member($id, $group_id);				
		// 			}
		// 		}
		// 		$this->data['success'] = true;
		// 		$this->data['id'] 	   = $id;
		// 		$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/user', ' Go back to list');
		// 	} else {
		// 		$this->data['success'] = false;
		// 		$this->data['message'] = 'Data not change '.$this->aauth->print_errors();
		// 	}
		// } else {
		// 	$this->data['success'] = false;
		// 	$this->data['message'] = validation_errors();
		// }

		// return $this->response($this->data);
	}

	/**
	* delete users
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		// $user = $this->model_user->find($id);

		// if (!empty($user->image)) {
		// 	$path = FCPATH . '/uploads/user/' . $user->image;

		// 	if (is_file($path)) {
		// 		$delete_file = delete_files($path);
		// 	}
		// }

		// return $this->model_user->remove($id);
	}

	/**
	* Upload Image User
	* 
	* @return JSON
	*/
	public function upload_avatar_file()
	{
		// if (!$this->is_allowed('user_add', false)) {
		// 	return $this->response([
		// 		'success' => false,
		// 		'message' => 'Sorry you do not have permission to access'
		// 		]);
		// }

		// $uuid = $this->input->post('qquuid');

		// mkdir(FCPATH . '/uploads/tmp/' . $uuid);

		// $config = [
		// 	'upload_path' 		=> './uploads/tmp/' . $uuid . '/',
		// 	'allowed_types' 	=> 'png|jpeg|jpg|gif',
		// 	'max_size'  		=> '1000'
		// ];
		
		// $this->load->library('upload', $config);
		// $this->load->helper('file');

		// if ( ! $this->upload->do_upload('qqfile')){
		// 	$result = [
		// 		'success' 	=> false,
		// 		'error' 	=>  $this->upload->display_errors()
		// 	];

  //   		return $this->response($result);
		// }
		// else{
		// 	$upload_data = $this->upload->data();

		// 	$result = [
		// 		'uploadName' 	=> $upload_data['file_name'],
		// 		'success' 		=> true,
		// 	];

  //   		return $this->response($result);
		// }
	}

	/**
	* Delete Image User
	* 
	* @return JSON
	*/
	public function delete_avatar_file($uuid)
	{
		// if (!$this->is_allowed('user_delete', false)) {
		// 	return $this->response([
		// 		'success' => false,
		// 		'message' => 'Sorry you do not have permission to access'
		// 		]);
		// }

		// if (!empty($uuid)) {
		// 	$this->load->helper('file');

		// 	$delete_by = $this->input->get('by');
		// 	$delete_file = false;

		// 	if ($delete_by == 'id') {
		// 		$user = $this->model_user->find($uuid);
		// 		$path = FCPATH . 'uploads/user/'.$user->avatar;

		// 		if (isset($uuid)) {
		// 			if (is_file($path)) {
		// 				$delete_file = unlink($path);
		// 				$this->model_user->change($uuid, ['avatar' => '']);
		// 			}
		// 		}
		// 	} else {
		// 		$path = FCPATH . '/uploads/tmp/' . $uuid . '/';
		// 		$delete_file = delete_files($path, true);
		// 	}

		// 	if (isset($uuid)) {
		// 		if (is_dir($path)) {
		// 			rmdir($path);
		// 		}
		// 	}

		// 	if (!$delete_file) {
		// 		$result = [
		// 			'error' =>  'Error delete file'
		// 		];

	 //    		return $this->response($result);
		// 	} else {
		// 		$result = [
		// 			'success' => true,
		// 		];

	 //    		return $this->response($result);
		// 	}
		// }
	}

	/**
	* Get Image User
	* 
	* @return JSON
	*/
	public function get_avatar_file($id)
	{
		// if (!$this->is_allowed('user_update', false)) {
		// 	return $this->response([
		// 		'success' => false,
		// 		'message' => 'Sorry you do not have permission to access'
		// 		]);
		// }
		// $this->load->helper('file');
		
		// $user = $this->model_user->find($id);

		// if (!$user) {
		// 	$result = [
		// 		'error' =>  'Error getting file'
		// 	];

  //   		return $this->response($result);
		// } else {
		// 	if (!empty($user->avatar)) {
		// 		$result[] = [
		// 			'success' 				=> true,
		// 			'thumbnailUrl' 			=> base_url('uploads/user/'.$user->avatar),
		// 			'id' 					=> 0,
		// 			'name' 					=> $user->avatar,
		// 			'uuid' 					=> $user->id,
		// 			'deleteFileEndpoint' 	=> base_url('administrator/user/delete_avatar_file'),
		// 			'deleteFileParams'		=> ['by' => 'id']
		// 		];

	 //    		return $this->response($result);
		// 	}
		// }
	}

	/**
	* Set status user
	*
	* @return JSON
	*/
	public function set_status()
	{
	// 	if (!$this->is_allowed('user_update_status', false)) {
	// 		return $this->response([
	// 			'success' => false,
	// 			'message' => 'Sorry you do not have permission to access'
	// 			]);
	// 	}
	// 	$status = $this->input->post('status');
	// 	$id = $this->input->post('id');

	// 	$update_status = $this->model_user->change($id, [
	// 		'banned' => $status == 'inactive' ? 1 : 0
	// 	]);
		
	// 	if ($update_status) {
	// 		$this->response = [
	// 			'success' => true,
	// 			'message' => 'User status updated',
	// 		];
	// 	} else {
	// 		$this->response = [
	// 			'success' => false,
	// 			'message' => 'Data not change.'
	// 		];
	// 	}

	// 	return $this->response($this->response);
	// }

	// /**
	// * Export to excel
	// *
	// * @return Files Excel .xls
	// */
	// public function export()
	// {
	// 	$this->is_allowed('user_export');
	// 	$this->model_user->export('aauth_users', 'user');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
	// 	$this->is_allowed('user_export');

	// 	$this->model_user->pdf('aauth_users', 'User');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/administrator/User.php */