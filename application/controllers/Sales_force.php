<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_force extends Admin {
// class Sales_force extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
//        $this->load->model('model_auth');
 //       $this->load->model('sales_force_model');


// //admin agency 42
//        $sess_array = array(
//       'UserID'      => '12345',
//       'UserGroupID' => '42',
//       'UserName'    =>'admin agency 123',
//       'AreaGroupID' => '99',
//       'AreaID'      => '6', //bandung
//       'AgencyID'    => '99',
//       'EmployeeID'  => '99',
//       'Login_Status'=> true,  

//       );              //set session with value from database
//                 $this->session->set_userdata($sess_array);
        
    }



  public function insert_dummy_employee_(){

//auto_increment
$employee_id = $this->db->query('select (MAX(EmployeeID)+1) as increment from Employee_')->result();
$increment_employee_id = $employee_id[0]->increment;


    $data_employee = array(
//    'id_posisi'     =>$this->input->post('id_posisi'),

//get auto increment
//$employee_id

 'EmployeeID' => $increment_employee_id,
 'ParentEmployeeID' => "99" ,
 'EmployeeName' => 'ZZZZZZ' ,
 // 'EmployeeOldCode' => "99" ,
 // 'EmployeeNewCode' => "99" ,
 // 'UserGroupID' => "99" ,
 // 'EmployeeStatus' => "99" ,
 // 'EmployeeGrade' => "99" ,
 // 'EmployeeBirthPlace' => "99" ,
 // 'EmployeeBirthDate' => "99" ,
 // 'MothersMaidenName' => "99" ,
 // 'IdentityType' => "99" ,
 // 'IdentityNumber' => "99" ,
 // 'IdentityFilePath' => "99" ,
 // 'IdentityFileName' => "99" ,
 // 'Sex' => "99" ,
 // 'Religion' => "99" ,
 // 'NPWP' => "99" ,
 // 'FixedPhoneNumber' => "99" ,
 // 'PhoneNumber' => "99" ,
 // 'PhoneNumber2' => "99" ,
 // 'EmergencyName' => "99" ,
 // 'EmergencyStatus' => "99" ,
 // 'EmergencyNumber' => "99" ,
 // 'EmergencyAddress' => "99" ,
 // 'Province' => "99" ,
 // 'Kecamatan' => "99" ,
 // 'Kabupaten' => "99" ,
 // 'Kelurahan' => "99" ,
 // 'PostalCode' => "99" ,
 // 'StreetAddress' => "99" ,
 // 'EmailAddress' => "99" ,
 // 'MaritalStatus' => "99" ,
 // 'Height' => "99" ,
 // 'Weight' => "99" ,
 // 'PhotoFilePath' => "99" ,
 // 'PhotoFileName' => "99" ,
 // 'AgencyID' => "99" ,
 // 'SalesCenterID' => "99" ,
 // 'InterviewApprovalID' => "99" ,
 // 'InterviewLevel' => "99" ,
 // 'InterviewStatus' => "99" ,
 // 'HiringApprovalID'=> "99" ,
 'HiringLevel' => "1" ,
 // 'HiringStatus' => "99" ,
 // 'ApprovalID' => "99" ,
 // 'ApprovalLevel' => "99" ,
 // 'ApprovalStatus' => "99" ,
 //'IsDiscontinued' => false , //terminate
 // 'IsDedicated' => "99" ,
 // 'DedicatedRemark' => "99" ,
 // 'ActiveDate' => "99" ,
 // 'EndDate' => "99" ,
 // 'EndReason' => "99" ,
 // 'CreatedDate' => "99" ,
// 'CreatedBy' => $_SESSION['UserID'] ,

);

$cek1 = $this->db->insert('Employee_',$data_employee);

print_r($cek1);

  }

