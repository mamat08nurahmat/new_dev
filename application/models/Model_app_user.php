<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_app_user extends MY_Model {

	private $primary_key 	= 'UserID';
	private $table_name 	= 'AppUser';
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


	public function query_all_employee_aktif(){


$query_all_employee = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	a.photo as photo,
	a.email as email,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID

	WHERE a.IsDiscontinued IS NULL
	


	")->result();

return $query_all_employee; 

	}

	public function query_all_employee(){


$query_all_employee = $this->db->query("
SELECT
	a.id as id,
	a.no_ktp as no_ktp,
	a.EmployeeNewCode as sales_code,
	a.ParentEmployeeID as atasan,
	a.photo as photo,
	a.email as email,
	a.ParentEmployeeID as atasan,
	c.posisi as posisi,
	d.AgencyName as agency,
	b.SalesCenterName as sales_center,
	a.nama_lengkap as nama,
	a.no_ktp as no_ktp,
	a.tgl as tgl,
	a.ket as ket
	FROM Employee a
	left JOIN AgencySalesCenter b ON a.SalesCenterID = b.SalesCenterID 		
	left JOIN posisi c ON a.id_posisi = c.id_posisi
	left Join Agency d ON a.AgencyID = d.AgencyID
	


	")->result();

return $query_all_employee; 

	}


   //    KODE USER
    public function getKodeUser(){
        $q = $this->db->query("select MAX(UserID) as kd_max from AppUser");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
//        return "K-".$kd;
          return $kd;
    }




    // Get Area
    function getArea($postData){
        $response = array();
        
        // Select record
        $this->db->select('AreaID,AreaName');
        $this->db->where('AreaGroupID', $postData['area_grup']);
        $q = $this->db->get('Area');
        $response = $q->result_array();
		//join agrncy salescenter

        return $response;
    }


    // Get Agency
    function getAgency($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$area_id = $postData['area'];
$q = $this->db->query("
SELECT a.AgencyID, a.AgencyName 
FROM Agency a
JOIN AgencySalesCenter b ON a.AgencyID=b.AgencyID
WHERE b.AreaID='$area_id'
");
        $response = $q->result_array();

        return $response;
    }


    // Get Sales Center
    function getSalesCenter($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$agency_id = $postData['agency'];
$q = $this->db->query("
SELECT SalesCenterID, SalesCenterName
FROM AgencySalesCenter 
WHERE AgencyID='$agency_id'
");
        $response = $q->result_array();

        return $response;
    }


    function getCity($postData){
        $response = array();
        
        // Select record
/*
        $this->db->select('AgencyID,AgencyName');
        $this->db->where('AreaID', $postData['area']);
        $q = $this->db->get('Area');
*/		
$area_id = $postData['area'];
$q = $this->db->query("
SELECT a.CityID, a.CityName 
FROM City a

WHERE a.AreaID='$area_id'
");
        $response = $q->result_array();

        return $response;
    }




	// public function count_all($q = '', $field = '')
	// {
	// 	$iterasi = 1;
 //        $num = count($this->field_search);
 //        $where = NULL;
 //        $q = $this->scurity($q);
	// 	$field = $this->scurity($field);

 //        if (empty($field)) {
	//         foreach ($this->field_search as $field) {
	//             if ($iterasi == 1) {
	//                 $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	//             } else if ($iterasi == $num) {
	//                 $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	//             } else {
	//                 $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	//             }
	//             $iterasi++;
	//         }
 //        } else {
 //        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
 //        }

 //        $this->db->where($where);
	// 	$query = $this->db->get($this->table_name);

	// 	return $query->num_rows();
	// }

	// public function get($q = '', $field = '', $limit = 0, $offset = 0)
	// {
	// 	$iterasi = 1;
 //        $num = count($this->field_search);
 //        $where = NULL;
 //        $q = $this->scurity($q);
	// 	$field = $this->scurity($field);

 //        if (empty($field)) {
	//         foreach ($this->field_search as $field) {
	//             if ($iterasi == 1) {
	//                 $where .= "(" . $field . " LIKE '%" . $q . "%' ";
	//             } else if ($iterasi == $num) {
	//                 $where .= "OR " . $field . " LIKE '%" . $q . "%') ";
	//             } else {
	//                 $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	//             }
	//             $iterasi++;
	//         }
 //        } else {
 //        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
 //        }

 //        $this->db->where($where);
 //        $this->db->limit($limit, $offset);
 //        $this->db->order_by($this->primary_key, "DESC");
	// 	$query = $this->db->get($this->table_name);

	// 	return $query->result();
	// }

	// public function get_group_user($user_id = false)
	// {
	// 	if ($user_id === false) {
	// 		$user_id = get_user_data('id');
	// 	}
	// 	$result_group_user = [];

	// 	$query = $this->db->get_where('aauth_user_to_group', ['user_id' => $user_id]);
	// 	foreach ($query->result() as $row) {
	// 		$result_group_user[] = $row->group_id;
	// 	}

	// 	return $result_group_user;
	// }

}


/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */