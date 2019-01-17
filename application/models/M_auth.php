<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    function login($email, $password) {
        //create query to connect user login database
/*
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        //get query and processing
        $query = $this->db->get();
*/		
$query = $this->db->query("

 
SELECT TOP 10 a.UserID
      ,a.UserGroupID
      ,a.ParentUserID
      ,a.UserLoginID
      ,a.UserName
      ,a.NPP
      ,a.Password
      ,a.SRLanguage
      ,a.EmailAddress
      ,a.PhoneNumber
      ,a.ActiveDate
      ,a.ExpireDate
      ,a.IsActive
      ,a.AreaGroupID
      ,a.AreaID
      ,a.AgencyID
      ,a.EmployeeID
      ,a.PhotoFilePath
      ,a.PhotoFileName
      ,a.IconPhotoFilePath
      
      ,b.UserGroupName
      ,c.AreaName
      ,d.AgencyName
      
  FROM AppUser a
  LEFT JOIN AppUserGroup b ON a.UserGroupID=b.UserGroupID
  LEFT JOIN Area c ON a.AreaID=c.AreaID
  LEFT JOIN Agency d ON a.AgencyID=d.AgencyID
WHERE a.EmailAddress ='$email' AND a.Password='$password'  
");
        if($query->num_rows() == 1) {
            return $query->row(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function login_super($email) {
        
$query = $this->db->query("

SELECT TOP 10 a.UserID
      ,a.UserGroupID
      ,a.ParentUserID
      ,a.UserLoginID
      ,a.UserName
      ,a.NPP
      ,a.Password
      ,a.SRLanguage
      ,a.EmailAddress
      ,a.PhoneNumber
      ,a.ActiveDate
      ,a.ExpireDate
      ,a.IsActive
      ,a.AreaGroupID
      ,a.AreaID
      ,a.AgencyID
      ,a.EmployeeID
      ,a.PhotoFilePath
      ,a.PhotoFileName
      ,a.IconPhotoFilePath
      
      ,b.UserGroupName
      ,c.AreaName
      ,d.AgencyName
      
  FROM AppUser a
  LEFT JOIN AppUserGroup b ON a.UserGroupID=b.UserGroupID
  LEFT JOIN Area c ON a.AreaID=c.AreaID
  LEFT JOIN Agency d ON a.AgencyID=d.AgencyID
WHERE a.EmailAddress ='$email' OR a.UserLoginID ='$email'
");
        if($query->num_rows() == 1) {
            return $query->row(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
	
	
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */