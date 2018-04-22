<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_agency extends MY_Model {

	private $primary_key 	= 'AgencyID';
	private $table_name 	= 'Agency';
	// private $field_search 	= array('email', 'username', 'full_name');

	public function __construct()
	{	
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	// 'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function query_list_agency(){

	return $this->db->query("
	SELECT 
	AgencyID as id,
	AgencyName as agency,
	StreetAddress as alamat,
	PhoneNumber as telp,
	EmailAddress as email,
	IsActive as aktif
	FROM Agency where IsActive=1
	
	")->result();

	}


	
	 function insert_image($data)  
      {  
return  $this->db->insert("AgencyFile", $data);  
      } 

      function fetch_image()  
      {  

$agency_id = $this->uri->segment(3);//url
           $output = '';  
           $this->db->select("ID,Name,JenisFile,Keterangan");  
           $this->db->from("AgencyFile");  
           $this->db->order_by("ID", "DESC");  
           	$this->db->where('AgencyID',$agency_id);//???
           $query = $this->db->get();  
           foreach($query->result() as $row)  
           {  
//cek type file		   
/*
                $output .= '  
                     <div class="col-md-2">  
					<a href="'.base_url().'upload/'.$row->name.'" download>
                          <img src="'.base_url().'upload/'.$row->name.'" class="img-responsive img-thumbnail" />  
                     </div>  
					 </a>
                ';  
*/		   
/*
                $output .= '  
                     <div class="col-md-2"> 

					 
<a onclick="delete_('."'".$row->ID."'".')"><span class="glyphicon glyphicon-trash"></span></a>					 
					<a href="'.base_url().'upload/'.$row->Name.'" download>										
<span class="glyphicon glyphicon-download-alt"></span>					 
					 </a>
                          <img src="'.base_url().'images/download.png" class="img-responsive img-thumbnail" />  
					 <h5>Jenis File :'.$row->JenisFile.'</h5><br>
                 
                     </div>  
                ';  
*/		

/*
$output .='


<tr>
<td>'.$row->Name.'</td>
<td>PERJANJIAN</td>
<td>
<a onclick="delete_('."'".$row->ID."'".')">DELETE</a>
||
<a href="'.base_url().'uploads/'.$row->Name.'" download>DOWNLOAD</a>
</td>
</tr>


';

	


 */


$output .='


<tr>
<td>'.$row->Keterangan.'</td>
<td>'.$row->JenisFile.'</td>
<td>
<a href="'.base_url().'index.php/agency/delete_file_upload/'.$row->ID.'">DELETE</a>
||
<a href="'.base_url().'uploads/'.$row->Name.'" download>DOWNLOAD</a>
</td>
</tr>


';


$output .="</tabel>";				
$output .="</div>"; 	
				

           }  
           return $output;  
      }  
	

		public function get_by_id($id)
	{
		$this->db->from('AgencyFile');
		$this->db->where('ID',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
	
		public function delete_by_id($id)
	{
		$this->db->where('ID', $id);
		$this->db->delete('AgencyFile');
	}


    public function insert_agency($data){

    $this->db->insert('Agency',$data);
   $insert_id = $this->db->insert_id();

   return  $insert_id;
   
    }


}