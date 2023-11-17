<?php
class Survey_type_model extends MY_Model
{
    public function AllSurveyType()
    {
        $this->db->select('*');
        $this->db->from('tbl_survey_type');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

}