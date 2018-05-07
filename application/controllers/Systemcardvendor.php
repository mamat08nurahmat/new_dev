<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemcardvendor extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Systemcardvendor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $systemcardvendor = $this->Systemcardvendor_model->get_all();

        $data = array(
            'systemcardvendor_data' => $systemcardvendor
        );

        $this->template->load('template','systemcardvendor_list', $data);
    }


    public function by_batch($BatchID)
    {
    	// print_r("expression");die();
        // $systemccos = $this->Systemccos_model->get_all();
        $systemcardvendor = $this->db->query("SELECT * FROM SystemCardVendor WHERE BatchID='$BatchID' ORDER BY RowID ASC")->result();

        $data = array(
            'systemcardvendor_data' => $systemcardvendor
        );

        $this->template->load('template','systemcardvendor_list', $data);
    }




    public function by_month_year($month,$year)
    {
    	// print_r("expression");die();
        // $systemccos = $this->Systemccos_model->get_all();
        $systemcardvendor = $this->db->query("SELECT * FROM SystemCardVendor WHERE ProcessMonth='$month' AND ProcessYear='$year' ORDER BY RowID ASC")->result();

        $data = array(
            'systemcardvendor_data' => $systemcardvendor
        );

        $this->template->load('template','systemcardvendor_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Systemcardvendor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'BatchID' => $row->BatchID,
		'RowID' => $row->RowID,
		'Tanggal_Survey' => $row->Tanggal_Survey,
		'Surveyor' => $row->Surveyor,
		'No_Aplikasi' => $row->No_Aplikasi,
		'Product' => $row->Product,
		'Source_Code' => $row->Source_Code,
		'Channel_Aplikasi' => $row->Channel_Aplikasi,
		'Coverage_Area' => $row->Coverage_Area,
		'Sales_Code' => $row->Sales_Code,
		'Nama_Aplikan' => $row->Nama_Aplikan,
		'No_Identitas' => $row->No_Identitas,
		'DOB' => $row->DOB,
		'Jenis_Kelamin' => $row->Jenis_Kelamin,
		'No_HP' => $row->No_HP,
		'Jenis_Perusahaan' => $row->Jenis_Perusahaan,
		'Nama_Perusahaan' => $row->Nama_Perusahaan,
		'Jabatan' => $row->Jabatan,
		'Penghasilan' => $row->Penghasilan,
		'Lama_Bekerja' => $row->Lama_Bekerja,
		'Status_Karyawan' => $row->Status_Karyawan,
		'Alamat_Kantor' => $row->Alamat_Kantor,
		'Kecamatan' => $row->Kecamatan,
		'Kota' => $row->Kota,
		'No_Telp_Kantor' => $row->No_Telp_Kantor,
		'ProcessMonth' => $row->ProcessMonth,
		'ProcessYear' => $row->ProcessYear,
		'Status_Kartu' => $row->Status_Kartu,
	    );
            $this->template->load('template','systemcardvendor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardvendor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('systemcardvendor/create_action'),
	    'BatchID' => set_value('BatchID'),
	    'RowID' => set_value('RowID'),
	    'Tanggal_Survey' => set_value('Tanggal_Survey'),
	    'Surveyor' => set_value('Surveyor'),
	    'No_Aplikasi' => set_value('No_Aplikasi'),
	    'Product' => set_value('Product'),
	    'Source_Code' => set_value('Source_Code'),
	    'Channel_Aplikasi' => set_value('Channel_Aplikasi'),
	    'Coverage_Area' => set_value('Coverage_Area'),
	    'Sales_Code' => set_value('Sales_Code'),
	    'Nama_Aplikan' => set_value('Nama_Aplikan'),
	    'No_Identitas' => set_value('No_Identitas'),
	    'DOB' => set_value('DOB'),
	    'Jenis_Kelamin' => set_value('Jenis_Kelamin'),
	    'No_HP' => set_value('No_HP'),
	    'Jenis_Perusahaan' => set_value('Jenis_Perusahaan'),
	    'Nama_Perusahaan' => set_value('Nama_Perusahaan'),
	    'Jabatan' => set_value('Jabatan'),
	    'Penghasilan' => set_value('Penghasilan'),
	    'Lama_Bekerja' => set_value('Lama_Bekerja'),
	    'Status_Karyawan' => set_value('Status_Karyawan'),
	    'Alamat_Kantor' => set_value('Alamat_Kantor'),
	    'Kecamatan' => set_value('Kecamatan'),
	    'Kota' => set_value('Kota'),
	    'No_Telp_Kantor' => set_value('No_Telp_Kantor'),
	    'ProcessMonth' => set_value('ProcessMonth'),
	    'ProcessYear' => set_value('ProcessYear'),
	    'Status_Kartu' => set_value('Status_Kartu'),
	);
        $this->template->load('template','systemcardvendor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'Tanggal_Survey' => $this->input->post('Tanggal_Survey',TRUE),
		'Surveyor' => $this->input->post('Surveyor',TRUE),
		'No_Aplikasi' => $this->input->post('No_Aplikasi',TRUE),
		'Product' => $this->input->post('Product',TRUE),
		'Source_Code' => $this->input->post('Source_Code',TRUE),
		'Channel_Aplikasi' => $this->input->post('Channel_Aplikasi',TRUE),
		'Coverage_Area' => $this->input->post('Coverage_Area',TRUE),
		'Sales_Code' => $this->input->post('Sales_Code',TRUE),
		'Nama_Aplikan' => $this->input->post('Nama_Aplikan',TRUE),
		'No_Identitas' => $this->input->post('No_Identitas',TRUE),
		'DOB' => $this->input->post('DOB',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'No_HP' => $this->input->post('No_HP',TRUE),
		'Jenis_Perusahaan' => $this->input->post('Jenis_Perusahaan',TRUE),
		'Nama_Perusahaan' => $this->input->post('Nama_Perusahaan',TRUE),
		'Jabatan' => $this->input->post('Jabatan',TRUE),
		'Penghasilan' => $this->input->post('Penghasilan',TRUE),
		'Lama_Bekerja' => $this->input->post('Lama_Bekerja',TRUE),
		'Status_Karyawan' => $this->input->post('Status_Karyawan',TRUE),
		'Alamat_Kantor' => $this->input->post('Alamat_Kantor',TRUE),
		'Kecamatan' => $this->input->post('Kecamatan',TRUE),
		'Kota' => $this->input->post('Kota',TRUE),
		'No_Telp_Kantor' => $this->input->post('No_Telp_Kantor',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'Status_Kartu' => $this->input->post('Status_Kartu',TRUE),
	    );

            $this->Systemcardvendor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('systemcardvendor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Systemcardvendor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('systemcardvendor/update_action'),
		'BatchID' => set_value('BatchID', $row->BatchID),
		'RowID' => set_value('RowID', $row->RowID),
		'Tanggal_Survey' => set_value('Tanggal_Survey', $row->Tanggal_Survey),
		'Surveyor' => set_value('Surveyor', $row->Surveyor),
		'No_Aplikasi' => set_value('No_Aplikasi', $row->No_Aplikasi),
		'Product' => set_value('Product', $row->Product),
		'Source_Code' => set_value('Source_Code', $row->Source_Code),
		'Channel_Aplikasi' => set_value('Channel_Aplikasi', $row->Channel_Aplikasi),
		'Coverage_Area' => set_value('Coverage_Area', $row->Coverage_Area),
		'Sales_Code' => set_value('Sales_Code', $row->Sales_Code),
		'Nama_Aplikan' => set_value('Nama_Aplikan', $row->Nama_Aplikan),
		'No_Identitas' => set_value('No_Identitas', $row->No_Identitas),
		'DOB' => set_value('DOB', $row->DOB),
		'Jenis_Kelamin' => set_value('Jenis_Kelamin', $row->Jenis_Kelamin),
		'No_HP' => set_value('No_HP', $row->No_HP),
		'Jenis_Perusahaan' => set_value('Jenis_Perusahaan', $row->Jenis_Perusahaan),
		'Nama_Perusahaan' => set_value('Nama_Perusahaan', $row->Nama_Perusahaan),
		'Jabatan' => set_value('Jabatan', $row->Jabatan),
		'Penghasilan' => set_value('Penghasilan', $row->Penghasilan),
		'Lama_Bekerja' => set_value('Lama_Bekerja', $row->Lama_Bekerja),
		'Status_Karyawan' => set_value('Status_Karyawan', $row->Status_Karyawan),
		'Alamat_Kantor' => set_value('Alamat_Kantor', $row->Alamat_Kantor),
		'Kecamatan' => set_value('Kecamatan', $row->Kecamatan),
		'Kota' => set_value('Kota', $row->Kota),
		'No_Telp_Kantor' => set_value('No_Telp_Kantor', $row->No_Telp_Kantor),
		'ProcessMonth' => set_value('ProcessMonth', $row->ProcessMonth),
		'ProcessYear' => set_value('ProcessYear', $row->ProcessYear),
		'Status_Kartu' => set_value('Status_Kartu', $row->Status_Kartu),
	    );
            $this->template->load('template','systemcardvendor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardvendor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('RowID', TRUE));
        } else {
            $data = array(
		'BatchID' => $this->input->post('BatchID',TRUE),
		'Tanggal_Survey' => $this->input->post('Tanggal_Survey',TRUE),
		'Surveyor' => $this->input->post('Surveyor',TRUE),
		'No_Aplikasi' => $this->input->post('No_Aplikasi',TRUE),
		'Product' => $this->input->post('Product',TRUE),
		'Source_Code' => $this->input->post('Source_Code',TRUE),
		'Channel_Aplikasi' => $this->input->post('Channel_Aplikasi',TRUE),
		'Coverage_Area' => $this->input->post('Coverage_Area',TRUE),
		'Sales_Code' => $this->input->post('Sales_Code',TRUE),
		'Nama_Aplikan' => $this->input->post('Nama_Aplikan',TRUE),
		'No_Identitas' => $this->input->post('No_Identitas',TRUE),
		'DOB' => $this->input->post('DOB',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
		'No_HP' => $this->input->post('No_HP',TRUE),
		'Jenis_Perusahaan' => $this->input->post('Jenis_Perusahaan',TRUE),
		'Nama_Perusahaan' => $this->input->post('Nama_Perusahaan',TRUE),
		'Jabatan' => $this->input->post('Jabatan',TRUE),
		'Penghasilan' => $this->input->post('Penghasilan',TRUE),
		'Lama_Bekerja' => $this->input->post('Lama_Bekerja',TRUE),
		'Status_Karyawan' => $this->input->post('Status_Karyawan',TRUE),
		'Alamat_Kantor' => $this->input->post('Alamat_Kantor',TRUE),
		'Kecamatan' => $this->input->post('Kecamatan',TRUE),
		'Kota' => $this->input->post('Kota',TRUE),
		'No_Telp_Kantor' => $this->input->post('No_Telp_Kantor',TRUE),
		'ProcessMonth' => $this->input->post('ProcessMonth',TRUE),
		'ProcessYear' => $this->input->post('ProcessYear',TRUE),
		'Status_Kartu' => $this->input->post('Status_Kartu',TRUE),
	    );

            $this->Systemcardvendor_model->update($this->input->post('RowID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('systemcardvendor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Systemcardvendor_model->get_by_id($id);

        if ($row) {
            $this->Systemcardvendor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('systemcardvendor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('systemcardvendor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BatchID', 'batchid', 'trim|required');
	$this->form_validation->set_rules('Tanggal_Survey', 'tanggal survey', 'trim|required');
	$this->form_validation->set_rules('Surveyor', 'surveyor', 'trim|required');
	$this->form_validation->set_rules('No_Aplikasi', 'no aplikasi', 'trim|required');
	$this->form_validation->set_rules('Product', 'product', 'trim|required');
	$this->form_validation->set_rules('Source_Code', 'source code', 'trim|required');
	$this->form_validation->set_rules('Channel_Aplikasi', 'channel aplikasi', 'trim|required');
	$this->form_validation->set_rules('Coverage_Area', 'coverage area', 'trim|required');
	$this->form_validation->set_rules('Sales_Code', 'sales code', 'trim|required');
	$this->form_validation->set_rules('Nama_Aplikan', 'nama aplikan', 'trim|required');
	$this->form_validation->set_rules('No_Identitas', 'no identitas', 'trim|required');
	$this->form_validation->set_rules('DOB', 'dob', 'trim|required');
	$this->form_validation->set_rules('Jenis_Kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('No_HP', 'no hp', 'trim|required');
	$this->form_validation->set_rules('Jenis_Perusahaan', 'jenis perusahaan', 'trim|required');
	$this->form_validation->set_rules('Nama_Perusahaan', 'nama perusahaan', 'trim|required');
	$this->form_validation->set_rules('Jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('Penghasilan', 'penghasilan', 'trim|required');
	$this->form_validation->set_rules('Lama_Bekerja', 'lama bekerja', 'trim|required');
	$this->form_validation->set_rules('Status_Karyawan', 'status karyawan', 'trim|required');
	$this->form_validation->set_rules('Alamat_Kantor', 'alamat kantor', 'trim|required');
	$this->form_validation->set_rules('Kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('Kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('No_Telp_Kantor', 'no telp kantor', 'trim|required');
	$this->form_validation->set_rules('ProcessMonth', 'processmonth', 'trim|required');
	$this->form_validation->set_rules('ProcessYear', 'processyear', 'trim|required');
	$this->form_validation->set_rules('Status_Kartu', 'status kartu', 'trim|required');

	$this->form_validation->set_rules('RowID', 'RowID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "systemcardvendor.xls";
        $judul = "systemcardvendor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Survey");
	xlsWriteLabel($tablehead, $kolomhead++, "Surveyor");
	xlsWriteLabel($tablehead, $kolomhead++, "No Aplikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Product");
	xlsWriteLabel($tablehead, $kolomhead++, "Source Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Channel Aplikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Coverage Area");
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Aplikan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Identitas");
	xlsWriteLabel($tablehead, $kolomhead++, "DOB");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "No HP");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama Bekerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kantor");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp Kantor");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Kartu");

	foreach ($this->Systemcardvendor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tanggal_Survey);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Surveyor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Aplikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Product);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Source_Code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Channel_Aplikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Coverage_Area);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sales_Code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Aplikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Identitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DOB);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_HP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Penghasilan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Lama_Bekerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat_Kantor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Telp_Kantor);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Kartu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=systemcardvendor.doc");

        $data = array(
            'systemcardvendor_data' => $this->Systemcardvendor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('systemcardvendor_doc',$data);
    }

    //dev excel

    public function excel_cardvendor($BatchID)
    {
        $this->load->helper('exportexcel');
        $namaFile = "systemcardvendor.xls";
        $judul = "systemcardvendor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Survey");
	xlsWriteLabel($tablehead, $kolomhead++, "Surveyor");
	xlsWriteLabel($tablehead, $kolomhead++, "No Aplikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Product");
	xlsWriteLabel($tablehead, $kolomhead++, "Source Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Channel Aplikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Coverage Area");
	xlsWriteLabel($tablehead, $kolomhead++, "Sales Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Aplikan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Identitas");
	xlsWriteLabel($tablehead, $kolomhead++, "DOB");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "No HP");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama Bekerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kantor");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp Kantor");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessMonth");
	xlsWriteLabel($tablehead, $kolomhead++, "ProcessYear");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Kartu");
// $BatchID
	// foreach ($this->Systemcardvendor_model->get_all() as $data) {

$data_cardvendor_by_batch=$this->db->query("SELECT * FROM SystemCardVendor WHERE BatchID='$BatchID'")->result();

	foreach ($data_cardvendor_by_batch as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tanggal_Survey);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Surveyor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Aplikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Product);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Source_Code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Channel_Aplikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Coverage_Area);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sales_Code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Aplikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Identitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DOB);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_HP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Penghasilan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Lama_Bekerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat_Kantor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Telp_Kantor);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessMonth);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ProcessYear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Kartu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


}

/* End of file Systemcardvendor.php */
/* Location: ./application/controllers/Systemcardvendor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-02 03:29:13 */
/* http://harviacode.com */