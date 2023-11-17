<?php
class Creator_Purchase_model extends MY_Model
{
    public function index()
    {

    }

    public function InsertCreatorPurchase($data)
    {
        $this->db->insert('tbl_creator_purchase', $data);

    }

    public function viewpurchase($id)
    {
        $this->db->select('tbl_creator_purchase.*,tbl_admin.first_name,tbl_course.name as course_name,tbl_course.*');
        $this->db->from('tbl_creator_purchase');
        $this->db->join('tbl_admin','tbl_creator_purchase.creator_id=tbl_admin.id');
        $this->db->join('tbl_course','tbl_creator_purchase.course_id=tbl_course.id');
        // $this->db->join('tbl_coursevideo','tbl_course.id=tbl_coursevideo.course_id');
        // $this->db->join('tbl_student_quiz','tbl_coursevideo.id=tbl_student_quiz.video_id');
        $this->db->where('tbl_creator_purchase.creator_id',$id);
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
