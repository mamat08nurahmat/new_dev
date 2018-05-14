<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

//=============
    	public function hiring($no_ktp){


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
 	// $this->load->view('sales_force/sales_force_add',$data);

        // $this->template->load('template','sales_force_add', $data);

        $this->load->view('employee_hiring', $data);    
	}



	public function	add_save_dev(){
// print_r($_POST);die();  
//$UserID =$_SESSION['UserID'] ;
$UserID ='12345' ;



$employee_id = $this->db->query('select (MAX(EmployeeID)+1) as increment from Employee')->result();
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
// 'EmployeeName' => "XYZ EMPLOYEE",
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
 'HiringApprovalID'=> "0" ,
 'HiringLevel' => "1" , //
 'HiringStatus' => "2" ,
 'ApprovalID' => "0" ,
 'ApprovalLevel' => "2" ,
 'ApprovalStatus' => "0" ,
 'IsDiscontinued' => "0" ,
 // 'IsDedicated' => "99" ,
 // 'DedicatedRemark' => "99" ,
 // 'ActiveDate' => "99" ,
 // 'EndDate' => "99" ,
 // 'EndReason' => "99" ,
 'CreatedDate' => date("Y-m-d\TH:i:s") ,
  'CreatedBy' => $UserID,

);

$cek1 = $this->db->insert('employee',$data_employee);		

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

//insert hiring_history

$data_history = array(
'EmployeeID' => $increment_employee_id,
'HiringLevel' => "1",
'HiringStatus' => "2",
// 'Keterangan' => ,
// 'HiringApprovalID' => ,
'UpdateAt' =>  date("Y-m-d\TH:i:s") ,
  );

$cek3 = $this->db->insert('hiring_history',$data_history);      





//print_r($cek1);

if ($cek1==1 && $cek2==1 && $cek3==1) {


echo "<script>alert('Suksess');</script>";
//dev??
            redirect('employee/', 'refresh');             
} else {
echo "<script>alert('GAGAL');</script>";
//dev??
            redirect('employee/', 'refresh');}



	}


public function tes_dummy(){
$data_employee = array(
//      'id_posisi'         =>$this->input->post('id_posisi'),

//get auto increment
//$employee_id

               // 'EmployeeID' => $increment_employee_id ,
 'EmployeeID' => 1234 ,
 //'ParentEmployeeID' => "99" ,
//             'EmployeeName' => $this->input->post('nama_lengkap'),
 'EmployeeName' => "TES EMPLOYEE",
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
             // 'IdentityFileName' => $KTPFileName ,
  'IdentityFileName' => "KTPFileName" ,
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
             // 'PhotoFileName' => $PhotoFileName ,
 'PhotoFileName' => "PhotoFileName" ,
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
          // 'CreatedBy' => $UserID,
  'CreatedBy' => 999,

);

$cek1 = $this->db->insert('employee',$data_employee);       
print_r($cek1);    
}



//-----------

    public function blank()
    {
        $employee = $this->Employee_model->get_all();

        $data = array(
            'employee_data' => $employee
        );

        $this->load->view('blank', $data);
    }

//=============

//ApprovalLevel='1' ==>RSM
    public function approval1()
    {
        //All Employee Where ApprovalLevel='1'
        $employee1 = $this->Employee_model->get_all_approval1();

        $data = array(
            'employee_data' => $employee1
        );

        // $this->load->view('approval1', $data);
    $this->template->load('template','employee_list_approval1', $data);

    }

//ApprovalLevel='2' ==>SGV WILAYAH
    public function approval2()
    {
        //All Employee Where ApprovalLevel='2'
        $employee1 = $this->Employee_model->get_all_approval2();

        $data = array(
            'employee_data' => $employee1
        );

        // $this->load->view('approval1', $data);
    $this->template->load('template','employee_list_approval2', $data);

    }

