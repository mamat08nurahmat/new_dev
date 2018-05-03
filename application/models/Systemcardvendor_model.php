<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemcardvendor_model extends CI_Model
{

    public $table = 'systemcardvendor';
    public $id = 'RowID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('RowID', $q);
	$this->db->or_like('BatchID', $q);
	$this->db->or_like('Tanggal_Survey', $q);
	$this->db->or_like('Surveyor', $q);
	$this->db->or_like('No_Aplikasi', $q);
	$this->db->or_like('Product', $q);
	$this->db->or_like('Source_Code', $q);
	$this->db->or_like('Channel_Aplikasi', $q);
	$this->db->or_like('Coverage_Area', $q);
	$this->db->or_like('Sales_Code', $q);
	$this->db->or_like('Nama_Aplikan', $q);
	$this->db->or_like('No_Identitas', $q);
	$this->db->or_like('DOB', $q);
	$this->db->or_like('Jenis_Kelamin', $q);
	$this->db->or_like('No_HP', $q);
	$this->db->or_like('Jenis_Perusahaan', $q);
	$this->db->or_like('Nama_Perusahaan', $q);
	$this->db->or_like('Jabatan', $q);
	$this->db->or_like('Penghasilan', $q);
	$this->db->or_like('Lama_Bekerja', $q);
	$this->db->or_like('Status_Karyawan', $q);
	$this->db->or_like('Alamat_Kantor', $q);
	$this->db->or_like('Kecamatan', $q);
	$this->db->or_like('Kota', $q);
	$this->db->or_like('No_Telp_Kantor', $q);
	$this->db->or_like('ProcessMonth', $q);
	$this->db->or_like('ProcessYear', $q);
	$this->db->or_like('Status_Kartu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('RowID', $q);
	$this->db->or_like('BatchID', $q);
	$this->db->or_like('Tanggal_Survey', $q);
	$this->db->or_like('Surveyor', $q);
	$this->db->or_like('No_Aplikasi', $q);
	$this->db->or_like('Product', $q);
	$this->db->or_like('Source_Code', $q);
	$this->db->or_like('Channel_Aplikasi', $q);
	$this->db->or_like('Coverage_Area', $q);
	$this->db->or_like('Sales_Code', $q);
	$this->db->or_like('Nama_Aplikan', $q);
	$this->db->or_like('No_Identitas', $q);
	$this->db->or_like('DOB', $q);
	$this->db->or_like('Jenis_Kelamin', $q);
	$this->db->or_like('No_HP', $q);
	$this->db->or_like('Jenis_Perusahaan', $q);
	$this->db->or_like('Nama_Perusahaan', $q);
	$this->db->or_like('Jabatan', $q);
	$this->db->or_like('Penghasilan', $q);
	$this->db->or_like('Lama_Bekerja', $q);
	$this->db->or_like('Status_Karyawan', $q);
	$this->db->or_like('Alamat_Kantor', $q);
	$this->db->or_like('Kecamatan', $q);
	$this->db->or_like('Kota', $q);
	$this->db->or_like('No_Telp_Kantor', $q);
	$this->db->or_like('ProcessMonth', $q);
	$this->db->or_like('ProcessYear', $q);
	$this->db->or_like('Status_Kartu', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Systemcardvendor_model.php */
/* Location: ./application/models/Systemcardvendor_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-02 03:29:13 */
/* http://harviacode.com */