<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Banner_model extends MY_Model
{
    public function AllBannerList($course_type='')
    {
        $this->db->select('tbl_banner.*,tbl_course_type.name as course_type_name');
        $this->db->from('tbl_banner');
        $this->db->join('tbl_course_type','tbl_course_type.id=tbl_banner.course_type_id');
        if(!empty($course_type)){
            $this->db->where('tbl_banner.course_type_id', $course_type);    
        }
        $this->db->where('tbl_banner.isDeleted', false);
        $this->db->order_by('tbl_banner.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insert($img,$course_type_id)
    {
        $data = array(
            'img' => $img,
            'course_type_id' => $course_type_id
        );
        if($this->db->insert('tbl_banner',$data))
            return $this->db->last_query();
        else
            return false;
    
    }

    public function getBanner($id)
    {
        $Query=$this->db->where('id',$id)
                    ->get('tbl_banner');
        if($Query)
            return $Query->row();
        else   
            return false;
    }
   
   

    public function update($Banner_id,$course_type_id,$img)
    {
        // print_r($Banner_id);
        // print_r($img); exit;
        $data = [
            'course_type_id'=>$course_type_id,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        if($img)
            $data['img']=$img;
        
        $this->db->where('id',$Banner_id);
        // echo'<pre>';
        // print_r($data);die;
        if($this->db->update('tbl_banner',$data))
            return $this->db->last_query();
        else 
            return false;
    }

   
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_banner');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
