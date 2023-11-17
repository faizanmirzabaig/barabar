<?php
class Course_share_model extends MY_Model
{
    private $table;

    public function __construct(){
        $this->table = 'tbl_course_share';
    }

    public function View($id='',$user_id='',$course_id='',$status='')
    {
        $this->db->select('tbl_course_share.*,tbl_users.name as user_name,tbl_course.name as course_name,tbl_course.title as course_title');
        if(!empty($id)){
            $this->db->where('tbl_course_share.id', $id);
        }
        if(!empty($user_id)){
            $this->db->where('tbl_course_share.user_id', $user_id);
        }
        if(!empty($course_id)){
            $this->db->where('tbl_course_share.course_id', $course_id);
        }
        if($status!=''){
            $this->db->where('tbl_course_share.status', $status);
        }
        $this->db->join('tbl_course','tbl_course.id=tbl_course_share.course_id');
        $this->db->join('tbl_users','tbl_users.id=tbl_course_share.user_id');
        $this->db->where('tbl_course_share.isDeleted', false);
        $this->db->order_by('tbl_course_share.id', 'desc');
        $Query = $this->db->get($this->table);
        
        return $Query->result();
    }

    public function Insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function Update($data)
    {
        $this->db->where('id', $data['id']);
        if ($this->db->update($this->table, $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update($this->table);
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }

    public function ChangeStatus($id, $status, $reject_reason = '')
    {

        $data = [
            'status' => $this->input->post('status'),
            'updated_date' => date('Y-m-d H:i:s'),
            'reason' => $reject_reason,
            'status' => $status,

        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_course_share', $data);
        return $this->db->last_query();
    }
}
