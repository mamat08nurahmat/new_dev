<?php
class Csv_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('BatchID', 'DESC');
		$query = $this->db->get('SystemUpload');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('tbl_user', $data);
	}
}
