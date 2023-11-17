<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Manager_model extends MY_Model
{
  public function List()
  {
      $this->db->select('tbl_admin.*');
      $this->db->from('tbl_admin');
      $this->db->where('tbl_admin.isDeleted', false);
      $this->db->where('tbl_admin.role', 1);
      $this->db->order_by('tbl_admin.id', 'desc');
      $Query = $this->db->get();
      return $Query->result();
  }

  public function create($data)
  {
    $data['role'] = 1; // Set the role to 1 for each entry
    $data['sw_password'] = md5($data['password']); // Generate MD5 hash of the password
    $data['status'] = 1;
    
    // Remove the 'password' key from the data array since it will be stored in 'sw_password' column
    $password = $data['password'];
    unset($data['password']);
    
    $this->db->insert('tbl_admin', $data);
    $serviceId = $this->db->insert_id();
    
    // Update the 'password' column separately
    $this->db->set('password', $password);
    $this->db->where('id', $serviceId);
    $this->db->update('tbl_admin');
    
    return $serviceId;
}

  public function updatemanager($id)
  {
    $Query=$this->db->where('id',$id)->get('tbl_admin');
    if($Query)
        return $Query->row();
    else
        return false;
  }
  public function Update($data, $settingId)
  {   
      // $data['sw_password'] = md5($data['password']); // Generate MD5 hash of the password
      $this->db->where('id',$settingId);
      if($this->db->update('tbl_admin', $data))
          return $this->db->last_query();
      else
          return false;
  }

  public function Delete($id)
  {
      $Query = $this->db->set('isDeleted', 1)
                        ->where('id', $id)
                        ->update('tbl_admin');
      return $this->db->affected_rows() > 0;
  }
  
}