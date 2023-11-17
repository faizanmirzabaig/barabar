
<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Course_purchase_model extends MY_Model
{
  public function List($admin_id='')
  {
    $admin_role=$this->session->userdata('role');
    if($admin_role<=1){
      $this->db->select('tbl_course_purchase.*,tbl_course.name as course_name,tbl_course.title as course_title,tbl_users.name as user_name');
      $this->db->from('tbl_course_purchase');
      $this->db->join('tbl_course','tbl_course.id=tbl_course_purchase.course_id');
      $this->db->join('tbl_users','tbl_users.id=tbl_course_purchase.user_id');
      $this->db->where('tbl_course_purchase.isDeleted', false);
      // $this->db->where('tbl_course.creator_id', $admin_id);
      $this->db->order_by('tbl_course_purchase.id', 'desc');
      $Query = $this->db->get();
      return $Query->result();

    }else{
      $this->db->select('tbl_course_purchase.*,tbl_course.name as course_name,tbl_course.title as course_title,tbl_users.name as user_name');
      $this->db->from('tbl_course_purchase');
      $this->db->join('tbl_course','tbl_course.id=tbl_course_purchase.course_id');
      $this->db->join('tbl_users','tbl_users.id=tbl_course_purchase.user_id');
      $this->db->where('tbl_course_purchase.isDeleted', false);
      $this->db->where('tbl_course.creator_id', $admin_id);
      $this->db->order_by('tbl_course_purchase.id', 'desc');
      $Query = $this->db->get();
      return $Query->result();

    }
      
      echo $this->db->last_query();
  }


  public function Insert($data)
  {
    $this->db->insert('tbl_course', $data);
    $serviceId =  $this->db->insert_id();
    return $serviceId;
  }


  public function getSite($id)
  {
      $Query=$this->db->where('id',$id)->get('tbl_course');
      if($Query)
          return $Query->row();
      else
          return false;
  }


  public function Update($data, $settingId)
  {
      $this->db->where('id',$settingId);
      if($this->db->update('tbl_course', $data))
          return $this->db->last_query();
      else
          return false;
  }


  public function Delete($id)
  {
    $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_course_purchase');
        if ($Query){
            $last_q = $this->db->last_query();

            return $last_q;
          }
        else {
            return false;
        }
    
  }
}
