<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
		/*
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Maaf, Anda tidak diperbolehkan masuk tanpa login !');
            redirect('auth');
        };	
		*/
		
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
    }

//=============
//======

    public function index()
    {
print_r('indexxxxxxxxxxxxxxx');
    }



//======================================    
//==============================
	public function new_sales_code()
	{
		//employee pending new sales code
		$query_employee = $this->db->query("

SELECT 
a.AgencyName,
sc.SalesCenterName,
aug.UserGroupName,
e.* 
FROM Employee e
LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID
LEFT JOIN AppUserGroup aug ON e.UserGroupID=aug.UserGroupID

WHERE 
 e.EmployeeNewCode='' AND e.IsDiscontinued=0 AND e.ActiveDate IS NULL 
AND e.ApprovalStatus=0 AND e.HiringLevel=3 AND e.HiringStatus=1

			")->result();
        $data = array(
		'tittle' => 'Employee',
		'header' => 'Pending New Sales Code',
        'query_employee' => $query_employee
        );


          $this->load->view('employee/pending_sales_code_list', $data);
	}	
	
	public function update_new_sales_code($id){

// print_r("update new sales code");
// print_r("<br>");
// print_r("id :  ".$id);
		$query_employee = $this->db->query("

SELECT 
a.AgencyName,
sc.SalesCenterName,
aug.UserGroupName,
e.* 
FROM Employee e
LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID
LEFT JOIN AppUserGroup aug ON e.UserGroupID=aug.UserGroupID

WHERE 
 e.EmployeeNewCode='' AND e.IsDiscontinued=0 AND e.ActiveDate IS NULL 
AND e.ApprovalStatus=0 AND e.HiringLevel=3 AND e.HiringStatus=1
AND e.EmployeeID='$id'

			")->result();


		$query_employee_merging = $this->db->query("

SELECT 
TOP 10 *
FROM Employee 
			")->result();


        $data = array(
		'tittle' => 'Employee',
		'header' => 'Pending New Sales Code',
        'query_employee' => $query_employee,
        'query_employee_merging' => $query_employee_merging
        );


          $this->load->view('employee/pending_sales_code_update', $data);
	


	}
	
	public function save_new_sales_code(){

// print_r("SAVE");die();	

$data = array(
	'EmployeeNewCode' =>$_POST['EmployeeNewCode'] , 
	'ApprovalStatus' =>$_POST['ApprovalStatus'] , 
	'ActiveDate' =>$_POST['ActiveDate'] , 
);
$key = array('EmployeeID' =>$_POST['EmployeeID'] , );

$cek = $this->db->update('Employee',$data,$key);

if ($cek==1) {
	redirect('employee/new_sales_code','refresh');
	# code...
} else {
echo "
<script>
alert('GAGAL');
<script>
";	
	# code...
}

// print_r($data);
// print_r("<br>==========<br>");
// print_r($key);
	}
	
//==============TUTUINET
	public function terminate(){
		
//		print_r($this->session->userdata('UserGroupID'));die();
		
		$query_agency = $this->db->query("SELECT * FROM Agency")->result();
        $data = array(
		'tittle' => 'Terminate',
		'header' => 'TUTINET',
        'query_agency' => $query_agency
        );

		
//        $this->template->load('template','performancedetail_promo_list', $data);
//          $this->load->view('template/header', $data);
          $this->load->view('employee/terminate_list', $data);
 //         $this->load->view('template/footer', $data);		
		
	}
	
	//seles center combobox	
	public function getSalesCenter(){
	$post_data = $this->input->post();
	$agency_id = $post_data['AgencyID'];
//$data = $this->db->query("SELECT SalesCenterID,SalesCenterName FROM SalesCenter ")->result_array();
	$data = $this->db->query("SELECT * FROM AgencySalesCenter WHERE AgencyID='$agency_id'")->result();
 // $data = $this->model_sales_center->getCity($post_data);

 /*
		$postData = $this->input->post();
$this->load->Model('Agencysalescenter_model');
		$data = $this->Agencysalescenter_model->getCity($postData);

*/		

	echo json_encode($data);
	// echo json_encode($area_id);
	}
	
	public function getTerminate(){
		
		
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
		
		$AgencyID = $this->input->post('AgencyID');
		$SalesCenterID = $this->input->post('SalesCenterID');
		if($AgencyID ==0){
		$AgencyID="";		
		}else{
		$AgencyID="AND	e.AgencyID =".$AgencyID."";	
			
		}		
/*
*/

		if($SalesCenterID ==0){
		$SalesCenterID='';		
		}else{
		$SalesCenterID="AND	e.SalesCenterID =".$SalesCenterID."";	
			
		}		

/*
	SELECT TOP 10
	e.*,
		a.AgencyName,
		sc.SalesCenterName
	
	FROM Employee e
	LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
	LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID
	WHERE 
e.EndDate between '2018/01/01' AND '2018/02/01'
	
*/		
//AND e.SalesCenterID='$SalesCenterID'		
		$output_tabel='';
		//$output_tabel.='TABELLLLL';
		
	$employees = $this->db->query("
	SELECT 
	e.EndDate,
	e.EmployeeName,
	e.EmployeeNewCode,
	CAST(EndReason as varchar(100)) EndReason,
	a.AgencyName,
		sc.SalesCenterName
	
	FROM Employee e
	LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
	LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID

	WHERE
	e.IsDiscontinued=1
AND	e.EndDate between '$tgl_awal' AND '$tgl_akhir'
".$AgencyID."
".$SalesCenterID."
		ORDER BY e.EndDate ASC
	")->result();		
	
//print_r($employees);
	
	$output_tabel.='

        <table class="table table-bordered table-striped" id="mytable">
			<thead>
            <tr>
				<th width="80px">No</th>
				<th>EndDate</th>
				<th>EmployeeName</th>
				<th>EmployeeNewCode</th>
				<th>AgencyName</th>
            	<th>SalesCenterName</th>
            	<th>EndReason</th>
            </tr>
            </thead>
	    <tbody>';
//---------------
         $start = 1;
            foreach ($employees as $e)
           {
$output_tabel.='
            <tr>
		    <td>'.$start++.'</td>
		    <td>'.date("Y-m-d",strtotime($e->EndDate)).'</td>
		    <td>'.$e->EmployeeName.'</td>
		    <td>'.$e->EmployeeNewCode.'</td>
	        <td>'.$e->AgencyName.'</td>
	        <td>'.$e->SalesCenterName.'</td>
	        <td>'.$e->EndReason.'</td>
	        </tr>
';            

}
	
//---------------	
		
$output_tabel.='
        </tbody>
		
	
		
        </table>	
	';
	
$output_tabel.='
        <script type="text/javascript">
            $(document).ready(function () {
				
                $("#mytable").dataTable();
            });
        </script>
';		

//$output_tabel.='<br/> AgencyID : '.$AgencyID;
//$output_tabel.='</br> SalesCenterID : '.$SalesCenterID;
		
		
		
		echo $output_tabel;
		
		
	}

    public function excel_terminate($tgl_awal,$tgl_akhir,$AgencyID,$SalesCenterID)
    //public function excel()
    {
		
/*
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
		$type = $this->input->post('type');
*/		

        $tgl_awal= date("Y-m-d",strtotime($tgl_awal));
        $tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));
		//$AgencyID = $this->input->post('AgencyID');
		//$SalesCenterID = $this->input->post('SalesCenterID');
if($AgencyID ==0){
$AgencyID="";		
}else{
$AgencyID="AND	e.AgencyID =".$AgencyID."";	
	
}		
/*
*/

if($SalesCenterID ==0){
$SalesCenterID='';		
}else{
$SalesCenterID="AND	e.SalesCenterID =".$SalesCenterID."";	
	
}			
        $this->load->helper('exportexcel');
        $namaFile = "Terminate_".$tgl_awal."_s_d_".$tgl_akhir.".xls";
        $judul = "Report PromoCode";
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
//	xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
	xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeNewCode");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyName");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterName");
	xlsWriteLabel($tablehead, $kolomhead++, "EndReason");
	
/*
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter1");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter2");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter3");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter4");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter5");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter6");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter7");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter8");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter9");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter10");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter11");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter12");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter13");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter14");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter15");
*/	
	
/*
$dt_result = $this->db->query("
	SELECT  pd.* FROM Performancedetail pd
	LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
	LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID
	WHERE pd.AsOfDate between '$tgl_awal' and '$tgl_akhir' ".$type." 
	AND LEN(pd.Parameter2) >= 21 ORDER BY pd.AsOfDate
	")->result();	
*/

$dt_result = $this->db->query("

	SELECT 
	e.EndDate,
	e.EmployeeName,
	e.EmployeeNewCode,
	CAST(EndReason as varchar(100)) EndReason,
		a.AgencyName,
		sc.SalesCenterName
	
	FROM Employee e
	LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
	LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID
	WHERE
	
	e.IsDiscontinued=1
AND	e.EndDate between '$tgl_awal' AND '$tgl_akhir'
".$AgencyID."
".$SalesCenterID."
		ORDER BY e.EndDate ASC

	")->result();	


	foreach ($dt_result  as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
//	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeNewCode);
		xlsWriteLabel($tablebody, $kolombody++, $data->AgencyName);
		xlsWriteLabel($tablebody, $kolombody++, $data->SalesCenterName);
		xlsWriteLabel($tablebody, $kolombody++, $data->EndReason);

/*
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter6);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter7);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter9);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter10);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter11);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter12);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter13);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter14);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter15);
*/		

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

//GENERATE 2
	public function getTerminate2(){
		
		
		$code = $this->input->post('code');

		$output_tabel='';
		//$output_tabel.='TABELLLLL';
		
	$employees = $this->db->query("
	SELECT 
		e.EndDate,
	e.EmployeeName,
	e.EmployeeNewCode,
	CAST(EndReason as varchar(100)) EndReason,

	
		a.AgencyName,
		sc.SalesCenterName
	
	FROM Employee e
	LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
	LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID

	WHERE
	e.IsDiscontinued=1
AND		e.EmployeeNewCode LIKE '%$code%' OR e.EmployeeName LIKE '%$code%' 
		ORDER BY e.EndDate ASC
	")->result();		
			
	$output_tabel.='

        <table class="table table-bordered table-striped" id="mytable">
			<thead>
            <tr>
				<th width="80px">No</th>
				<th>EndDate</th>
				<th>EmployeeName</th>
				<th>EmployeeNewCode</th>
				<th>AgencyName</th>
            	<th>SalesCenterName</th>
            	<th>EndReason</th>
            </tr>
            </thead>
	    <tbody>';
//---------------
         $start = 1;
            foreach ($employees as $e)
           {
$output_tabel.='
            <tr>
		    <td>'.$start++.'</td>
		    <td>'.date("Y-m-d",strtotime($e->EndDate)).'</td>
		    <td>'.$e->EmployeeName.'</td>
		    <td>'.$e->EmployeeNewCode.'</td>
	        <td>'.$e->AgencyName.'</td>
	        <td>'.$e->SalesCenterName.'</td>
	        <td>'.$e->EndReason.'</td>
	        </tr>
';            

}
	
//---------------	
		
$output_tabel.='
        </tbody>
		
	
		
        </table>	
	';
	
$output_tabel.='
        <script type="text/javascript">
            $(document).ready(function () {
				
                $("#mytable").dataTable();
            });
        </script>
';		

//$output_tabel.='<br/> AgencyID : '.$AgencyID;
//$output_tabel.='</br> SalesCenterID : '.$SalesCenterID;
		
		
		
		echo $output_tabel;
		
		
	}

	
    public function excel_terminate2($code)
    //public function excel()
    {
		
/*
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
		$type = $this->input->post('type');
*/		


        $this->load->helper('exportexcel');
        $namaFile = "Terminate_".$code.".xls";
        $judul = "Report PromoCode";
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
//	xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
	xlsWriteLabel($tablehead, $kolomhead++, "EndDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeName");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeNewCode");
	xlsWriteLabel($tablehead, $kolomhead++, "AgencyName");
	xlsWriteLabel($tablehead, $kolomhead++, "SalesCenterName");
	xlsWriteLabel($tablehead, $kolomhead++, "EndReason");
	
/*
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter1");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter2");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter3");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter4");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter5");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter6");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter7");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter8");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter9");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter10");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter11");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter12");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter13");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter14");
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter15");
*/	
	
/*
$dt_result = $this->db->query("
	SELECT  pd.* FROM Performancedetail pd
	LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
	LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID
	WHERE pd.AsOfDate between '$tgl_awal' and '$tgl_akhir' ".$type." 
	AND LEN(pd.Parameter2) >= 21 ORDER BY pd.AsOfDate
	")->result();	
*/

$dt_result = $this->db->query("

	SELECT 
	e.EndDate,
	e.EmployeeName,
	e.EmployeeNewCode,
	CAST(EndReason as varchar(100)) EndReason,

	a.AgencyName,
		sc.SalesCenterName
	
	FROM Employee e
	LEFT JOIN Agency a ON e.AgencyID=a.AgencyID
	LEFT JOIN AgencySalesCenter sc ON e.SalesCenterID=sc.SalesCenterID

	WHERE
	e.IsDiscontinued=1
AND	e.EmployeeNewCode LIKE '%$code%' OR e.EmployeeName LIKE '%$code%' 
		ORDER BY e.EndDate ASC

	")->result();	


	foreach ($dt_result  as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
//	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EndDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EmployeeNewCode);
		xlsWriteLabel($tablebody, $kolombody++, $data->AgencyName);
		xlsWriteLabel($tablebody, $kolombody++, $data->SalesCenterName);
		xlsWriteLabel($tablebody, $kolombody++, $data->EndReason);

/*
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter6);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter7);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter9);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter10);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter11);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter12);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter13);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter14);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Parameter15);
*/		

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }	

// bypass
	public function HiringLevel1(){
// exec bypass
$bypass = $this->db->query("exec P_Bypass_Hiring_Wilayah");		
 print_r($bypass);die();
}
 
// =================================
//  Approval Hiring Pusat
// Hiring Level 2
// bypass sgv wilayah
	public function HiringLevel2(){
// exec bypass
$bypass = $this->db->query("exec P_Bypass_Hiring_Wilayah");		
//  print_r($bypass);die();

$employee = $this->db->query("
SELECT * FROM Employee
WHERE 
InterviewLevel=2
AND InterviewStatus=1
AND HiringApprovalID=-999
AND HiringLevel=2 ---<===
AND HiringStatus=0
AND IsDiscontinued=0

	")->result();
// print_r($employee);die();

        $data = array(
        'header' => 'TUTINET',
        'tittle' => 'Hiring',
           'employee_data' => $employee
        );

          $this->load->view('/employee/employee_hiringlevel2_list', $data);

	} 

	

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 05:43:19 */
/* http://harviacode.com */