//ApprovalLevel='3' ==>SGV PUSAT
    public function approval3()
    {
        //All Employee Where ApprovalLevel='3'
        $employee1 = $this->Employee_model->get_all_approval3();

        $data = array(
            'employee_data' => $employee1
        );

        // $this->load->view('approval1', $data);
    $this->template->load('template','employee_list_approval3', $data);

    }

    public function read_approval1($id) 
    {

      //nex dev 
      //by hiring_story employee
        $row = $this->Employee_model->get_by_id($id);
        $row1 = $this->Employee_model->get_by_id_hiring_history($id);

// tdClass Object
// (
//     [EmployeeID] => 14788
//     [HiringLevel] => 1
//     [HiringStatus] => 2
//     [Keterangan] => 
//     [HiringApprovalID] => 
//     [UpdateAt] => 2018-05-11 03:11:42.000
// )


// print_r($row2); die();    
/*
foreach ($row1 as $row2) {
            # code...
if ($row2->HiringLevel==1) {
       $hiring_level="RSM";
   }elseif($row2->HiringLevel==2) {
       $hiring_level="SGV WILAYAH";
   }else{
       $hiring_level="SGV PUSAT";
   }


if ($row2->HiringStatus==1) {
       $hiring_status="APPROVE";
   }elseif($row2->HiringStatus==2) {
       $hiring_status="WAITING APPROVE";
   }elseif($row2->HiringStatus==3) {
       $hiring_status="HOLD";
   }elseif($row2->HiringStatus==4) {
       $hiring_status="CANCEL";
   }else{
       $hiring_status="REJECT";
   }
//status history
$status=$hiring_status." ".$hiring_level;
// print_r($status."<br>");

        }        
*/        


// print_r('------');die();

if ($row->EmployeeStatus='PKWT') {
$EmployeeStatus='TRAINEE';
} else {
$EmployeeStatus='REGULER';
}
// -----
if ($row->EmployeeGrade='EmployeeGrade.T1') {
$EmployeeGrade='TRAINEE';
}elseif ($row->EmployeeGrade='EmployeeGrade.G1') {
$EmployeeGrade='GRADE 1';
}elseif ($row->EmployeeGrade='EmployeeGrade.G2') {
$EmployeeGrade='GRADE 2';
}elseif ($row->EmployeeGrade='EmployeeGrade.G3') {
$EmployeeGrade='GRADE 3';
}else {
$EmployeeGrade='JUNIOR';
}


$session_user_login_id = 9999;

        if ($row) {
            $data = array(
    'HiringApprovalID' => $session_user_login_id,
    'EmployeeID' => $row->EmployeeID,

    'ParentEmployeeID' => $row->ParentEmployeeID,
    'EmployeeName' => $row->EmployeeName,
    'EmployeeOldCode' => $row->EmployeeOldCode,
    'EmployeeNewCode' => $row->EmployeeNewCode,
    'UserGroupID' => $row->UserGroupID,



    'EmployeeStatus' => $EmployeeStatus,



    'EmployeeGrade' => $EmployeeGrade,

    'EmployeeBirthPlace' => $row->EmployeeBirthPlace,
    'EmployeeBirthDate' => $row->EmployeeBirthDate,
    'MothersMaidenName' => $row->MothersMaidenName,
    'IdentityType' => $row->IdentityType,
    'IdentityNumber' => $row->IdentityNumber,
    'IdentityFilePath' => $row->IdentityFilePath,
    'IdentityFileName' => $row->IdentityFileName,
    'Sex' => $row->Sex,
    'Religion' => $row->Religion,
    'NPWP' => $row->NPWP,
    'FixedPhoneNumber' => $row->FixedPhoneNumber,
    'PhoneNumber' => $row->PhoneNumber,
    'PhoneNumber2' => $row->PhoneNumber2,
    'EmergencyName' => $row->EmergencyName,
    'EmergencyStatus' => $row->EmergencyStatus,
    'EmergencyNumber' => $row->EmergencyNumber,
    'EmergencyAddress' => $row->EmergencyAddress,
    'Province' => $row->Province,
    'StreetAddress' => $row->StreetAddress,
    'PostalCode' => $row->PostalCode,
    'EmailAddress' => $row->EmailAddress,
    'MaritalStatus' => $row->MaritalStatus,
    'Height' => $row->Height,
    'Weight' => $row->Weight,
    'PhotoFilePath' => $row->PhotoFilePath,
    'PhotoFileName' => $row->PhotoFileName,
    'AgencyID' => $row->AgencyID,
    'SalesCenterID' => $row->SalesCenterID,
    'InterviewApprovalID' => $row->InterviewApprovalID,
    'InterviewLevel' => $row->InterviewLevel,
    'InterviewStatus' => $row->InterviewStatus,
    'HiringApprovalID' => $row->HiringApprovalID,
    'HiringLevel' => $row->HiringLevel,
    'HiringStatus' => $row->HiringStatus,
    'ApprovalID' => $row->ApprovalID,
    'ApprovalLevel' => $row->ApprovalLevel,
    'ApprovalStatus' => $row->ApprovalStatus,
    'IsDiscontinued' => $row->IsDiscontinued,
    'IsDedicated' => $row->IsDedicated,
    'DedicatedRemark' => $row->DedicatedRemark,
    'ActiveDate' => $row->ActiveDate,
    'EndDate' => $row->EndDate,
    'EndReason' => $row->EndReason,
    'CreatedDate' => $row->CreatedDate,
    'CreatedBy' => $row->CreatedBy,
      );
            $this->template->load('template','employee_read_approval1', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function hiring_approval(){

// print_r($_POST);die();

//jika HiringStatus='1' (Approve) ==> HiringLevel='2' (HiringLevel+1)       
if($_POST['HiringStatus']==1){
$hiring_level=$_POST['HiringLevel']+1;
    }else{
$hiring_level=$_POST['HiringLevel'];        
    }

// print_r("HiringLevel : ".$hiring_level." EmployeeID :".$_POST['EmployeeID']);

$data = array(
    'HiringStatus' => $this->input->post('HiringStatus', TRUE), 
    'HiringLevel' => $hiring_level, 

);


//Update HiringStatus dan HiringLevel di Employee
            $cek1 = $this->Employee_model->update($this->input->post('EmployeeID', TRUE), $data);

//dummy id from session     //next dev       
$session_user_login_id='77777';

$data_hiring_history = array(
'EmployeeID' => $this->input->post('EmployeeID', TRUE),
    'HiringStatus' => $this->input->post('HiringStatus', TRUE), 
    'HiringLevel' => $hiring_level, 
'Keterangan' => $this->input->post('Keterangan', TRUE),
'HiringApprovalID' => $session_user_login_id,
'UpdateAt' =>  date("Y-m-d\TH:i:s") ,
  );

//input hiring_history
    $cek2 =    $this->Employee_model->insert_hiring_history($data_hiring_history);
print_r("UPDATE Employee : ".$cek1."INSERT HIRING HISTORY : ".$cek2);
            // $this->session->set_flashdata('message', 'Update Record Success');
}
//======

    public function index()
    {
        $employee = $this->Employee_model->get_all();

        $data = array(
            'employee_data' => $employee
        );

        $this->template->load('template','employee_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Employee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'EmployeeID' => $row->EmployeeID,
		'ParentEmployeeID' => $row->ParentEmployeeID,
		'EmployeeName' => $row->EmployeeName,
		'EmployeeOldCode' => $row->EmployeeOldCode,
		'EmployeeNewCode' => $row->EmployeeNewCode,
		'UserGroupID' => $row->UserGroupID,
		'EmployeeStatus' => $row->EmployeeStatus,
		'EmployeeGrade' => $row->EmployeeGrade,
		'EmployeeBirthPlace' => $row->EmployeeBirthPlace,
		'EmployeeBirthDate' => $row->EmployeeBirthDate,
		'MothersMaidenName' => $row->MothersMaidenName,
		'IdentityType' => $row->IdentityType,
		'IdentityNumber' => $row->IdentityNumber,
		'IdentityFilePath' => $row->IdentityFilePath,
		'IdentityFileName' => $row->IdentityFileName,
		'Sex' => $row->Sex,
		'Religion' => $row->Religion,
		'NPWP' => $row->NPWP,
		'FixedPhoneNumber' => $row->FixedPhoneNumber,
		'PhoneNumber' => $row->PhoneNumber,
		'PhoneNumber2' => $row->PhoneNumber2,
		'EmergencyName' => $row->EmergencyName,
		'EmergencyStatus' => $row->EmergencyStatus,
		'EmergencyNumber' => $row->EmergencyNumber,
		'EmergencyAddress' => $row->EmergencyAddress,
		'Province' => $row->Province,
		'StreetAddress' => $row->StreetAddress,
		'PostalCode' => $row->PostalCode,
		'EmailAddress' => $row->EmailAddress,
		'MaritalStatus' => $row->MaritalStatus,
		'Height' => $row->Height,
		'Weight' => $row->Weight,
		'PhotoFilePath' => $row->PhotoFilePath,
		'PhotoFileName' => $row->PhotoFileName,
		'AgencyID' => $row->AgencyID,
		'SalesCenterID' => $row->SalesCenterID,
		'InterviewApprovalID' => $row->InterviewApprovalID,
		'InterviewLevel' => $row->InterviewLevel,
		'InterviewStatus' => $row->InterviewStatus,
		'HiringApprovalID' => $row->HiringApprovalID,
		'HiringLevel' => $row->HiringLevel,
		'HiringStatus' => $row->HiringStatus,
		'ApprovalID' => $row->ApprovalID,
		'ApprovalLevel' => $row->ApprovalLevel,
		'ApprovalStatus' => $row->ApprovalStatus,
		'IsDiscontinued' => $row->IsDiscontinued,
		'IsDedicated' => $row->IsDedicated,
		'DedicatedRemark' => $row->DedicatedRemark,
		'ActiveDate' => $row->ActiveDate,
		'EndDate' => $row->EndDate,
		'EndReason' => $row->EndReason,
		'CreatedDate' => $row->CreatedDate,
		'CreatedBy' => $row->CreatedBy,
	    );
            $this->template->load('template','employee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create($IdentityNumber) 
    {


    	$Increment= $this->db->query("SELECT (MAX(EmployeeID)+1) as EmployeeID FROM Employee")->result();
    	$EmployeeID = $Increment[0]->EmployeeID;
// print_r($EmployeeID);die();

        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'EmployeeID' => $EmployeeID,

	    'ParentEmployeeID' => set_value('ParentEmployeeID'),
	    'EmployeeName' => set_value('EmployeeName'),
	    'EmployeeOldCode' => set_value('EmployeeOldCode'),
	    'EmployeeNewCode' => set_value('EmployeeNewCode'),
	    'UserGroupID' => set_value('UserGroupID'),
	    'EmployeeStatus' => set_value('EmployeeStatus'),
	    'EmployeeGrade' => set_value('EmployeeGrade'),
	    'EmployeeBirthPlace' => set_value('EmployeeBirthPlace'),
	    'EmployeeBirthDate' => set_value('EmployeeBirthDate'),
	    'MothersMaidenName' => set_value('MothersMaidenName'),
	    'IdentityType' => set_value('IdentityType'),
	    'IdentityNumber' => $IdentityNumber,
	    'IdentityFilePath' => set_value('IdentityFilePath'),
	    'IdentityFileName' => set_value('IdentityFileName'),
	    'Sex' => set_value('Sex'),
	    'Religion' => set_value('Religion'),
	    'NPWP' => set_value('NPWP'),
	    'FixedPhoneNumber' => set_value('FixedPhoneNumber'),
	    'PhoneNumber' => set_value('PhoneNumber'),
	    'PhoneNumber2' => set_value('PhoneNumber2'),
	    'EmergencyName' => set_value('EmergencyName'),
	    'EmergencyStatus' => set_value('EmergencyStatus'),
	    'EmergencyNumber' => set_value('EmergencyNumber'),
	    'EmergencyAddress' => set_value('EmergencyAddress'),
	    'Province' => set_value('Province'),
	    'StreetAddress' => set_value('StreetAddress'),
	    'PostalCode' => set_value('PostalCode'),
	    'EmailAddress' => set_value('EmailAddress'),
	    'MaritalStatus' => set_value('MaritalStatus'),
	    'Height' => set_value('Height'),
	    'Weight' => set_value('Weight'),
	    'PhotoFilePath' => set_value('PhotoFilePath'),
	    'PhotoFileName' => set_value('PhotoFileName'),
	    'AgencyID' => set_value('AgencyID'),
	    'SalesCenterID' => set_value('SalesCenterID'),
	    'InterviewApprovalID' => set_value('InterviewApprovalID'),
	    'InterviewLevel' => set_value('InterviewLevel'),
	    'InterviewStatus' => set_value('InterviewStatus'),
	    'HiringApprovalID' => set_value('HiringApprovalID'),
	    'HiringLevel' => set_value('HiringLevel'),
	    'HiringStatus' => set_value('HiringStatus'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'ApprovalLevel' => set_value('ApprovalLevel'),
	    'ApprovalStatus' => set_value('ApprovalStatus'),
	    'IsDiscontinued' => set_value('IsDiscontinued'),
	    'IsDedicated' => set_value('IsDedicated'),
	    'DedicatedRemark' => set_value('DedicatedRemark'),
	    'ActiveDate' => set_value('ActiveDate'),
	    'EndDate' => set_value('EndDate'),
	    'EndReason' => set_value('EndReason'),
	    'CreatedDate' => set_value('CreatedDate'),
	    'CreatedBy' => set_value('CreatedBy'),

	);
        $this->template->load('template','employee_reg', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeName' => $this->input->post('EmployeeName',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeBirthPlace' => $this->input->post('EmployeeBirthPlace',TRUE),
		'EmployeeBirthDate' => $this->input->post('EmployeeBirthDate',TRUE),
		'MothersMaidenName' => $this->input->post('MothersMaidenName',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityNumber' => $this->input->post('IdentityNumber',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'Religion' => $this->input->post('Religion',TRUE),
		'NPWP' => $this->input->post('NPWP',TRUE),
		'FixedPhoneNumber' => $this->input->post('FixedPhoneNumber',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'PhoneNumber2' => $this->input->post('PhoneNumber2',TRUE),
		'EmergencyName' => $this->input->post('EmergencyName',TRUE),
		'EmergencyStatus' => $this->input->post('EmergencyStatus',TRUE),
		'EmergencyNumber' => $this->input->post('EmergencyNumber',TRUE),
		'EmergencyAddress' => $this->input->post('EmergencyAddress',TRUE),
		'Province' => $this->input->post('Province',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'MaritalStatus' => $this->input->post('MaritalStatus',TRUE),
		'Height' => $this->input->post('Height',TRUE),
		'Weight' => $this->input->post('Weight',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'EndReason' => $this->input->post('EndReason',TRUE),
		'CreatedDate' => $this->input->post('CreatedDate',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
	    );

            $this->Employee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
        }
    }
    
//next dev
    //update_hiring by vendor

    public function update_hiring($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
    'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
    'ParentEmployeeID' => set_value('ParentEmployeeID', $row->ParentEmployeeID),
    'EmployeeName' => set_value('EmployeeName', $row->EmployeeName),
    'EmployeeOldCode' => set_value('EmployeeOldCode', $row->EmployeeOldCode),
    'EmployeeNewCode' => set_value('EmployeeNewCode', $row->EmployeeNewCode),
    'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
    'EmployeeStatus' => set_value('EmployeeStatus', $row->EmployeeStatus),
    'EmployeeGrade' => set_value('EmployeeGrade', $row->EmployeeGrade),
    'EmployeeBirthPlace' => set_value('EmployeeBirthPlace', $row->EmployeeBirthPlace),
    'EmployeeBirthDate' => set_value('EmployeeBirthDate', $row->EmployeeBirthDate),
    'MothersMaidenName' => set_value('MothersMaidenName', $row->MothersMaidenName),
    'IdentityType' => set_value('IdentityType', $row->IdentityType),
    'IdentityNumber' => set_value('IdentityNumber', $row->IdentityNumber),
    'IdentityFilePath' => set_value('IdentityFilePath', $row->IdentityFilePath),
    'IdentityFileName' => set_value('IdentityFileName', $row->IdentityFileName),
    'Sex' => set_value('Sex', $row->Sex),
    'Religion' => set_value('Religion', $row->Religion),
    'NPWP' => set_value('NPWP', $row->NPWP),
    'FixedPhoneNumber' => set_value('FixedPhoneNumber', $row->FixedPhoneNumber),
    'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
    'PhoneNumber2' => set_value('PhoneNumber2', $row->PhoneNumber2),
    'EmergencyName' => set_value('EmergencyName', $row->EmergencyName),
    'EmergencyStatus' => set_value('EmergencyStatus', $row->EmergencyStatus),
    'EmergencyNumber' => set_value('EmergencyNumber', $row->EmergencyNumber),
    'EmergencyAddress' => set_value('EmergencyAddress', $row->EmergencyAddress),
    'Province' => set_value('Province', $row->Province),
    'StreetAddress' => set_value('StreetAddress', $row->StreetAddress),
    'PostalCode' => set_value('PostalCode', $row->PostalCode),
    'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
    'MaritalStatus' => set_value('MaritalStatus', $row->MaritalStatus),
    'Height' => set_value('Height', $row->Height),
    'Weight' => set_value('Weight', $row->Weight),
    'PhotoFilePath' => set_value('PhotoFilePath', $row->PhotoFilePath),
    'PhotoFileName' => set_value('PhotoFileName', $row->PhotoFileName),
    'AgencyID' => set_value('AgencyID', $row->AgencyID),
    'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
    'InterviewApprovalID' => set_value('InterviewApprovalID', $row->InterviewApprovalID),
    'InterviewLevel' => set_value('InterviewLevel', $row->InterviewLevel),
    'InterviewStatus' => set_value('InterviewStatus', $row->InterviewStatus),
    'HiringApprovalID' => set_value('HiringApprovalID', $row->HiringApprovalID),
    'HiringLevel' => set_value('HiringLevel', $row->HiringLevel),
    'HiringStatus' => set_value('HiringStatus', $row->HiringStatus),
    'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
    'ApprovalLevel' => set_value('ApprovalLevel', $row->ApprovalLevel),
    'ApprovalStatus' => set_value('ApprovalStatus', $row->ApprovalStatus),
    'IsDiscontinued' => set_value('IsDiscontinued', $row->IsDiscontinued),
    'IsDedicated' => set_value('IsDedicated', $row->IsDedicated),
    'DedicatedRemark' => set_value('DedicatedRemark', $row->DedicatedRemark),
    'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
    'EndDate' => set_value('EndDate', $row->EndDate),
    'EndReason' => set_value('EndReason', $row->EndReason),
    'CreatedDate' => set_value('CreatedDate', $row->CreatedDate),
    'CreatedBy' => set_value('CreatedBy', $row->CreatedBy),
      );
            $this->template->load('template','employee_form_update_vendor', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }


//update_hiring_action
    public function update_hiring_action() 
    {

        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
    'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
    'EmployeeName' => $this->input->post('EmployeeName',TRUE),
    'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
    'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
    'UserGroupID' => $this->input->post('UserGroupID',TRUE),
    'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
    'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
    'EmployeeBirthPlace' => $this->input->post('EmployeeBirthPlace',TRUE),
    'EmployeeBirthDate' => $this->input->post('EmployeeBirthDate',TRUE),
    'MothersMaidenName' => $this->input->post('MothersMaidenName',TRUE),
    'IdentityType' => $this->input->post('IdentityType',TRUE),
    'IdentityNumber' => $this->input->post('IdentityNumber',TRUE),
    'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
    'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
    'Sex' => $this->input->post('Sex',TRUE),
    'Religion' => $this->input->post('Religion',TRUE),
    'NPWP' => $this->input->post('NPWP',TRUE),
    'FixedPhoneNumber' => $this->input->post('FixedPhoneNumber',TRUE),
    'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
    'PhoneNumber2' => $this->input->post('PhoneNumber2',TRUE),
    'EmergencyName' => $this->input->post('EmergencyName',TRUE),
    'EmergencyStatus' => $this->input->post('EmergencyStatus',TRUE),
    'EmergencyNumber' => $this->input->post('EmergencyNumber',TRUE),
    'EmergencyAddress' => $this->input->post('EmergencyAddress',TRUE),
    'Province' => $this->input->post('Province',TRUE),
    'StreetAddress' => $this->input->post('StreetAddress',TRUE),
    'PostalCode' => $this->input->post('PostalCode',TRUE),
    'EmailAddress' => $this->input->post('EmailAddress',TRUE),
    'MaritalStatus' => $this->input->post('MaritalStatus',TRUE),
    'Height' => $this->input->post('Height',TRUE),
    'Weight' => $this->input->post('Weight',TRUE),
    'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
    'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
    'AgencyID' => $this->input->post('AgencyID',TRUE),
    'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
    'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
    'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
    'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
    'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
    'HiringLevel' => $this->input->post('HiringLevel',TRUE),
    'HiringStatus' => $this->input->post('HiringStatus',TRUE),
    'ApprovalID' => $this->input->post('ApprovalID',TRUE),
    'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
    'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
    'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
    'IsDedicated' => $this->input->post('IsDedicated',TRUE),
    'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
    'ActiveDate' => $this->input->post('ActiveDate',TRUE),
    'EndDate' => $this->input->post('EndDate',TRUE),
    'EndReason' => $this->input->post('EndReason',TRUE),
    'CreatedDate' => $this->input->post('CreatedDate',TRUE),
    'CreatedBy' => $this->input->post('CreatedBy',TRUE),
      );


//update Employee
            $this->Employee_model->update($this->input->post('EmployeeID', TRUE), $data);

//insert hiring_history

$data_history = array(
'EmployeeID' => $increment_employee_id,
'HiringLevel' => $this->input->post('HiringLevel',TRUE),
'HiringStatus' => "2", //jadi waiting approve
// 'Keterangan' => ,
// 'HiringApprovalID' => ,
'UpdateAt' =>  date("Y-m-d\TH:i:s") ,
  );


            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }

//======================================================
    public function update($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'EmployeeID' => set_value('EmployeeID', $row->EmployeeID),
		'ParentEmployeeID' => set_value('ParentEmployeeID', $row->ParentEmployeeID),
		'EmployeeName' => set_value('EmployeeName', $row->EmployeeName),
		'EmployeeOldCode' => set_value('EmployeeOldCode', $row->EmployeeOldCode),
		'EmployeeNewCode' => set_value('EmployeeNewCode', $row->EmployeeNewCode),
		'UserGroupID' => set_value('UserGroupID', $row->UserGroupID),
		'EmployeeStatus' => set_value('EmployeeStatus', $row->EmployeeStatus),
		'EmployeeGrade' => set_value('EmployeeGrade', $row->EmployeeGrade),
		'EmployeeBirthPlace' => set_value('EmployeeBirthPlace', $row->EmployeeBirthPlace),
		'EmployeeBirthDate' => set_value('EmployeeBirthDate', $row->EmployeeBirthDate),
		'MothersMaidenName' => set_value('MothersMaidenName', $row->MothersMaidenName),
		'IdentityType' => set_value('IdentityType', $row->IdentityType),
		'IdentityNumber' => set_value('IdentityNumber', $row->IdentityNumber),
		'IdentityFilePath' => set_value('IdentityFilePath', $row->IdentityFilePath),
		'IdentityFileName' => set_value('IdentityFileName', $row->IdentityFileName),
		'Sex' => set_value('Sex', $row->Sex),
		'Religion' => set_value('Religion', $row->Religion),
		'NPWP' => set_value('NPWP', $row->NPWP),
		'FixedPhoneNumber' => set_value('FixedPhoneNumber', $row->FixedPhoneNumber),
		'PhoneNumber' => set_value('PhoneNumber', $row->PhoneNumber),
		'PhoneNumber2' => set_value('PhoneNumber2', $row->PhoneNumber2),
		'EmergencyName' => set_value('EmergencyName', $row->EmergencyName),
		'EmergencyStatus' => set_value('EmergencyStatus', $row->EmergencyStatus),
		'EmergencyNumber' => set_value('EmergencyNumber', $row->EmergencyNumber),
		'EmergencyAddress' => set_value('EmergencyAddress', $row->EmergencyAddress),
		'Province' => set_value('Province', $row->Province),
		'StreetAddress' => set_value('StreetAddress', $row->StreetAddress),
		'PostalCode' => set_value('PostalCode', $row->PostalCode),
		'EmailAddress' => set_value('EmailAddress', $row->EmailAddress),
		'MaritalStatus' => set_value('MaritalStatus', $row->MaritalStatus),
		'Height' => set_value('Height', $row->Height),
		'Weight' => set_value('Weight', $row->Weight),
		'PhotoFilePath' => set_value('PhotoFilePath', $row->PhotoFilePath),
		'PhotoFileName' => set_value('PhotoFileName', $row->PhotoFileName),
		'AgencyID' => set_value('AgencyID', $row->AgencyID),
		'SalesCenterID' => set_value('SalesCenterID', $row->SalesCenterID),
		'InterviewApprovalID' => set_value('InterviewApprovalID', $row->InterviewApprovalID),
		'InterviewLevel' => set_value('InterviewLevel', $row->InterviewLevel),
		'InterviewStatus' => set_value('InterviewStatus', $row->InterviewStatus),
		'HiringApprovalID' => set_value('HiringApprovalID', $row->HiringApprovalID),
		'HiringLevel' => set_value('HiringLevel', $row->HiringLevel),
		'HiringStatus' => set_value('HiringStatus', $row->HiringStatus),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'ApprovalLevel' => set_value('ApprovalLevel', $row->ApprovalLevel),
		'ApprovalStatus' => set_value('ApprovalStatus', $row->ApprovalStatus),
		'IsDiscontinued' => set_value('IsDiscontinued', $row->IsDiscontinued),
		'IsDedicated' => set_value('IsDedicated', $row->IsDedicated),
		'DedicatedRemark' => set_value('DedicatedRemark', $row->DedicatedRemark),
		'ActiveDate' => set_value('ActiveDate', $row->ActiveDate),
		'EndDate' => set_value('EndDate', $row->EndDate),
		'EndReason' => set_value('EndReason', $row->EndReason),
		'CreatedDate' => set_value('CreatedDate', $row->CreatedDate),
		'CreatedBy' => set_value('CreatedBy', $row->CreatedBy),
	    );
            $this->template->load('template','employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('EmployeeID', TRUE));
        } else {
            $data = array(
		'ParentEmployeeID' => $this->input->post('ParentEmployeeID',TRUE),
		'EmployeeName' => $this->input->post('EmployeeName',TRUE),
		'EmployeeOldCode' => $this->input->post('EmployeeOldCode',TRUE),
		'EmployeeNewCode' => $this->input->post('EmployeeNewCode',TRUE),
		'UserGroupID' => $this->input->post('UserGroupID',TRUE),
		'EmployeeStatus' => $this->input->post('EmployeeStatus',TRUE),
		'EmployeeGrade' => $this->input->post('EmployeeGrade',TRUE),
		'EmployeeBirthPlace' => $this->input->post('EmployeeBirthPlace',TRUE),
		'EmployeeBirthDate' => $this->input->post('EmployeeBirthDate',TRUE),
		'MothersMaidenName' => $this->input->post('MothersMaidenName',TRUE),
		'IdentityType' => $this->input->post('IdentityType',TRUE),
		'IdentityNumber' => $this->input->post('IdentityNumber',TRUE),
		'IdentityFilePath' => $this->input->post('IdentityFilePath',TRUE),
		'IdentityFileName' => $this->input->post('IdentityFileName',TRUE),
		'Sex' => $this->input->post('Sex',TRUE),
		'Religion' => $this->input->post('Religion',TRUE),
		'NPWP' => $this->input->post('NPWP',TRUE),
		'FixedPhoneNumber' => $this->input->post('FixedPhoneNumber',TRUE),
		'PhoneNumber' => $this->input->post('PhoneNumber',TRUE),
		'PhoneNumber2' => $this->input->post('PhoneNumber2',TRUE),
		'EmergencyName' => $this->input->post('EmergencyName',TRUE),
		'EmergencyStatus' => $this->input->post('EmergencyStatus',TRUE),
		'EmergencyNumber' => $this->input->post('EmergencyNumber',TRUE),
		'EmergencyAddress' => $this->input->post('EmergencyAddress',TRUE),
		'Province' => $this->input->post('Province',TRUE),
		'StreetAddress' => $this->input->post('StreetAddress',TRUE),
		'PostalCode' => $this->input->post('PostalCode',TRUE),
		'EmailAddress' => $this->input->post('EmailAddress',TRUE),
		'MaritalStatus' => $this->input->post('MaritalStatus',TRUE),
		'Height' => $this->input->post('Height',TRUE),
		'Weight' => $this->input->post('Weight',TRUE),
		'PhotoFilePath' => $this->input->post('PhotoFilePath',TRUE),
		'PhotoFileName' => $this->input->post('PhotoFileName',TRUE),
		'AgencyID' => $this->input->post('AgencyID',TRUE),
		'SalesCenterID' => $this->input->post('SalesCenterID',TRUE),
		'InterviewApprovalID' => $this->input->post('InterviewApprovalID',TRUE),
		'InterviewLevel' => $this->input->post('InterviewLevel',TRUE),
		'InterviewStatus' => $this->input->post('InterviewStatus',TRUE),
		'HiringApprovalID' => $this->input->post('HiringApprovalID',TRUE),
		'HiringLevel' => $this->input->post('HiringLevel',TRUE),
		'HiringStatus' => $this->input->post('HiringStatus',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'ApprovalLevel' => $this->input->post('ApprovalLevel',TRUE),
		'ApprovalStatus' => $this->input->post('ApprovalStatus',TRUE),
		'IsDiscontinued' => $this->input->post('IsDiscontinued',TRUE),
		'IsDedicated' => $this->input->post('IsDedicated',TRUE),
		'DedicatedRemark' => $this->input->post('DedicatedRemark',TRUE),
		'ActiveDate' => $this->input->post('ActiveDate',TRUE),
		'EndDate' => $this->input->post('EndDate',TRUE),
		'EndReason' => $this->input->post('EndReason',TRUE),
		'CreatedDate' => $this->input->post('CreatedDate',TRUE),
		'CreatedBy' => $this->input->post('CreatedBy',TRUE),
	    );

            $this->Employee_model->update($this->input->post('EmployeeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $this->Employee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ParentEmployeeID', 'parentemployeeid', 'trim|required');
	$this->form_validation->set_rules('EmployeeName', 'employeename', 'trim|required');
	$this->form_validation->set_rules('EmployeeOldCode', 'employeeoldcode', 'trim|required');
	$this->form_validation->set_rules('EmployeeNewCode', 'employeenewcode', 'trim|required');
	$this->form_validation->set_rules('UserGroupID', 'usergroupid', 'trim|required');
	$this->form_validation->set_rules('EmployeeStatus', 'employeestatus', 'trim|required');
	$this->form_validation->set_rules('EmployeeGrade', 'employeegrade', 'trim|required');
	$this->form_validation->set_rules('EmployeeBirthPlace', 'employeebirthplace', 'trim|required');
	$this->form_validation->set_rules('EmployeeBirthDate', 'employeebirthdate', 'trim|required');
	$this->form_validation->set_rules('MothersMaidenName', 'mothersmaidenname', 'trim|required');
	$this->form_validation->set_rules('IdentityType', 'identitytype', 'trim|required');
	$this->form_validation->set_rules('IdentityNumber', 'identitynumber', 'trim|required');
	$this->form_validation->set_rules('IdentityFilePath', 'identityfilepath', 'trim|required');
	$this->form_validation->set_rules('IdentityFileName', 'identityfilename', 'trim|required');
	$this->form_validation->set_rules('Sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('Religion', 'religion', 'trim|required');
	$this->form_validation->set_rules('NPWP', 'npwp', 'trim|required');
	$this->form_validation->set_rules('FixedPhoneNumber', 'fixedphonenumber', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber', 'phonenumber', 'trim|required');
	$this->form_validation->set_rules('PhoneNumber2', 'phonenumber2', 'trim|required');
	$this->form_validation->set_rules('EmergencyName', 'emergencyname', 'trim|required');
	$this->form_validation->set_rules('EmergencyStatus', 'emergencystatus', 'trim|required');
	$this->form_validation->set_rules('EmergencyNumber', 'emergencynumber', 'trim|required');
	$this->form_validation->set_rules('EmergencyAddress', 'emergencyaddress', 'trim|required');
	$this->form_validation->set_rules('Province', 'province', 'trim|required');
	$this->form_validation->set_rules('StreetAddress', 'streetaddress', 'trim|required');
	$this->form_validation->set_rules('PostalCode', 'postalcode', 'trim|required');
	$this->form_validation->set_rules('EmailAddress', 'emailaddress', 'trim|required');
	$this->form_validation->set_rules('MaritalStatus', 'maritalstatus', 'trim|required');
	$this->form_validation->set_rules('Height', 'height', 'trim|required');
	$this->form_validation->set_rules('Weight', 'weight', 'trim|required');
	$this->form_validation->set_rules('PhotoFilePath', 'photofilepath', 'trim|required');
	$this->form_validation->set_rules('PhotoFileName', 'photofilename', 'trim|required');
	$this->form_validation->set_rules('AgencyID', 'agencyid', 'trim|required');
	$this->form_validation->set_rules('SalesCenterID', 'salescenterid', 'trim|required');
	$this->form_validation->set_rules('InterviewApprovalID', 'interviewapprovalid', 'trim|required');
	$this->form_validation->set_rules('InterviewLevel', 'interviewlevel', 'trim|required');
	$this->form_validation->set_rules('InterviewStatus', 'interviewstatus', 'trim|required');
	$this->form_validation->set_rules('HiringApprovalID', 'hiringapprovalid', 'trim|required');
	$this->form_validation->set_rules('HiringLevel', 'hiringlevel', 'trim|required');
	$this->form_validation->set_rules('HiringStatus', 'hiringstatus', 'trim|required');
	$this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('ApprovalLevel', 'approvallevel', 'trim|required');
	$this->form_validation->set_rules('ApprovalStatus', 'approvalstatus', 'trim|required');
	$this->form_validation->set_rules('IsDiscontinued', 'isdiscontinued', 'trim|required');
	$this->form_validation->set_rules('IsDedicated', 'isdedicated', 'trim|required');
	$this->form_validation->set_rules('DedicatedRemark', 'dedicatedremark', 'trim|required');
	$this->form_validation->set_rules('ActiveDate', 'activedate', 'trim|required');
	$this->form_validation->set_rules('EndDate', 'enddate', 'trim|required');
	$this->form_validation->set_rules('EndReason', 'endreason', 'trim|required');
	$this->form_validation->set_rules('CreatedDate', 'createddate', 'trim|required');
	$this->form_validation->set_rules('CreatedBy', 'createdby', 'trim|required');

	$this->form_validation->set_rules('EmployeeID', 'EmployeeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "employee.xls";
        $judul = "employee";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentEmployeeID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeOldCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeNewCode");
	xlsWriteLabel($tablehead, $kolomhead++, "UserGroupID");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeGrade");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeBirthPlace");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeBirthDate");
	xlsWriteLabel($tablehead, $kolomhead++, "MothersMaidenName");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityType");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "IdentityFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "Religion");
	xlsWriteLabel($tablehead, $kolomhead++, "NPWP");
	xlsWriteLabel($tablehead, $kolomhead++, "FixedPhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "PhoneNumber2");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyNumber");
	xlsWriteLabel($tablehead, $kolomhead++, "EmergencyAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "Province");
	xlsWriteLabel($tablehead, $kolomhead++, "StreetAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "PostalCode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "MaritalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "Height");
	xlsWriteLabel($tablehead, $kolomhead++, "Weight");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "PhotoFileName");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyID");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterID");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "InterviewStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "HiringStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalLevel");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDiscontinued");
	xlsWriteLabel($tablehead, $kolomhead++, "IsDedicated");
	xlsWriteLabel($tablehead, $kolomhead++, "DedicatedRemark");
	xlsWriteLabel($tablehead, $kolomhead++, "ActiveDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EndReason");
	xlsWriteLabel($tablehead, $kolomhead++, "CreatedDate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreatedBy");

	foreach ($this->Employee_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ParentEmployeeID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeOldCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeNewCode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UserGroupID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeGrade);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeBirthPlace);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeBirthDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MothersMaidenName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdentityFileName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Religion);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NPWP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FixedPhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhoneNumber2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyNumber);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmergencyAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Province);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StreetAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PostalCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmailAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MaritalStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Height);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Weight);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PhotoFileName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->AgencyID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->SalesCenterID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->InterviewStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->HiringStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalLevel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDiscontinued);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IsDedicated);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DedicatedRemark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ActiveDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndReason);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CreatedDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->CreatedBy);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=employee.doc");

        $data = array(
            'employee_data' => $this->Employee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee_doc',$data);
    }

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 05:43:19 */
/* http://harviacode.com */