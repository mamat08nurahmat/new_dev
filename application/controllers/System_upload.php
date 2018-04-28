<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class System_upload extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('System_upload_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $system_upload = $this->System_upload_model->get_all();

        $data = array(
            'system_upload_data' => $system_upload
        );

        $this->template->load('template','system_upload_list', $data);
    }

    public function read($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'BatchID' => $row->BatchID,
		'UploadDate' => $row->UploadDate,
		'UploadBy' => $row->UploadBy,
		'UploadRemark' => $row->UploadRemark,
		'ApplicationSource' => $row->ApplicationSource,
		'ProcessMonth' => $row->ProcessMonth,
		'ProcessYear' => $row->ProcessYear,
		'FilePath' => $row->FilePath,
		'VirtualPath' => $row->VirtualPath,
		'FileSize' => $row->FileSize,
		'ReportPath' => $row->ReportPath,
		'RowDataCount' => $row->RowDataCount,
		'RowDataSucceed' => $row->RowDataSucceed,
		'RowDataFailed' => $row->RowDataFailed,
		'ApprovalID' => $row->ApprovalID,
		'StatusUpload' => $row->StatusUpload,
	    );
            $this->template->load('template','system_upload_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }

    public function create() 
    {
//batch increment
$BatchID = 456;

        $data = array(
            'button' => 'Create',
            'action' => site_url('system_upload/create_action'),
	    'ID' => set_value('ID'),
	    'BatchID' => $BatchID,
	    'UploadDate' => date('Y-m-d'),
	    'UploadBy' => set_value('UploadBy'),
	    'UploadRemark' => set_value('UploadRemark'),
	    'ApplicationSource' => set_value('ApplicationSource'),
	    'ProcessMonth' => set_value('ProcessMonth'),
	    'ProcessYear' => set_value('ProcessYear'),
	    'FilePath' => set_value('FilePath'),
	    'VirtualPath' => set_value('VirtualPath'),
	    'FileSize' => set_value('FileSize'),
	    'ReportPath' => set_value('ReportPath'),
	    'RowDataCount' => set_value('RowDataCount'),
	    'RowDataSucceed' => set_value('RowDataSucceed'),
	    'RowDataFailed' => set_value('RowDataFailed'),
	    'ApprovalID' => set_value('ApprovalID'),
	    'StatusUpload' => set_value('StatusUpload'),
	);
        $this->template->load('template','system_upload_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
/*

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		'UploadBy' => $this->input->post('UploadBy',TRUE),
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $this->input->post('FilePath',TRUE),
		'VirtualPath' => $this->input->post('VirtualPath',TRUE),
		'FileSize' => $this->input->post('FileSize',TRUE),
		'ReportPath' => $this->input->post('ReportPath',TRUE),
		'RowDataCount' => $this->input->post('RowDataCount',TRUE),
		'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => $this->input->post('StatusUpload',TRUE),
	    );

            $this->System_upload_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('system_upload'));
        }
*/    	

//tes dummy 
// [FilePath] => Array
//         (
//             [name] => 123.csv
//             [type] => application/vnd.ms-excel
//             [tmp_name] => C:\PHP\tmp\php71F7.tmp
//             [error] => 0
//             [size] => 128
//         )

// print_r($_POST);
// print_r($_FILES);
// die();

// Array
// (
//     [file_name] => 4562.csv
//     [file_type] => application/vnd.ms-excel
//     [file_path] => C:/inetpub/wwwroot/crud_generator/uploads/
//     [full_path] => C:/inetpub/wwwroot/crud_generator/uploads/4562.csv
//     [raw_name] => 4562
//     [orig_name] => 456.csv
//     [client_name] => cardlink.csv
//     [file_ext] => .csv
//     [file_size] => 42.45
//     [is_image] => 
//     [image_width] => 
//     [image_height] => 
//     [image_type] => 
//     [image_size_str] => 
// )


////do_upload return data file upload
$data_upload = $this->_do_upload($this->input->post('BatchID',TRUE));



// print_r($data_upload['file_name']);die();
            $data = array(
		'BatchID' =>  $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		// 'UploadBy' => $this->input->post('UploadBy',TRUE),
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $data_upload['file_name'],
		'VirtualPath' => $data_upload['client_name'],
		'FileSize' => $data_upload['file_size'],
		// 'ReportPath' => $this->input->post('ReportPath',TRUE),
		// 'RowDataCount' => $this->input->post('RowDataCount',TRUE),
//update data 		
		// 'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		// 'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		// 'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => 'terupload',
	    );

            $this->System_upload_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('system_upload'));



    }


	private function _do_upload($batch)
	{
		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'csv';
/*
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
*/		
        $config['file_name']            = $batch; //ambil batchID Upload

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('FilePath')) //upload and validate
        {
            $data['inputerror'][] = 'FilePath';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data();
	}

    
    public function update($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('system_upload/update_action'),
		'ID' => set_value('ID', $row->ID),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'UploadDate' => set_value('UploadDate', $row->UploadDate),
		'UploadBy' => set_value('UploadBy', $row->UploadBy),
		'UploadRemark' => set_value('UploadRemark', $row->UploadRemark),
		'ApplicationSource' => set_value('ApplicationSource', $row->ApplicationSource),
		'ProcessMonth' => set_value('ProcessMonth', $row->ProcessMonth),
		'ProcessYear' => set_value('ProcessYear', $row->ProcessYear),
		'FilePath' => set_value('FilePath', $row->FilePath),
		'VirtualPath' => set_value('VirtualPath', $row->VirtualPath),
		'FileSize' => set_value('FileSize', $row->FileSize),
		'ReportPath' => set_value('ReportPath', $row->ReportPath),
		'RowDataCount' => set_value('RowDataCount', $row->RowDataCount),
		'RowDataSucceed' => set_value('RowDataSucceed', $row->RowDataSucceed),
		'RowDataFailed' => set_value('RowDataFailed', $row->RowDataFailed),
		'ApprovalID' => set_value('ApprovalID', $row->ApprovalID),
		'StatusUpload' => set_value('StatusUpload', $row->StatusUpload),
	    );
            $this->template->load('template','system_upload_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'UploadDate' => $this->input->post('UploadDate',TRUE),
		'UploadBy' => $this->input->post('UploadBy',TRUE),
		'UploadRemark' => $this->input->post('UploadRemark',TRUE),
		'ApplicationSource' => $this->input->post('ApplicationSource',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'FilePath' => $this->input->post('FilePath',TRUE),
		'VirtualPath' => $this->input->post('VirtualPath',TRUE),
		'FileSize' => $this->input->post('FileSize',TRUE),
		'ReportPath' => $this->input->post('ReportPath',TRUE),
		'RowDataCount' => $this->input->post('RowDataCount',TRUE),
		'RowDataSucceed' => $this->input->post('RowDataSucceed',TRUE),
		'RowDataFailed' => $this->input->post('RowDataFailed',TRUE),
		'ApprovalID' => $this->input->post('ApprovalID',TRUE),
		'StatusUpload' => $this->input->post('StatusUpload',TRUE),
	    );

            $this->System_upload_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('system_upload'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->System_upload_model->get_by_id($id);

        if ($row) {
            $this->System_upload_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('system_upload'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('system_upload'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	// $this->form_validation->set_rules('UploadDate', 'uploaddate', 'trim|required');
	// $this->form_validation->set_rules('UploadBy', 'uploadby', 'trim|required');
	$this->form_validation->set_rules('UploadRemark', 'uploadremark', 'trim|required');
	$this->form_validation->set_rules('ApplicationSource', 'applicationsource', 'trim|required');
	$this->form_validation->set_rules('ProcessMonth', 'processmonth', 'trim|required');
	$this->form_validation->set_rules('ProcessYear', 'processyear', 'trim|required');
	// $this->form_validation->set_rules('FilePath', 'filepath', 'trim|required');
	// $this->form_validation->set_rules('VirtualPath', 'virtualpath', 'trim|required');
	// $this->form_validation->set_rules('FileSize', 'filesize', 'trim|required');
	// $this->form_validation->set_rules('ReportPath', 'reportpath', 'trim|required');
	// $this->form_validation->set_rules('RowDataCount', 'rowdatacount', 'trim|required');
	// $this->form_validation->set_rules('RowDataSucceed', 'rowdatasucceed', 'trim|required');
	// $this->form_validation->set_rules('RowDataFailed', 'rowdatafailed', 'trim|required');
	// $this->form_validation->set_rules('ApprovalID', 'approvalid', 'trim|required');
	// $this->form_validation->set_rules('StatusUpload', 'statusupload', 'trim|required');

	// $this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "system_upload.xls";
        $judul = "system_upload";
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
	xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadBy");
	xlsWriteLabel($tablehead, $kolomhead++, "UploadRemark");
	xlsWriteLabel($tablehead, $kolomhead++, "ApplicationSource");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
	xlsWriteLabel($tablehead, $kolomhead++, "FilePath");
	xlsWriteLabel($tablehead, $kolomhead++, "VirtualPath");
	xlsWriteLabel($tablehead, $kolomhead++, "FileSize");
	xlsWriteLabel($tablehead, $kolomhead++, "ReportPath");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataCount");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataSucceed");
	xlsWriteLabel($tablehead, $kolomhead++, "RowDataFailed");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalID");
	xlsWriteLabel($tablehead, $kolomhead++, "StatusUpload");

	foreach ($this->System_upload_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UploadDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->UploadBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->UploadRemark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FilePath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->VirtualPath);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FileSize);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ReportPath);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataCount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataSucceed);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowDataFailed);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ApprovalID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->StatusUpload);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=system_upload.doc");

        $data = array(
            'system_upload_data' => $this->System_upload_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('system_upload_doc',$data);
    }

}

/* End of file System_upload.php */
/* Location: ./application/controllers/System_upload.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-28 11:41:10 */
/* http://harviacode.com */