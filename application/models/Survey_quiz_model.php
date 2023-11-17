<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Survey_quiz_model extends MY_Model
{
    public function Listquiz($videoId)
    {
        // $this->db->select('tbl_quiz.*');
        // $this->db->from('tbl_quiz');
       // $this->db->where('id', $id);
       $this->db->where('tbl_survey_quiz.video_id', $videoId);
        $this->db->where('tbl_survey_quiz.isDeleted', false);
        $Query = $this->db->get('tbl_survey_quiz');
        return $Query->result();
    
    }

    public function Insertquiz($data)
    {
       
        $this->db->insert('tbl_survey_quiz', $data);
        $quizId = $this->db->insert_id();
        return $quizId;
    }

    public function getquiz($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_survey_quiz');
        if ($Query)
            return $Query->row();
        else
            return false;
    }
    public function Updatequiz($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_survey_quiz', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Deletequiz($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_survey_quiz');
        if ($Query) {
            $last = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('video_id', $id)
                ->update('tbl_survey_quiz');
            return $last;
        } else {
            return false;
        }
    }
}