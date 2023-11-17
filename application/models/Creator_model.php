<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Creator_model extends MY_Model
{
  public function List()
  {
      $this->db->select('tbl_admin.*');
      $this->db->from('tbl_admin');
      $this->db->where('tbl_admin.isDeleted', false);
      $this->db->where('tbl_admin.role', 2);
      $this->db->where('tbl_admin.status', 1);
      $this->db->order_by('tbl_admin.id', 'desc');
      $Query = $this->db->get();
      return $Query->result();
  }

  public function approval_pending()
  {
      $this->db->select('tbl_admin.*');
      $this->db->from('tbl_admin');
      // $this->db->join('tbl_creator', 'tbl_creator.id=tbl_course.creator_id');
      $this->db->where('tbl_admin.isDeleted', false);
      $this->db->where('tbl_admin.role', 2);
      $this->db->where('tbl_admin.status', 0);
      $Query = $this->db->get();
      return $Query->num_rows();
  }

  public function Insert($data)
  {
    $data['role'] = 2;
    $this->db->insert('tbl_admin', $data);
    $serviceId =  $this->db->insert_id();
    return $serviceId;
    
  }

  public function Insertcourse($data)
  {
    $this->db->insert('tbl_course', $data);
    $serviceId =  $this->db->insert_id();
    return $serviceId;
  }
  public function updatecreator($id)
  {
      $Query=$this->db->where('id',$id)->get('tbl_admin');
      if($Query)
          return $Query->row();
      else
          return false;
  }
  public function Update($data, $settingId)
  {
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
            return $Query;
        // if ($Query){
        //     $last_q = $this->db->last_query();

        //     $Query = $this->db->set('isDeleted', 1)
        //     ->where('course_id', $id)
        //     ->update('tbl_coursevideo');

        //     return $last_q;
        //   }
        // else {
        //     return false;
        // }
    
  }

  public function AllCreator($status)
    {
        $this->db->select('tbl_admin.*');
        $this->db->from('tbl_admin');
        $this->db->where('tbl_admin.isDeleted', false);
        $this->db->where('tbl_admin.role', 2);
        $this->db->where('tbl_admin.status', $status);
        $this->db->order_by('tbl_admin.id', 'DESC');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function ChangeStatus($id)
    {
        $data = [
            'status' => $this->input->post('status'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_admin', $data);
        return $this->db->last_query();
    }

    // public function UpdateTableMaster($data, $id)
    // {
    //     $this->db->where('creator_id', $id);
    //     $result = $this->db->update('tbl_creator_content', $data);
        
    //     return $result ? true : false;
    // }

    // public function ChangeStatus($id)
    // {
    //     $data = [
    //         'status' => $this->input->post('status'),
    //         'isUpdated' => date('Y-m-d H:i:s')
    //     ];
    //     $this->db->where('creator_id', $id);
    //     $this->db->update('tbl_creator_content', $data);
    //     return $this->db->last_query();
    // }
    public function viewcontent($id)
    {
        $Query=$this->db->where('creator_id',$id)
                    ->get('tbl_course');
        if($Query)
            return $Query->result();
        else   
            return false;
    }

    public function editcontent($id)
    {
        $Query=$this->db->where('id',$id)
                    ->get('tbl_course');
        if($Query)
            return $Query->result();
        else   
            return false;
    }

    public function updatecontent($id,$image)
    {
        //   print_r($content_id);
        //   print_r($image); exit;
        //die('i m here');
        $data = [
            
            'updated_date' => date('Y-m-d H:i:s')
        ];
        if($image)
        $data['image']=$image;
        // echo '<pre>';
        // print_r($data);die();
        $this->db->where('creator_id',$id);
        if($this->db->update('tbl_course',$data))
            return $this->db->last_query();
        else 
            return false;
    }
    // public function UpdateTableMaster($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('adminprofile', $data);
    //     return $this->db->last_query();
    // }

    public function Deletecontent($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_course');
    }

    public function ExportCreatorTransaction($id)
    {
        $this->db->select('tbl_creator_purchase.*,tbl_admin.first_name,tbl_course.name as course_name,tbl_course.*,tbl_users.name as username');
        $this->db->from('tbl_creator_purchase');
        $this->db->join('tbl_admin','tbl_creator_purchase.creator_id=tbl_admin.id');
        $this->db->join('tbl_course','tbl_creator_purchase.course_id=tbl_course.id');
        $this->db->join('tbl_course_purchase','tbl_creator_purchase.course_id=tbl_course_purchase.course_id');
        $this->db->join('tbl_users','tbl_course_purchase.user_id=tbl_users.id');
        // $this->db->where('tbl_creator_purchase.creator_id',$id);
        $this->db->where('tbl_course.status', 2);
        $this->db->where('tbl_course.isDeleted', false);
        // $this->db->group_by('tbl_creator_purchase.id');
        // $this->db->group_by('tbl_course.id');

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die('i m here');

        return $Query->result();

    }


}