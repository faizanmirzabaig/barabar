<?php
class Survey_share_model extends MY_Model
{
    private $table;

    public function __construct(){
        $this->table = 'tbl_survey_share';
    }

    public function View($id='',$user_id='',$survey_id='',$status='')
    {
        $this->db->select('tbl_survey_share.*,tbl_users.name as user_name,tbl_survey.name as survey_name,tbl_survey.title as survey_title');
        if(!empty($id)){
            $this->db->where('tbl_survey_share.id', $id);
        }
        if(!empty($user_id)){
            $this->db->where('tbl_survey_share.user_id', $user_id);
        }
        if(!empty($survey_id)){
            $this->db->where('tbl_survey_share.course_id', $survey_id);
        }
        if($status!=''){
            $this->db->where('tbl_survey_share.status', $status);
        }
        $this->db->join('tbl_survey','tbl_survey.id=tbl_survey_share.course_id');
        $this->db->join('tbl_users','tbl_users.id=tbl_survey_share.user_id');
        $this->db->where('tbl_survey_share.isDeleted', false);
        $this->db->order_by('tbl_survey_share.id', 'desc');
        $Query = $this->db->get($this->table);
        
        return $Query->result();
    }


    public function Insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}