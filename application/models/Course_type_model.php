<?php
class Course_type_model extends MY_Model
{
    public function AllCourseType()
    {
        $this->db->select('*');
        $this->db->from('tbl_course_type');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function Insert($data)
    {
        // $data = array(
        //     'img' => $img,
        //     'course_type_id' => $course_type_id
        // );
        $this->db->insert('tbl_course_type', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }
    public function getCourseType($id)
    {
        $Query = $this->db->where('id', $id)
            ->get('tbl_course_type');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Update($data)
    {
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_course_type', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_course_type');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