//dev=======
public function index_dev(){


print_r($_SESSION);die();

// UserGroupID
$id_agency = $_SESSION['AgencyID'];
$id_user_group = $_SESSION['UserGroupID'];
//dummy		

// $id_agency = 1;

//jika admin login
if ($id_user_group==1) {
	
	$where="";
} else {
	$where = "WHERE a.AgencyID = '$id_agency'";
}



//print_r($id_agency);die();

	$query = $this->db->query("
	SELECT 
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
	left JOIN Agency d ON a.AgencyID = d.AgencyID
	$where 
	ORDER BY tgl DESC
		
		")->result();
		
	// $query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='1'")->result();
//var_dump($query_notif[0]->total);die();
	$data = array(

			'title'			 => "SALES FORCE",
			'subtitle'		 => "LIST SALES FORCE",
			'query'			 => $query,
			// 'query_notif' 	 =>$query_notif,

		);	
		$this->load->view('sales_force/sales_force_list',$data);


	}	

//dev
//	public function get_ajax($cari){
	public function get_ajax_kodepos_1(){
  $cari = $_GET['cari'];

$kode_pos = $this->db->query("SELECT * FROM kode_pos WHERE kodepos='$cari'");

if ($kode_pos->num_rows()>0) {
	# code...


foreach($kode_pos->result() as $datas){  
  $output="";
$output.='
    <p><input value="'.$datas->provinsi.'"  name="provinsi_1" id="provinsi_1" readonly></p>
  ';        
$output.='
    <p><input value="'.$datas->kabupaten.'"  name="kabupaten_1" id="kabupaten_1" readonly></p>
  ';        
$output.='
    <p><input value="'.$datas->kecamatan.'"  name="kecamatan_1" id="kecamatan_1" readonly></p>
        </div>

  ';

}




  $output.='

    <p>
    <select name="kelurahan_1" id="kelurahan_1"  >


';
foreach($kode_pos->result() as $datas){  
$output.='          
            <option value="'.$datas->kelurahan.'">'.$datas->kelurahan.'</option>
  ';
}
$output.='  
          </select>
        </p>
 ';     



} else {
  $output="";
$output.='

        <p>
          <label>KODE POS SALAH</label>
        </p>
  ';        
}
  
  
  
  
  echo $output;
	
		
	}


	public function get_ajax_kodepos_2(){
  $cari = $_GET['cari'];

$kode_pos = $this->db->query("SELECT * FROM kode_pos WHERE kodepos='$cari'");

if ($kode_pos->num_rows()>0) {
	# code...


foreach($kode_pos->result() as $datas){  
  $output="";
$output.='
    <p><input value="'.$datas->provinsi.'"  name="provinsi_1" id="provinsi_2" readonly></p>
  ';        
$output.='
    <p><input value="'.$datas->kabupaten.'"  name="kabupaten_1" id="kabupaten_2" readonly></p>
  ';        
$output.='
    <p><input value="'.$datas->kecamatan.'"  name="kecamatan_1" id="kecamatan_2" readonly></p>
        </div>

  ';

}




  $output.='

    <p>
    <select name="kelurahan_2" id="kelurahan_2"  >


';
foreach($kode_pos->result() as $datas){  
$output.='          
            <option value="'.$datas->kelurahan.'">'.$datas->kelurahan.'</option>
  ';
}
$output.='  
          </select>
        </p>
 ';     



} else {
  $output="";
$output.='

        <p>
          <label>KODE POS SALAH</label>
        </p>
  ';        
}
  
  
  
  
  echo $output;
	
		
	}


	public function add_dev($no_ktp){


$agency_id = 99;
// $agency_id = $_SESSION['AgencyID'];
//print_r($agency_id);die();
		$query = $this->db->query("SELECT * FROM Employee")->result();
		$query_posisi = $this->db->query("SELECT * FROM AppUserGroup WHERE is_sales=1")->result();
		// print_r($query_posisi);die();
$query_agency = $this->db->query("SELECT AgencyID,AgencyName FROM Agency WHERE AgencyID='$agency_id'")->result();	
$query_sales_center = $this->db->query("SELECT SalesCenterID,SalesCenterName FROM AgencySalesCenter WHERE AgencyID='$agency_id'")->result();	

	$data = array(

		'title' 		=> "SALES FORCE",
		'subtitle' 		=> "ADD SALES FORCE",
		'query' 		=> $query,
		'query_posisi' 	=> $query_posisi,
		'no_ktp'	    => $no_ktp,
		'query_agency'	    => $query_agency,
		'query_sales_center'	    => $query_sales_center,
	);	
	//print_r($data);	
 	$this->load->view('sales_force/sales_force_add',$data);


	}




	public function	add_save_dev(){
//$UserID =$_SESSION['UserID'] ;
$UserID ='12345' ;
//var_dump($_POST);die();  



$employee_id = $this->db->query('select (MAX(EmployeeID)+1) as increment from Employee_')->result();
$increment_employee_id = $employee_id[0]->increment;
//print_r($increment_employee_id);die();
// print_r($_FILES);die();	
/*

Array
(
    [nama_lengkap] => ggggggg
    [nama_panggil] => gg
    [no_ktp] => 324234234
    [no_npwp] => 987798
    [tempat_lahir] => jakarta
    [tanggal_lahir] => 2018-04-11
    [tinggi_badan] => 105
    [berat_badan] => 80
    [jenis_kelamin] => M
    [status] => islam
    [ibu_kandung] => hhhhh
    [email] => ppp_admin@gmail.com
    [no_telpon] => 4545
    [no_hp1] => 454545
    [no_hp2] => 4545
    [alamat_tinggal_1] => hhhhhhhh
    [kode_pos_1] => 17412
    [provinsi_1] => JAWA BARAT
    [kabupaten_1] => BEKASI
    [kecamatan_1] => PONDOK GEDE
    [kelurahan_1] => JATIBENING BARU
    [lama_tinggal_1] => 8
    [status_tinggal] => orang_tua
    [kendaraan] => mobil
    [alamat_tinggal_2] => hhhhhhhh
    [kode_pos_2] => 17412
    [kelurahan_2] => JATIBENING
    [lama_tinggal_2] => 8
    [perusahaan] => Array
        (
            [0] => mmmm
            [1] => dfdf
            [2] => dfdsf
        )

    [posisi] => Array
        (
            [0] => jjj
            [1] => dfdf
            [2] => dsfds
        )

    [tanggal_masuk] => Array
        (
            [0] => 2018-04-11
            [1] => 2018-04-03
            [2] => 2018-03-26
        )

    [tanggal_resign] => Array
        (
            [0] => 2018-04-11
            [1] => 2018-04-10
            [2] => 2018-04-03
        )

    [keterangan] => Array
        (
            [0] => jjjj
            [1] => dsfdsfdsf
            [2] => dfdsfdsf
        )

    [jenjang_pendidikan] => Array
        (
            [0] => frdsf
            [1] => fgfg
            [2] => jjj
        )

    [nama_sekolah] => Array
        (
            [0] => erewr
            [1] => jhjjjjj
            [2] => jjj
        )

    [kota] => Array
        (
            [0] => ewre
            [1] => jjjjj
            [2] => jjj
        )

    [program_studi] => Array
        (
            [0] => wrewr
            [1] => jjj
            [2] => jjj
        )

    [ipk] => Array
        (
            [0] => erewr
            [1] => jjj
            [2] => jj
        )

    [tahun_ijazah] => Array
        (
            [0] => ewrewr
            [1] => jjjj
            [2] => jjj
        )

    [nama_emergency] => llllllllll
    [hubungan_emergency] => kakak
    [no_hp_emergency] => 4543545
    [alamat_emergency] => gfhgfhgfhgfhgfh
)
*/
/*
Array
(
    [photo] => Array
        (
            [name] => pas_foto.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php2DD8.tmp
            [error] => 0
            [size] => 63743
        )

    [scan_ktp] => Array
        (
            [name] => 31577.png
            [type] => image/png
            [tmp_name] => C:\PHP\tmp\php2E37.tmp
            [error] => 0
            [size] => 63982
        )

    [file_komit] => Array
        (
            [name] => flpp2.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php2E67.tmp
            [error] => 0
            [size] => 28753
        )

    [ijazah] => Array
        (
            [name] => Helix-2.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php2E77.tmp
            [error] => 0
            [size] => 134464
        )

)
*/

//upload====================
    // $config['upload_path']          = './uploads/';
    // $config['allowed_types']        = 'pdf|jpg|png';
    // $config['max_size']             = 100000;
    // //$config['file_name']             = $nmfile;
    // //$config['max_width']            = 1024;
    // //$config['max_height']           = 768;
    // $this->load->library('upload', $config);
    // // upload gambar 1
    //     $this->upload->do_upload('photo');
    //     $result1 = $this->upload->data ();
    // $photo = $result1['file_name'];
    //     // upload gambar 2
    //     $this->upload->do_upload('scan_ktp');
    //     $result2 = $this->upload->data();
    // $ktp = $result2['file_name'];
    //     // upload gambar 3
    //     $this->upload->do_upload('file_komit');
    //     $result3 = $this->upload->data();
    // $file_komit = $result3['file_name'];
    //  // upload gambar 4
    //     $this->upload->do_upload('ijazah');
    //     $result4 = $this->upload->data();
    // $ijazah = $result4['file_name'];
    //     // menyimpan hasil upload
    //     $result = array(
    //       'photo'=>$result1,
    //       'ktp'=>$result2,
    //       'do_dont'=>$result3,
    //       'ijazah'=>$result4);
//=========================
// $new_name = time().$_FILES["userfiles"]['name'];
// $config['file_name'] = $new_name;
// UPLOAD PHOTO
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
// $new_name = time().$_FILES["photo"]['name'];
      // $PhotoFileName = "PHOTO_".$increment_employee_id."_".$_FILES["photo"]['name'];
      // $config['file_name'] = $PhotoFileName;
    $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      // if(!$this->upload->do_upload())
      // {
      //   echo $this->upload->display_errors();
      // }
      // else
      // {
        $this->upload->do_upload('photo');
        $data = $this->upload->data();
        $PhotoFileName = $data["file_name"];

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = './uploads/'.$PhotoFileName;
        $config1['create_thumb'] = FALSE;
        $config1['maintain_ratio'] = FALSE;
        $config1['quality'] = '60%';
        $config1['width'] = 200;
        $config1['height'] = 200;


        $config1['new_image'] = './uploads/'.$PhotoFileName;
        // $config['new_image'] = './uploads/'.$data["file_name"];
        $this->load->library('image_lib', $config1);
        $this->image_lib->resize();
        //no unik
        // $PhotoFileName = $data["file_name"];
        // $PhotoFileName = "PHOTO_".$increment_employee_id;
        // }
//??????????????????????????

//       $config2['upload_path'] = './uploads/';
//       $config2['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
// // $new_name = time().$_FILES["photo"]['name'];
//       $KTPFileName = "KTP_".$increment_employee_id."_".$_FILES["scan_ktp"]['name'];
//       $config2['file_name'] = $PhotoFileName;

//       $this->load->library('upload', $config2);
      // if(!$this->upload->do_upload())
      // {
      //   echo $this->upload->display_errors();
      // }
      // else
      // {
        $this->upload->do_upload('scan_ktp');
        $data2 = $this->upload->data();        
        $KTPFileName = $data2["file_name"];

        $this->upload->do_upload('file_komit');
        $data3 = $this->upload->data();        
        $KomitFileName = $data3["file_name"];

        $this->upload->do_upload('ijazah');
        $data4 = $this->upload->data();
        $IjazahFileName = $data4["file_name"];

// UPLOAD SCAN KTP
//       $config2['upload_path'] = './uploads/';
//       $config2['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
//       $KTPFileName = "KTP_".$increment_employee_id."_".$_FILES["scan_ktp"]['name'];
//       $config2['file_name'] = $KTPFileName;
//       $this->load->library('upload', $config2);
//       // if(!$this->upload->do_upload())
//       // {
//       //   echo $this->upload->display_errors();
//       // }
//       // else
//       // {


//         $this->upload->do_upload('scan_ktp');

//         $data2 = $this->upload->data();

//         $config2['image_library'] = 'gd2';
//         $config2['source_image'] = './uploads/'.$data2["file_name"];
//         $config2['create_thumb'] = FALSE;
//         $config2['maintain_ratio'] = FALSE;
//         $config2['quality'] = '60%';
// //        $config2['width'] = 200;
// //        $config2['height'] = 200;

//         // $KTPFileName = "KTP_".$increment_employee_id;

//         $config2['new_image'] = './uploads/'.$KTPFileName;
//         // $config2['new_image'] = './uploads/'.$data2["file_name"];
//         $this->load->library('image_lib', $config2);
//         $this->image_lib->resize();
//         //no unik
//         // $PhotoFileName = $data["file_name"];
//         // }







		$data_employee = array(
//		'id_posisi'			=>$this->input->post('id_posisi'),

//get auto increment
//$employee_id

 'EmployeeID' => $increment_employee_id ,
 //'ParentEmployeeID' => "99" ,
 'EmployeeName' => $this->input->post('nama_lengkap'),
 // 'EmployeeOldCode' => "99" ,
 // 'EmployeeNewCode' => "99" ,
 // 'UserGroupID' => "99" ,
 // 'EmployeeStatus' => "99" ,
 // 'EmployeeGrade' => "99" ,
 // 'EmployeeBirthPlace' => "99" ,
 // 'EmployeeBirthDate' => "99" ,
 // 'MothersMaidenName' => "99" ,
 // 'IdentityType' => "99" ,
 // 'IdentityNumber' => "99" ,
 // 'IdentityFilePath' => "99" ,
 'IdentityFileName' => $KTPFileName ,
 // 'Sex' => "99" ,
 // 'Religion' => "99" ,
 // 'NPWP' => "99" ,
 // 'FixedPhoneNumber' => "99" ,
 // 'PhoneNumber' => "99" ,
 // 'PhoneNumber2' => "99" ,
 // 'EmergencyName' => "99" ,
 // 'EmergencyStatus' => "99" ,
 // 'EmergencyNumber' => "99" ,
 // 'EmergencyAddress' => "99" ,
 // 'Province' => "99" ,
 // 'Kecamatan' => "99" ,
 // 'Kabupaten' => "99" ,
 // 'Kelurahan' => "99" ,
 // 'PostalCode' => "99" ,
 // 'StreetAddress' => "99" ,
 // 'EmailAddress' => "99" ,
 // 'MaritalStatus' => "99" ,
 // 'Height' => "99" ,
 // 'Weight' => "99" ,
 // 'PhotoFilePath' => "99" ,
 'PhotoFileName' => $PhotoFileName ,
 // 'AgencyID' => "99" ,
 // 'SalesCenterID' => "99" ,
 // 'InterviewApprovalID' => "99" ,
 // 'InterviewLevel' => "99" ,
 // 'InterviewStatus' => "99" ,
 // 'HiringApprovalID'=> "99" ,
 'HiringLevel' => "1" , //
 // 'HiringStatus' => "99" ,
 // 'ApprovalID' => "99" ,
 // 'ApprovalLevel' => "99" ,
 // 'ApprovalStatus' => "99" ,
 // 'IsDiscontinued' => "99" ,
 // 'IsDedicated' => "99" ,
 // 'DedicatedRemark' => "99" ,
 // 'ActiveDate' => "99" ,
 // 'EndDate' => "99" ,
 // 'EndReason' => "99" ,
 'CreatedDate' => date("Y-m-d\TH:i:s") ,
  'CreatedBy' => $UserID,

);

$cek1 = $this->db->insert('Employee_',$data_employee);		

$data_employee_detail = array(

 'EmployeeID' => $increment_employee_id ,

     'nama_lengkap'       => $this->input->post('nama_lengkap'),
     'nama_panggil'       => $this->input->post('nama_panggil'),
     'no_ktp'             => $this->input->post('no_ktp'),
     'no_npwp'            => $this->input->post('no_npwp'),
     'tempat_lahir'       => $this->input->post('tempat_lahir'),
     'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
     'tinggi_badan'       => $this->input->post('tinggi_badan'),
     'berat_badan'        => $this->input->post('berat_badan'),
     'jenis_kelamin'      => $this->input->post('jenis_kelamin'),
     'status'             => $this->input->post('status'),
     'ibu_kandung'        => $this->input->post('ibu_kandung'),
     'email'              => $this->input->post('email'),
     'no_telpon'          => $this->input->post('no_telpon'),
     'no_hp1'             => $this->input->post('no_hp1'),
     'no_hp2'             => $this->input->post('no_hp2'),
     'alamat_tinggal_1'   => $this->input->post('alamat_tinggal_1'),
     'kode_pos_1'         => $this->input->post('kode_pos_1'),
     'provinsi_1'         => $this->input->post('provinsi_1'),
     'kabupaten_1'        => $this->input->post('kabupaten_1'),
     'kecamatan_1'        => $this->input->post('kecamatan_1'),
     'kelurahan_1'        => $this->input->post('kelurahan_1'),
     'lama_tinggal_1'     => $this->input->post('lama_tinggal_1'),
     'status_tinggal'     => $this->input->post('status_tinggal'),
     'kendaraan'          => $this->input->post('kendaraan'),
     'alamat_tinggal_2'   => $this->input->post('alamat_tinggal_2'),
     'kode_pos_2'         => $this->input->post('kode_pos_2'),
     'kelurahan_2'        => $this->input->post('kelurahan_2'),
     'lama_tinggal_2'     => $this->input->post('lama_tinggal_2'),
     'nama_emergency'     => $this->input->post('nama_emergency'),
     'hubungan_emergency' => $this->input->post('hubungan_emergency'),
     'no_hp_emergency'    => $this->input->post('no_hp_emergency'),
     'alamat_emergency'   => $this->input->post('alamat_emergency'), 


);
$cek2 = $this->db->insert('Employee_tes',$data_employee_detail);      


//print_r($cek1);

if ($cek1==1 && $cek2==1 ) {


echo "<script>alert('Suksess');</script>";
//dev??
            redirect('sales_force/index_dev', 'refresh');             
} else {
echo "<script>alert('GAGAL');</script>";
//dev??
            redirect('sales_force/index_dev', 'refresh');}



	}



 function multiple_upload(){

  print_r($_FILES);die();
/*

Array
(
    [photo] => Array
        (
            [name] => Hydrangeas.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php8B77.tmp
            [error] => 0
            [size] => 595284
        )

    [scan_ktp] => Array
        (
            [name] => Tulips.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php8DE8.tmp
            [error] => 0
            [size] => 620888
        )

    [file_komit] => Array
        (
            [name] => Lighthouse.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php901B.tmp
            [error] => 0
            [size] => 561276
        )

    [ijazah] => Array
        (
            [name] => Tulips.jpg
            [type] => image/jpeg
            [tmp_name] => C:\PHP\tmp\php923E.tmp
            [error] => 0
            [size] => 620888
        )

)

*/

         $config['upload_path']   = './uploads/'; 
         //$config['allowed_types'] = 'gif|jpg|png'; 
         //$config['max_size']      = 100; 
         //$config['max_width']     = 1024; 
         //$config['max_height']    = 768;  
         $this->load->library('upload', $config);
         // script upload file pertama
         $this->upload->do_upload('photo');
         $file1 = $this->upload->data();
         echo "<pre>";
         print_r($file1);
         echo "</pre>";
         
         // script uplaod file kedua
         $this->upload->do_upload('scan_ktp');
         $file2 = $this->upload->data();
         echo "<pre>";
         print_r($file2);
         echo "</pre>";
    }

	public function add_save_devx(){
		print_r($_POST);die();
		//$this->aksi_upload();
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'pdf|jpg|png';
		$config['max_size']             = 100000;
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
		$ktp = $result2['file_name'];
        // upload gambar 3
        $this->upload->do_upload('do_dont');
        $result3 = $this->upload->data();
		$do_dont = $result3['file_name'];
		 // upload gambar 4
        $this->upload->do_upload('ijazah');
        $result4 = $this->upload->data();
		$ijazah = $result4['file_name'];
        // menyimpan hasil upload
        $result = array('photo'=>$result1,'ktp'=>$result2,'do_dont'=>$result3,'ijazah'=>$result4);
	//$cek =$this->db->insert('Employee',$data);
	//$cek =		$this->sales_force_model->save($data);

 // [AgencyID] => 3
 //    [SalesCenterID] => 11		
		$data = array(
		'id_posisi'			=>$this->input->post('id_posisi'),
        'photo'				=>$file,
        'nama_lengkap'		=>$this->input->post('nama_lengkap'),
		'nama_panggil'		=>$this->input->post('nama_panggil'),
        'no_ktp'			=>$this->input->post('no_ktp'),

        'AgencyID'			=>$this->input->post('AgencyID'),
        'SalesCenterID'		=>$this->input->post('SalesCenterID'),

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
		'ktp'				=>$ktp,
        'do_dont'			=>$do_dont,
		'ijazah'			=>$ijazah,
		'ket'				=>$this->input->post('ket'),
		'tgl'				=>$this->input->post('tgl')
		);	
		
		$this->sales_force_model->save($data);
		$no_ktp = $this->input->post('no_ktp');
		$id_employee =$this->sales_force_model->get_id_by_ktp($no_ktp);
			//print_r($id_employee[0]->id);die;
		$data_save = array(
		'id'				=>$id_employee[0]->id,
     	'ket'				=>$this->input->post('ket'),
		'keterangan'		=>$this->input->post('keterangan'),
		'tgl'				=>$this->input->post('tgl'),
		//'npp'				=>$this->input->post('npp')
		);	
		$cek = $this->db->insert('Employee_history',$data_save);
		//print_r($id_employee);
		if($cek){
		?><script>window.alert('DATA SUKSES DITAMBAHKAN');
		</script>
		<?
			redirect('sales_force', 'refresh');				
		}else{
		$this->alert =$this->alert("<p class='alert alert-danger'>","GAGAL DITAMBAHKAN");
		}		
	}
	

//dev=======
//=======================================
	public function index()
	{

// UserGroupID
$id_agency = $_SESSION['AgencyID'];
$id_user_group = $_SESSION['UserGroupID'];
//dummy		

// $id_agency = 1;

//jika admin login
if ($id_user_group==1) {
	
	$where="";
} else {
	$where = "WHERE a.AgencyID = '$id_agency'";
}



//print_r($id_agency);die();

	$query = $this->db->query("
	SELECT 
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
	left JOIN Agency d ON a.AgencyID = d.AgencyID
	$where 
	ORDER BY tgl DESC
		
		")->result();
		
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee WHERE notif='1'")->result();
//var_dump($query_notif[0]->total);die();
	$data = array(

			'title'			 => "SALES FORCE",
			'subtitle'		 => "LIST SALES FORCE",
			'query'			 => $query,
			'query_notif' 	 =>$query_notif,

		);	
		$this->load->view('sales_force/list',$data);
		//$this->load->view('blank');
	}	
//////////////////////////////////////////////////////////////////////////////////////////////untuk cek ktp	
	public function ajax_cek_ktp($no_ktp)
    {
		  //$data = $this->person->get_by_id($id);
          $data = $this->db->query("SELECT * FROM Employee WHERE no_ktp='$no_ktp'")->row();
		  //   $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function add($no_ktp){

// $agency_id = 99;
$agency_id = $_SESSION['AgencyID'];
//print_r($agency_id);die();
		$query = $this->db->query("SELECT * FROM Employee")->result();
		$query_posisi = $this->db->query("SELECT * FROM AppUserGroup WHERE is_sales=1")->result();
		// print_r($query_posisi);die();
$query_agency = $this->db->query("SELECT AgencyID,AgencyName FROM Agency WHERE AgencyID='$agency_id'")->result();	
$query_sales_center = $this->db->query("SELECT SalesCenterID,SalesCenterName FROM AgencySalesCenter WHERE AgencyID='$agency_id'")->result();	

	$data = array(

		'title' 		=> "SALES FORCE",
		'subtitle' 		=> "ADD SALES FORCE",
		'query' 		=> $query,
		'query_posisi' 	=> $query_posisi,
		'no_ktp'	    => $no_ktp,
		'query_agency'	    => $query_agency,
		'query_sales_center'	    => $query_sales_center,
	);	
	//print_r($data);	
 	$this->load->view('sales_force/add',$data);			
	}	
/////////////////////////////////////////////////////////////////////*********************////////////////////////////////////////
	public function edit($no_ktp){

	
	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
	$id = $query_ktp[0]->id;
	//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id")->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
		
		//print_r($query);die();	
	$data = array(

		'title' 			=> "SALES FORCE",
		'subtitle' 			=> "ADD SALES UPDATE",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
	);	
 	$this->load->view('sales_force/edit',$data);			
	}
///////////////////////////////////////////////////////////////******************************////////////////////////////////////////////
	public function view($no_ktp){

	$query_ktp = $this->sales_force_model->get_by_ktp($no_ktp);	
		// print_r($query_ktp);die();	
	$id = $query_ktp[0]->id;
	
		//$query = $this->db->query("SELECT * FROM Employee WHERE IdentityNumber ='$no_ktp' ")->result();		
	$query_employee	 = $this->db->query("SELECT * FROM Employee")->result();
	$query_posisi	 = $this->db->query("SELECT * FROM Posisi")->result();
	$query_agency	 = $this->db->query("SELECT * FROM Agency")->result();
	$query_history 	 = $this->db->query("SELECT * FROM Employee_history where id=$id" )->result();
	$query_notif =$this->db->query("SELECT COUNT(*) AS total FROM Employee where id=$id")->result();
	$data = array(

		'title' 			=> "SALES FORCE",
		'subtitle' 			=> "ADD SALES UPDATE",
		'query_ktp' 		=> $query_ktp,
		'query_employee'	=> $query_employee,
		'query_posisi' 		=> $query_posisi,
		'query_history' 	=> $query_history,
		'query_agency'		=> $query_agency,
		'query_notif' 		=> $query_notif,
			
	);	
 	$this->load->view('sales_force/view',$data);			
	}
/////////////////////////////////////////////////////////*************************************/////////////////////////////////////////	
public function hapus($no_ktp){
    $no_ktp = $this->uri->segment(3); //mengambil primary key melalui link yg ketiga
$cek = $this->sales_force_model->hapusdata($no_ktp);	
	if($cek){
		?><script>window.alert('DATA SUKSES DIHAPUS');
		</script>
		<?
			redirect('sales_force', 'refresh');	

    }
}
	public function upload(){
		$this->load->view('v_upload', array('error' => ' ' ));
	}
 
	/*public function do_upload() {

		 
        // setting konfigurasi upload
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 300;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('gambar');
        $result1 = $this->upload->data();
        // upload gambar 2
        $this->upload->do_upload('gambar2');
        $result2 = $this->upload->data();
        // upload gambar 1
        $this->upload->do_upload('gambar3');
        $result3 = $this->upload->data();
        // menyimpan hasil upload
        $result = array('gambar1'=>$result1,'gambar2'=>$result2,'gambar3'=>$result3);
	
	}
	
	public function tes_upload(){
		
		
		$this->load->view('v_upload');
	}*/
	
	public function save_add(){
		// print_r($_POST);die();
		//$this->aksi_upload();
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'pdf|jpg|png';
		$config['max_size']             = 100000;
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
		$ktp = $result2['file_name'];
        // upload gambar 3
        $this->upload->do_upload('do_dont');
        $result3 = $this->upload->data();
		$do_dont = $result3['file_name'];
		 // upload gambar 4
        $this->upload->do_upload('ijazah');
        $result4 = $this->upload->data();
		$ijazah = $result4['file_name'];
        // menyimpan hasil upload
        $result = array('photo'=>$result1,'ktp'=>$result2,'do_dont'=>$result3,'ijazah'=>$result4);
	//$cek =$this->db->insert('Employee',$data);
	//$cek =		$this->sales_force_model->save($data);

 // [AgencyID] => 3
 //    [SalesCenterID] => 11		
		$data = array(
		'id_posisi'			=>$this->input->post('id_posisi'),
        'photo'				=>$file,
        'nama_lengkap'		=>$this->input->post('nama_lengkap'),
		'nama_panggil'		=>$this->input->post('nama_panggil'),
        'no_ktp'			=>$this->input->post('no_ktp'),

        'AgencyID'			=>$this->input->post('AgencyID'),
        'SalesCenterID'		=>$this->input->post('SalesCenterID'),

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
		'ktp'				=>$ktp,
        'do_dont'			=>$do_dont,
		'ijazah'			=>$ijazah,
		'ket'				=>$this->input->post('ket'),
		'tgl'				=>$this->input->post('tgl')
		);	
		
		$this->sales_force_model->save($data);
		$no_ktp = $this->input->post('no_ktp');
		$id_employee =$this->sales_force_model->get_id_by_ktp($no_ktp);
			//print_r($id_employee[0]->id);die;
		$data_save = array(
		'id'				=>$id_employee[0]->id,
     	'ket'				=>$this->input->post('ket'),
		'keterangan'		=>$this->input->post('keterangan'),
		'tgl'				=>$this->input->post('tgl'),
		//'npp'				=>$this->input->post('npp')
		);	
		$cek = $this->db->insert('Employee_history',$data_save);
		//print_r($id_employee);
		if($cek){
		?><script>window.alert('DATA SUKSES DITAMBAHKAN');
		</script>
		<?
			redirect('sales_force', 'refresh');				
		}else{
		$this->alert =$this->alert("<p class='alert alert-danger'>","GAGAL DITAMBAHKAN");
		}		
	}
	
	
	public function save_edit(){
		
			
//$no_ktp = $this->input->post('no_ktp'); 			
//$id = $this->input->post('id');	$config['upload_path']          = './gambar/';
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

public function incrementalHash($len = 3){
//  $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  $now1 = explode(' ', microtime());
$now= $now1[1] ;
//print_r($now);die();  
    $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $base = strlen($charset);
  $result = '';

  while ($now >= $base){
    $i = $now % $base;
    $result = $charset[$i] . $result;
    $now /= $base;
  }
  return substr($result, -3);
}		
	
public function sales_code(){
//jika proses hiring ok jalan jan 	
$hash =$this->incrementalHash();	
//$hash ='CCN';
//$hash ='S19';

//$cek = $this->db->query("SELECT EmployeeNewCode FROM Employee WHERE EmployeeNewCode='$hash' ")->num_rows();	
$cek = $this->db->query("SELECT EmployeeNewCode FROM Employee  ")->result();	
/*
$arrlength=count($cek);
//print_r($cek);die();;	
//for ($x = 1; $x <= $cek; $x++) {
for ($x = 1; $x <= $arrlength; $x++) {
//  echo "The number is: $x <br>";
//$hash =$this->incrementalHash();	
//$hash ='CCN';
 $kode_ada []= $cek[$x]->EmployeeNewCode;
$kode_ada = $kode_ada[];
//$kode_ada = array();
print_r($kode_ada);

 
}
*/


foreach($cek as $kode){
	
	$kode_ada []= $kode->EmployeeNewCode;
	//echo $kode_ada;
	//echo"<br>";
}

//print_r($kode_ada);die();

if (in_array($hash, $kode_ada)){
$new_code = $hash =$this->incrementalHash();		  
  //echo "Match found";
}else{
$new_code =$hash;	  
  //echo "Match not found";
  }

//di return
print_r($new_code);


/*
if($cek>=1){
	
$hash =$this->incrementalHash();
	
}else{
$new_code=$hash;	
}



print_r($new_code);die();
*/

//$this->load->model('model_app');
//$hash = $this->model_app->incrementalHash();
	
	
	
}	
	
	
public function get_new_sales_code(){	

//print_r("NEWWWW");die();
$sales_new_code =$this->sales_force_model->getNewSalesCode();

print_r($sales_new_code);
	
	
}	

//==============================
public function add_new($ktp){


$data = array(
	'xxx' => 'xxxx', 
	'ktp' => $ktp, 

);

$this->load->view('sales_force/sales_force_add',$data);

}

	
	}
