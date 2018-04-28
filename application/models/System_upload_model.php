<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class System_upload_model extends CI_Model
{

    public $table = 'system_upload';
    public $id = 'ID';
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
        $this->db->like('ID', $q);
	$this->db->or_like('BatchID', $q);
	$this->db->or_like('UploadDate', $q);
	$this->db->or_like('UploadBy', $q);
	$this->db->or_like('UploadRemark', $q);
	$this->db->or_like('ApplicationSource', $q);
	$this->db->or_like('ProcessMonth', $q);
	$this->db->or_like('ProcessYear', $q);
	$this->db->or_like('FilePath', $q);
	$this->db->or_like('VirtualPath', $q);
	$this->db->or_like('FileSize', $q);
	$this->db->or_like('ReportPath', $q);
	$this->db->or_like('RowDataCount', $q);
	$this->db->or_like('RowDataSucceed', $q);
	$this->db->or_like('RowDataFailed', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('StatusUpload', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('BatchID', $q);
	$this->db->or_like('UploadDate', $q);
	$this->db->or_like('UploadBy', $q);
	$this->db->or_like('UploadRemark', $q);
	$this->db->or_like('ApplicationSource', $q);
	$this->db->or_like('ProcessMonth', $q);
	$this->db->or_like('ProcessYear', $q);
	$this->db->or_like('FilePath', $q);
	$this->db->or_like('VirtualPath', $q);
	$this->db->or_like('FileSize', $q);
	$this->db->or_like('ReportPath', $q);
	$this->db->or_like('RowDataCount', $q);
	$this->db->or_like('RowDataSucceed', $q);
	$this->db->or_like('RowDataFailed', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('StatusUpload', $q);
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

/* End of file System_upload_model.php */
/* Location: ./application/models/System_upload_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-28 11:41:10 */
/* http://harviacode.com */