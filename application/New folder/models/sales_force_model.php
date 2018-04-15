<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Sales_force_model extends CI_Model {     
var $table = 'Employee';     
var $column_order = array('EmployeeNewName',null); 
//set column field database for datatable orderable     
var $column_search = array('EmployeeNewName'); 
//set column field database for datatable searchable just firstname , lastname , address are searchable     
var $order = array('id' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		#$this->load->helper(array('form', 'url'));
    }
	 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        return $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function save_get_id($data)
    {
        $this->db->insert('Employee', $data);
		$insert_id = $this->db->insert_id();
        return $insert_id ;
    }
	
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
 
 
    public function get_by_ktp($no_ktp)
    {
        // $this->db->from('Employee');
        // $this->db->where('no_ktp',$no_ktp);
        // $query = $this->db->get();

$query = $this->db->query("
    SELECT 
a.*
,b.*
,c.* 
,d.* 
FROM Employee a
LEFT JOIN Agency b ON a.AgencyID = b.AgencyID
LEFT JOIN AgencySalesCenter c ON a.SalesCenterID = c.SalesCenterID
LEFT JOIN posisi d ON a.id_posisi = d.id_posisi
WHERE a.no_ktp='$no_ktp'
    ");
 
        return $query->result();
    }
    public function get_id_by_ktp($no_ktp)
    {
        $this->db->select('id');
        $this->db->from('Employee');
        $this->db->where('no_ktp',$no_ktp);
        $query = $this->db->get();
 
        return $query->result();
    }

	
	    public function hapusdata($no_ktp)
    {
        $this->db->where('no_ktp', $no_ktp);
        $this->db->delete('Employee');
	return $this->db->affected_rows();
		
    }
//getNewSalesCode
public function getNewSalesCode(){
	
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
  
//  return substr($result, -3);
	$hash = substr($result, -3);
	$cek = $this->db->query("SELECT EmployeeNewCode FROM Employee  ")->result();	

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


return $new_code;
	
}

	
	
}