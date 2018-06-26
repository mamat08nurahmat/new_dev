<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Systemcardlink_model extends CI_Model
{

    public $table = 'systemcardlink';
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
	$this->db->or_like('OpenDate', $q);
	$this->db->or_like('SourceCode', $q);
	$this->db->or_like('CustomerNumber', $q);
	$this->db->or_like('CustomerName', $q);
	$this->db->or_like('CustomerBirthDate', $q);
	$this->db->or_like('ORG', $q);
	$this->db->or_like('Logo', $q);
	$this->db->or_like('EmpReffCode', $q);
	$this->db->or_like('BlockCard', $q);
	$this->db->or_like('ApplicationType', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('RowID', $q);
	$this->db->or_like('BatchID', $q);
	$this->db->or_like('OpenDate', $q);
	$this->db->or_like('SourceCode', $q);
	$this->db->or_like('CustomerNumber', $q);
	$this->db->or_like('CustomerName', $q);
	$this->db->or_like('CustomerBirthDate', $q);
	$this->db->or_like('ORG', $q);
	$this->db->or_like('Logo', $q);
	$this->db->or_like('EmpReffCode', $q);
	$this->db->or_like('BlockCard', $q);
	$this->db->or_like('ApplicationType', $q);
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

/* End of file Systemcardlink_model.php */
/* Location: ./application/models/Systemcardlink_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-16 04:06:23 */
/* http://harviacode.com */