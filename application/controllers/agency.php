<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| User Controller
*| --------------------------------------------------------------------------
*| user site
*|
*/
class Agency extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_app_user');
		$this->load->model('model_agency');
	}

	public function index()
	{

$query_list = $this->db->query("
SELECT * FROM Agency
")->result();

//print_r($query_list);die();
	
$data = array(
'title' => 'Agency',
'active' => 'Agency List',
'query_list' => $query_list
);		
		$this->load->view('agency/agency_list' ,$data);
	}


	public function update($agency_id){
// $agency_id = $this->uri->segment(3); 
// print_r($agency_id);
// die();


// $query_update = $this->db->query("SELECT * FROM Agency WHERE AgencyID ='$agency_id'")->result();	
$query_update = $this->db->query("


SELECT 

/*
a.AgencyID
,a.AgencyName
,a.StreetAddress
,a.VillageAddress
,a.SubDistrictAddress
,a.PostalCode
,a.CityAddress
,a.PhoneNumber
,a.FaxNumber
,a.EmailAddress
,a.Status
,a.ActiveDate
,a.EndDate
,a.IsActive
,a.UserType
*/
a.*
,b.*
/*

      ,b.ItemID
      ,b.PersonName
      ,b.BirthDate
      ,b.IdentityType
      ,b.IdentityNumber
*/
 FROM Agency a 
 LEFT JOIN AgencyPosition b ON a.AgencyID = b.AgencyID


 WHERE a.AgencyID ='$agency_id'")->result();

		// print_r($query_update);die();

// $this->load->model('agency_model');
$image_data = $this->model_agency->fetch_image();

	
$data = array(
'title' => 'Agency',
'active' => 'Agency List',
'query_update' => $query_update,
'image_data' => $image_data,
);		

		$this->load->view('agency/agency_update' ,$data);		
		
	}


	public function view($id){
// $agency_id = $this->uri->segment(3); 
// print_r($agency_id);
// die();

$agency_id = $id;
$query_update = $this->db->query("


SELECT 

/*
a.AgencyID
,a.AgencyName
,a.StreetAddress
,a.VillageAddress
,a.SubDistrictAddress
,a.PostalCode
,a.CityAddress
,a.PhoneNumber
,a.FaxNumber
,a.EmailAddress
,a.Status
,a.ActiveDate
,a.EndDate
,a.IsActive
,a.UserType
*/
a.*
,b.*
/*

      ,b.ItemID
      ,b.PersonName
      ,b.BirthDate
      ,b.IdentityType
      ,b.IdentityNumber
*/
 FROM Agency a 
 LEFT JOIN AgencyPosition b ON a.AgencyID = b.AgencyID


 WHERE a.AgencyID ='$agency_id'")->result();		
		// print_r($query_update);die();

// $this->load->model('agency_model');
// $image_data = $this->model_agency->fetch_image();


// print_r($query_update);die();
	
$data = array(
'title' => 'Agency',
'active' => 'Agency List',
'query_update' => $query_update,
// 'image_data' => $image_data,
);		

		$this->load->view('agency/agency_view' ,$data);		
		
	}

	function ajax_upload()
	{

		if(isset($_FILES["image_file"]["name"]))
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image_file'))
			{
				echo $this->upload->display_errors();
			}
			else
			{


		/*
				$data = $this->upload->data();

				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/'.$data["file_name"];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 200;
				$config['height'] = 200;
				$config['new_image'] = './uploads/'.$data["file_name"];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// $this->load->model('model_agency');
				
				
				
				$image_data = array(
					'Name'		=>	$data["file_name"],
					'JenisFile' => $this->input->post('jenis_file'), //???????????
					'Keterangan' => $this->input->post('keterangan'), //???????????
					// 'AgencyID' => $this->input->post('keterangan'), //???????????
					);
				$this->model_agency->insert_image($image_data);

		*/
				echo $this->model_agency->fetch_image();

				//echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
			}
		}

	}

	public function file_upload(){

$agency_id = $this->input->post('agency_id');		
// print_r($agency_id);die();
// print_r($_FILES);


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image_file'))
			{
				echo $this->upload->display_errors();
			}
			else
			{



				$data = $this->upload->data();

				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/'.$data["file_name"];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 200;
				$config['height'] = 200;
				$config['new_image'] = './uploads/'.$data["file_name"];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// $this->load->model('model_agency');
				
				
				
				$image_data = array(
					'Name'		=>	$data["file_name"],
					'JenisFile' => $this->input->post('jenis_file'), //???????????
					'Keterangan' => $this->input->post('keterangan'), //???????????
					'AgencyID' => $agency_id, //???????????
					);

$cek = $this->model_agency->insertData('AgencyFile',$image_data);				
				// $cek=$this->model_agency->insert_image($image_data);
// print_r($cek);

if($cek==1){
echo "<script>
alert('Upload Sukses');
history.go(-1);
</script>";
//redirect('site_url('')','refresh');
}else{
echo "<script>alert('Upload Gagal');history.go(-1);
</script>";


}

		/*
				echo $this->model_agency->fetch_image();
		*/

				//echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
			}



	}


	public function delete_file_upload($id)
	{
		//delete file
		// $this->load->model('agency_model');
		$image = $this->model_agency->get_by_id($id);
		 // print_r($image);die();

		if(file_exists('uploads/'.$image->Name) && $image->Name)
			unlink('uploads/'.$image->Name);
		
		$cek =$this->model_agency->delete_by_id($id);

		if($cek==1){
		echo "<script>
		alert('Delete Sukses');
		history.go(-1);
		</script>";
		//redirect('site_url('')','refresh');
		}else{
		echo "<script>
		alert('Delete Gagal');
		history.go(-1);
		</script>";
		}

		// echo json_encode(array("status" => TRUE));
	}	



	public function ajax_delete($id)
	{
		//delete file
		// $this->load->model('agency_model');
		
		$image = $this->model_agency->get_by_id($id);
		if(file_exists('uploads/'.$image->Name) && $image->Name)
			unlink('uploads/'.$image->Name);
		
		$this->model_agency->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}	



	public function update_save(){

		// print_r($_POST);die();
/*
Array
(
    [agency_id] => 19
    [nama_agency] => Allianz Utama
    [no_telpon] => 
    [email] => 
    [UserType] => Pilih Tipe User
    [kode_pos] => 17413
    [provinsi] => JAWA BARAT
    [kabupaten] => BEKASI
    [kecamatan] => PONDOK GEDE
    [keluranan] => JATIMAKMUR
)

*/

$data_update = array(

//'AgencyID' => '99',
//'AgencyName' => $this->input->post('nama_agency'),
'PhoneNumber' => $this->input->post('no_telpon'),
'EmailAddress' => $this->input->post('email'),
'UserType' => $this->input->post('UserType'),
'PostalCode' => $this->input->post('kode_pos'),

'SubDistrictAddress' => $this->input->post('provinsi'),
'CityAddress' => $this->input->post('kecamatan'),
'StreetAddress' => $this->input->post('kabupaten'),
'VillageAddress' => $this->input->post('kelurahan'),


);

$field_key = array('AgencyID' => $this->input->post('agency_id'), );

$cek =  $this->model_agency->updateData('Agency',$data_update,$field_key);


$data2 = array(
//	'AgencyID' =>$this->input->post('agency_id'), 

//	'AgencyID' =>$auto_inc_agency, 
	'ItemID' => $this->input->post('jabatan'), 
	'PersonName' => $this->input->post('nama_pengurus'), 
	'BirthDate' => $this->input->post('tgl_lahir'), 
	'IdentityType' => $this->input->post('tipe'), 
	'IdentityNumber' => $this->input->post('no_identitas'), 
);


$cek2 = $this->model_agency->updateData('AgencyPosition',$data2,$field_key);	 



		// if($cek==1){
		if($cek==1 && $cek2==1){
		echo "<script>
		alert('Update Sukses');

		</script>";
		redirect('/agency/','refresh');
		}else{
		echo "<script>
		alert('Update Gagal');
		history.go(-1);

		</script>";
		}



	}

//========================

	// public function index()
	// {

	// $query = $this->model_agency->query_list_agency();
	
	// //$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		
	// $data = array(

	// 		'title'			 => "Agency",
	// 		'subtitle'		 => "List Agency",
	// 		'query'			 => $query,
	// 		//'query_notif' 	 => $query_notif,
	// 	);	
	// 	$this->load->view('agency/list',$data);
	// }	

	public function add(){
		$query = $this->db->query("SELECT * FROM Agency")->result();
		$query_kode_pos = $this->db->query("SELECT * FROM kode_pos   ")->result();
		// print_r($query_kode_pos);die();
	$data = array(

		'title' 		=> "Agency",
		'subtitle' 		=> "Add Agency",
		'query' 		=> $query,
		'query_kode_pos' 		=> $query_kode_pos,
	);	
 	$this->load->view('agency/agency_add',$data);			
	}	


//dev
//	public function get_ajax($cari){
	public function get_ajax(){
  $cari = $_GET['cari'];

$kode_pos = $this->db->query("SELECT * FROM kode_pos WHERE kodepos='$cari'");
/*
if($kode_pos->num_rows()==1){
$result =	$kode_pos->result();
}else{
$result =	$kode_pos->result();
//print_r('lebih dari 1');
}
*/
/*
//$kelurahan = array();
//print_r($kode_pos->result());die();
  $output ="";
  $output.="<select name='kelurahan'>";
foreach($kode_pos->result() as $datas){
	
//$kelurahan[]=  $datas->kelurahan;	

  $output.="<option value='".$datas->kelurahan."' >".$datas->kelurahan."<option>";
}
  $output.="</select'>";

echo $output;
*/
//foreach($kelurahan as $xxxx){	
//	echo $xxxx->kelurahan;
//}
//print_r($kelurahan);die();
//=============================
//  $output.=' <div class="form-row"> ';

if ($kode_pos->num_rows()>0) {
	# code...


foreach($kode_pos->result() as $datas){  
  $output="";
$output.='

        <div class="form-group col-md-3">
          <label>Provinsi</label>
          <input type="text" class="form-control" name="provinsi" id="provinsi" value="'.$datas->provinsi.'" readonly>
        </div>
  ';        
$output.='
        <div class="form-group col-md-3">
          <label>Kabupaten / Kota</label>
          <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="'.$datas->kabupaten.'" readonly>
        </div>
  ';        
$output.='
        <div class="form-group col-md-3">
          <label>Kecamatan</label>
          <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="'.$datas->kecamatan.'" readonly>
        </div>

  ';

}




  $output.='

        <div class="form-group col-md-3">
          <label>Kelurahan / Desa</label>
          <select class="form-control" name="keluranan" id="keluranan">
';
foreach($kode_pos->result() as $datas){  
$output.='          
            <option value="'.$datas->kelurahan.'">'.$datas->kelurahan.'</option>
  ';
}
$output.='  
          </select>
        </div>
 ';     


  //$output.="</div>";



/*

foreach($kode_pos->result() as $datas){
	


  $output="";
  $output.="<input type='text' name='provinsi' value='".$datas->provinsi."'>";
  $output.="<input type='text' name='kabupaten' value='".$datas->kabupaten."'>";
  $output.="<input type='text' name='kecamatan' value='".$datas->kecamatan."'>";
//if($)  
//	foreach($datas->kelurahan as $x){
		
  //$output.="<input type='text' id='kelurahan' value='".$x->kelurahan."'>";
//	}
/////$output.="<input type='text' name='kelurahan' value=''>";

//   $output.="<select name='kelurahan'>";
// foreach($datas->kelurahan as $xxxx){
	
//   $output.="<option value='".$xxxx->kelurahan."' >".$xxxx->kelurahan."<option>";
// }
//   $output.="</select'>";

  
	
}
//  $output ="";
  $output.="<select name='kelurahan'>";
foreach($kode_pos->result() as $datas){
	
//$kelurahan[]=  $datas->kelurahan;	

  $output.="<option value='".$datas->kelurahan."' >".$datas->kelurahan."</option>";
}
  $output.="</select'>";


*/

} else {
  $output="";
$output.='

        <div class="form-group col-md-12">
          <label>KODE POS SALAH</label>
        </div>
  ';        
}
  
  
  
  
  echo $output;
	
/*
*/	
	
		//$kode_pos = $this->input->post();
		
		//echo json_encode($kode_pos);
		
	}



	public function add_ajax(){


$data = array(

		'title' 		=> "Agency",
		'subtitle' 		=> "Add Agency",
		// 'query' 		=> $query,
		// 'query_kode_pos' 		=> $query_kode_pos,
	);	
 	$this->load->view('agency/add_ajax',$data);			
	


	}

	function get_something()
	{


		// $this->load->library('ajax');
		$arr['something'] = 'Something Good';
		if ($this->input->post('something_id') == '2')
		{
			$arr['something'] = 'Something Better';
		}
		// $this->ajax->output_ajax($arr);
		echo json_encode($arr);
	}
// 	public function update($id){

// // echo "update agency";
// // echo $id ;

// $data1 = array('AgencyID' => $id, );

// $query_update = $this->model_agency->getSelectedData('Agency',$data1)->result();

// // print_r($query_update->result());die();

// $data = array(

// 			'title'			 => "Agency",
// 			'subtitle'		 => "Update Agency",
// 			'query_update'			 => $query_update,

// );

// $this->load->view('agency/update',$data);

// 	}
	
	public function edit(){
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	$data = array(

		'title' 			=> "Agency",
		'subtitle' 			=> "Agency UPDATE",
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
	);	
 	$this->load->view('agency/edit',$data);			
	}

	

	public function add_save(){
	  // print_r($_POST);die();
/*
Array
(
    [nama_agency] => vsdkg;odsgfop
    [no_telpon] => 9798987
    [email] => jkl@gmail.com
    [UserType] => UserType.TeleAcc
    [kode_pos] => 17413
    [provinsi] => JAWA BARAT
    [kabupaten] => BEKASI
    [kecamatan] => PONDOK GEDE
    [keluranan] => JATIMAKMUR
    [nama_pengurus] => JOKO
    [jabatan] => Direktur Pemasaran
    [tgl_lahir] => 2018-04-06
    [tipe] => ktp
    [no_identitas] => 4354354353454335
    [kirim] => SIMPAN
)


*/			
	$data = array(

//'AgencyID' => '99',
'AgencyName' => $this->input->post('nama_agency'),
'PhoneNumber' => $this->input->post('no_telpon'),
'EmailAddress' => $this->input->post('email'),
'UserType' => $this->input->post('UserType'),
'PostalCode' => $this->input->post('kode_pos'),

'SubDistrictAddress' => $this->input->post('provinsi'),
'CityAddress' => $this->input->post('kecamatan'),
'StreetAddress' => $this->input->post('kabupaten'),
'VillageAddress' => $this->input->post('kelurahan'),

///'FaxNumber' => $this->input->post('FaxNumber'),
'Status' => '1',
'ActiveDate' => '2018-03-19', //now date
'EndDate' => '2018-03-19',
'IsActive' => '1',

);
	  
$cek = $this->db->insert('Agency',$data);	
// $agency_id = $this->model_agency->insert_agency($data);	
// print_r($agency_id);die();
//return AgencyID

/*
[AgencyID]
      ,[ItemID]
      ,[PersonName]
      ,[BirthDate]
      ,[IdentityType]
      ,[IdentityNumber]
*/ 
$id_inc = $this->db->query("SELECT MAX(AgencyID) as id_inc FROM Agency ")->result();
$auto_inc_agency = $id_inc[0]->id_inc;      

$data2 = array(
//	'AgencyID' =>$this->input->post('agency_id'), 

	'AgencyID' =>$auto_inc_agency, 
	'ItemID' => $this->input->post('jabatan'), 
	'PersonName' => $this->input->post('nama_pengurus'), 
	'BirthDate' => $this->input->post('tgl_lahir'), 
	'IdentityType' => $this->input->post('tipe'), 
	'IdentityNumber' => $this->input->post('no_identitas'), 
);


$cek2 = $this->db->insert('AgencyPosition',$data2);	 




 if($cek==1 && $cek2==1 ){
// if($cek==1 ){
echo"<script>alert('Data Tersimpan');</script>";
redirect('/agency/','refresh');
}else{
echo"<script>alert('Data Gagal Tersimpan');</script>";
redirect('/agency/add','refresh');
}	
	}
	
	public function tes_auto_inc(){

$id_inc = $this->db->query("SELECT MAX(AgencyID) as id_inc FROM Agency ")->result();
$auto_inc = $id_inc[0]->id_inc;

print_r($auto_inc);



	}
	
	public function save_edit(){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'pdf|jpg|png';
		$config['max_size']             = 1000;
		//$config['file_name']             = $nmfile;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// upload gambar 1
        $this->upload->do_upload('photo');
        $result1 = $this->upload->data ();
		$file = $result1['file_name'];
        // upload gambar 2
        $this->upload->do_upload('ktp');
        $result2 = $this->upload->data();
        // upload gambar 1
        $this->upload->do_upload('do_dont');
        $result3 = $this->upload->data();
        // menyimpan hasil upload
        $result = array('photo'=>$result1,'ktp'=>$result2,'do_dont'=>$result3);		
			
			
		$data_save = array(
		'id'				=>$this->input->post('id'),
     	'ket'				=>$this->input->post('ket'),
		'keterangan'		=>$this->input->post('keterangan'),
		'tgl'				=>$this->input->post('tgl'),
		//'npp'				=>$this->input->post('npp')
		);		
		
		$data_update = array(
		'id_posisi'			=>$this->input->post('id_posisi'),
        'photo'				=>$file,
        'nama_lengkap'		=>$this->input->post('nama_lengkap'),
		'nama_panggil'		=>$this->input->post('nama_panggil'),
        //'no_ktp'			=>$this->input->post('no_ktp'),
        'npwp'				=>$this->input->post('npwp'),
        'tempat_lahir'		=>$this->input->post('tempat_lahir'),
		'tanggal_lahir'		=>$this->input->post('tanggal_lahir'),
        'tinggi_badan'		=>$this->input->post('tinggi_badan'),
        'berat_badan'		=>$this->input->post('berat_badan'),
        'alamat'			=>$this->input->post('alamat'),
		'kota'				=>$this->input->post('kota'),
        'kodepos'			=>$this->input->post('kodepos'),
        'lama'				=>$this->input->post('lama'),
        'status_tinggal'	=>$this->input->post('status_tinggal'),
		'status'			=>$this->input->post('status'),
        'agama'				=>$this->input->post('agama'),
        'telp'				=>$this->input->post('telp'),
        'hp'				=>$this->input->post('hp'),
		'hp2'				=>$this->input->post('hp2'),
		'ibu'				=>$this->input->post('ibu'),
		'alamat_ktp'		=>$this->input->post('alamat_ktp'),
		'kota_ktp'			=>$this->input->post('kota_ktp'),
        'kodepos_ktp'		=>$this->input->post('kodepos_ktp'),
        'tinggal_ktp'		=>$this->input->post('tinggal_ktp'),
        'email'				=>$this->input->post('email'),
        'kendaraan'			=>$this->input->post('kendaraan'),
        'nama'				=>$this->input->post('nama'),
		'alamat_emergency'	=>$this->input->post('alamat_emergency'),
		'hubungan'			=>$this->input->post('hubungan'),
        'no_hp'				=>$this->input->post('no_hp'),
		'tgl_aktif'			=>$this->input->post('tgl_aktif'),
        'tgl_nonaktif'		=>$this->input->post('tgl_nonaktif'),
        'jenjang_pendidikan'=>$this->input->post('jenjang_pendidikan'),
		'nama_sekolah'		=>$this->input->post('nama_sekolah'),
        'kota_sekolah'		=>$this->input->post('kota_sekolah'),
        'program_study'		=>$this->input->post('program_study'),
        'ipk'				=>$this->input->post('ipk'),
		'tahun_ijazah'		=>$this->input->post('tahun_ijazah'),
		'jenjang_pendidikan1'=>$this->input->post('jenjang_pendidikan1'),
		'nama_sekolah1'		=>$this->input->post('nama_sekolah1'),
        'kota_sekolah1'		=>$this->input->post('kota_sekolah1'),
        'program_study1'	=>$this->input->post('program_study1'),
        'ipk1'				=>$this->input->post('ipk1'),
		'tahun_ijazah1'		=>$this->input->post('tahun_ijazah1'),
		'jenjang_pendidikan2'=>$this->input->post('jenjang_pendidikan2'),
		'nama_sekolah2'		=>$this->input->post('nama_sekolah2'),
        'kota_sekolah2'		=>$this->input->post('kota_sekolah2'),
        'program_study2'	=>$this->input->post('program_study2'),
        'ipk2'				=>$this->input->post('ipk2'),
		'tahun_ijazah2'		=>$this->input->post('tahun_ijazah2'),
		'perusahaan'		=>$this->input->post('perusahaan'),
        'jabatan'			=>$this->input->post('jabatan'),
        'tgl_masuk'			=>$this->input->post('tgl_masuk'),
        'tgl_resign'		=>$this->input->post('tgl_resign'),
		'alasan'			=>$this->input->post('alasan'),
		'perusahaan1'		=>$this->input->post('perusahaan1'),
        'jabatan1'			=>$this->input->post('jabatan1'),
		'tgl_masuk1'		=>$this->input->post('tgl_masuk1'),
        'tgl_resign1'		=>$this->input->post('tgl_resign1'),
		'alasan1'			=>$this->input->post('alasan1'),
		'perusahaan2'		=>$this->input->post('perusahaan2'),
        'jabatan2'			=>$this->input->post('jabatan2'),
		'tgl_masuk2'		=>$this->input->post('tgl_masuk2'),
        'tgl_resign2'		=>$this->input->post('tgl_resign2'),
		'alasan2'			=>$this->input->post('alasan2'),	
		'ktp'				=>$this->input->post('ktp'),
        'do_dont'			=>$this->input->post('do_dont'),
		'ket'				=>$this->input->post('ket'),
		'tgl'				=>$this->input->post('tgl')
		);
		
		$key = array(
		'id' => $this->input->post('id'),
		);
		//var_dump($data_save);die();
		$cek = $this->db->insert('Employee_history',$data_save);
		$update=$this->db->update('Employee',$data_update,$key);
		
		if($update && $cek ) {
		?><script>window.alert('DATA SUKSES DIUBAH');
			</script>
<?
				redirect('sales_force', 'refresh');				
		}else{
		$this->alert =$this->alert("<p class='alert alert-danger'>","GAGAL DITAMBAHKAN");
		}
	}

//=============TES
	public function tes_insert(){

	$data = array(

//'AgencyID' => '99',
'AgencyName' => 'AAA',
'PhoneNumber' => '99999999999',
'EmailAddress' => 'aaa@gmail.com',
'UserType' => 'Type_AAA',
'PostalCode' => '12345',

'SubDistrictAddress' => 'SSSS',
'CityAddress' => 'SSSS',
'StreetAddress' => 'SSSS',
'VillageAddress' =>  'SSSS',

///'FaxNumber' => $this->input->post('FaxNumber'),
'Status' => '1',
'ActiveDate' => '2018-03-19', //now date
'EndDate' => '2018-03-19',
'IsActive' => '1',

);
	  
// $cek = $this->db->insert('Agency',$data);	
$agency_id = $this->model_agency->insert_agency($data);	
print_r($agency_id);die();
//return AgencyID

	}

}
