<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu_kredit extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kartu_kredit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kartu_kredit = $this->Kartu_kredit_model->get_all();

        $data = array(
            'kartu_kredit_data' => $kartu_kredit
        );

        $this->template->load('template','kartu_kredit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kartu_kredit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'RowID' => $row->RowID,
		'BatchID' => $row->BatchID,
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
	    );
            $this->template->load('template','kartu_kredit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kartu_kredit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kartu_kredit/create_action'),
	    'RowID' => set_value('RowID'),
	    'BatchID' => set_value('BatchID'),
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
	);
        $this->template->load('template','kartu_kredit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'RowID' => $this->input->post('RowID',TRUE),
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
	    );

            $this->Kartu_kredit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kartu_kredit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kartu_kredit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kartu_kredit/update_action'),
		'RowID' => set_value('RowID', $row->RowID),
		'BatchID' => set_value('BatchID', $row->BatchID),
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
	    );
            $this->template->load('template','kartu_kredit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kartu_kredit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'RowID' => $this->input->post('RowID',TRUE),
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
	    );

            $this->Kartu_kredit_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kartu_kredit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kartu_kredit_model->get_by_id($id);

        if ($row) {
            $this->Kartu_kredit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kartu_kredit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kartu_kredit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('RowID', 'rowid', 'trim|required');
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

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kartu_kredit.xls";
        $judul = "kartu_kredit";
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
	xlsWriteLabel($tablehead, $kolomhead++, "RowID");
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

	foreach ($this->Kartu_kredit_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RowID);
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
	    xlsWriteNumber($tablebody, $kolombody++, $data->No_Identitas);
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

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kartu_kredit.doc");

        $data = array(
            'kartu_kredit_data' => $this->Kartu_kredit_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kartu_kredit_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'kartu_kredit_data' => $this->Kartu_kredit_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('kartu_kredit_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('kartu_kredit.pdf', 'D'); 
    }

}

/* End of file Kartu_kredit.php */
/* Location: ./application/controllers/Kartu_kredit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-31 09:50:24 */
/* http://harviacode.com */