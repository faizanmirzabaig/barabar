<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Survey_model extends MY_Model
{
    public function List($admin_id = '')
    {
        $this->db->select('tbl_survey.*');
        $this->db->from('tbl_survey');
        // if (!empty($admin_id)) {
        if ($this->session->userdata('role') == CREATOR) {
            $this->db->where('creator_id', $this->session->userdata('admin_id'));
        } else {
            // $this->db->where('creator_id', $admin_id);
        }
        // }
        $this->db->where('tbl_survey.isDeleted', false);
        //   $this->db->where('tbl_survey.status', 1);
        $this->db->order_by('tbl_survey.sort', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insert($data)
    {
        $data['status'] = 0;
        $this->db->insert('tbl_survey', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function Update($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_survey', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_survey');
        if ($Query) {
            $last_q = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('survey_id', $id)
                ->update('tbl_survey_video');

            return $last_q;
        } else {
            return false;
        }
    }

    public function chapterList($id)
    {
        $this->db->select('tbl_survey_chapter.*');
        $this->db->from('tbl_survey_chapter');
        $this->db->where('tbl_survey_chapter.survey_id', $id);
        $this->db->where('tbl_survey_chapter.isDeleted', false);
        $this->db->order_by('tbl_survey_chapter.name', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insertchapter($data)
    {
        $this->db->insert('tbl_survey_chapter', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function getSurveyChapter($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_survey_chapter');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Updatechapter($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_survey_chapter', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function DeleteChapter($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_survey_chapter');
        if ($Query) {
            $last = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('chapter_id', $id)
                ->update('tbl_survey_video');
            return $last;
        } else {
            return false;
        }
    }

    public function ListData($survey_id,$id='')
    {

        $this->db->select('tbl_survey_video.*');
        $this->db->from('tbl_survey_video');
        // $this->db->join('tbl_chapter', 'tbl_survey_video.chapter_id=tbl_chapter.id');
        $this->db->where('tbl_survey_video.survey_id', $survey_id);
        
        if (!empty($id)) {
            $this->db->where('tbl_survey_video.chapter_id', $id);
        }
        $this->db->where('tbl_survey_video.isDeleted', false);
        $this->db->order_by('tbl_survey_video.sort', 'asc');
        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die('i m here');
        return $Query->result();
    }

    public function Insertvideo($data)
    {
        $this->db->insert('tbl_survey_video', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function Updatevideo($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_survey_video', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Deletevideo($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_survey_video');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }

    public function getSurveyVideo($id)
    {
        $this->db->select('tbl_survey_video.*,tbl_survey.status');
        $this->db->from('tbl_survey_video');
        // $this->db->join('tbl_chapter','tbl_survey_video.chapter_id=tbl_chapter.id');
        $this->db->join('tbl_survey','tbl_survey_video.survey_id=tbl_survey.id');
        $Query = $this->db->where('tbl_survey_video.id', $id)->get();
        if ($Query)
            return $Query->result();
        else
            return false;
    }

    public function getSurveyId($chapter_id)
    {
        $Query = $this->db->where('id', $chapter_id)->get('tbl_survey_chapter');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function getSite($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_survey');
        if ($Query)
            return $Query->result();
        else
            return false;
    }

    public function ViewSurvey($id = '', $survey_type_id = '', $status = '')
    {
        $this->db->select('tbl_survey.*,count(tbl_survey_video.id) as videocount,
        tbl_survey.videos as survey_video');
        $this->db->from('tbl_survey');
        $this->db->join('tbl_survey_chapter ', 'tbl_survey_chapter.survey_id=tbl_survey.id AND tbl_survey_chapter.isDeleted=0', 'LEFT');
        $this->db->join('tbl_survey_video', 'tbl_survey_video.chapter_id=tbl_survey_chapter.id AND tbl_survey_video.isDeleted=0', 'LEFT');
        if (!empty($course_type_id)) {
            $this->db->where('tbl_survey.survey_type_id', $survey_type_id);
        }
        if (!empty($status)) {
            $this->db->where('tbl_survey.status', $status);
        }
        // $this->db->join('tbl_chapter', 'tbl_chapter.course_id=tbl_survey.id');
        if (!empty($id)) {
            $this->db->where('tbl_survey.id', $id);
        }
        $this->db->group_by('tbl_survey.id');
        $this->db->where('tbl_survey.isDeleted', false);
        // $this->db->order_by('tbl_survey_video.sort', 'asc');
        $Query = $this->db->get();

        return $Query->result();


        // $Query = $this->db->get();
        // return $Query->result();
    }

    public function UserView($user_data, $user_id, $survey_type_id = '')
    {
        $survey_type_sql = '';
        if (!empty($survey_type_id)) {
            $survey_type_sql = 'tbl_survey.survey_type_id=' . $survey_type_id . ' AND';
        }
    
        $Query = $this->db->query('SELECT tbl_survey.*,count(tbl_survey_video.id) as videocount,tbl_survey.videos as survey_video FROM tbl_survey LEFT JOIN tbl_survey_chapter ON tbl_survey_chapter.survey_id=tbl_survey.id AND tbl_survey_chapter.isDeleted=0 LEFT JOIN tbl_survey_video ON tbl_survey_video.chapter_id=tbl_survey_chapter.id AND tbl_survey_video.isDeleted=0 WHERE tbl_survey.status='.APPROVED.' AND '.$survey_type_sql.' tbl_survey.isDeleted=0 AND (tbl_survey.view=0 OR ("' . $user_data['age'] . '" BETWEEN tbl_survey.min_age AND tbl_survey.max_age AND ( tbl_survey.gender=2 OR tbl_survey.gender="' . $user_data['gender'] . '") AND (tbl_survey.pincode="" OR FIND_IN_SET(' . $user_data['pincode'] . ',tbl_survey.pincode)) AND (tbl_survey.occupation_id="" OR tbl_survey.occupation_id=' . $user_data['occupation_id'] . ') AND (tbl_survey.hobby_id="" OR tbl_survey.hobby_id=' . $user_data['hobby_id'] . ' AND (tbl_survey.education_id="" OR tbl_survey.education_id=' . $user_data['education_id'] . ') AND (tbl_survey.heard_about_us_id="" OR tbl_survey.heard_about_us_id=' . $user_data['heard_about_us_id'] . ') AND (tbl_survey.area_of_interest_id="" OR tbl_survey.area_of_interest_id=' . $user_data['area_of_interest_id'] . ')))) GROUP BY tbl_survey.id ORDER BY tbl_survey.min_age DESC');
        $data=$this->db->last_query();
        // echo $data;
        return $Query->result();
    
    }

    public function checkPurchase($user_id, $survey_id)
    {
        $date = date('Y-m-d H:i:s');
        
        $this->db->where('user_id', $user_id)
                 ->where('survey_id', $survey_id)
                 ->where('expiry_date >', $date)
                 ->where('isDeleted', 0); // Add this condition
        
        $Query = $this->db->get('tbl_survey_purchase');
        
        if ($Query->num_rows() > 0) {
            return $Query->row();
        } else {
            return false;
        }
    }

    public function ViewPerformanceReport($id,$user_id)
    {
        $this->db->select('tbl_survey.name, tbl_survey_student_quiz.id, tbl_survey_student_quiz.total_marks, tbl_survey_student_quiz.obtained_marks,tbl_survey_student_quiz.total_question,tbl_survey_student_quiz.attempted_question,tbl_survey_student_quiz.updated_at, (tbl_survey_student_quiz.obtained_marks / tbl_survey_student_quiz.total_marks) * 100 AS percentage');
        $this->db->from('tbl_survey');
        $this->db->join('tbl_survey_chapter', 'tbl_survey.id = tbl_survey_chapter.survey_id');
        $this->db->join('tbl_survey_video', 'tbl_survey_chapter.id = tbl_surveyvideo.chapter_id');
        $this->db->join('tbl_survey_quiz', 'tbl_survey_video.id = tbl_survey_quiz.video_id');
        $this->db->join('tbl_survey_student_quiz_report', 'tbl_survey_quiz.id = tbl_survey_student_quiz_report.quiz_id');
        $this->db->join('tbl_survey_student_quiz', 'tbl_survey_student_quiz_report.student_quiz_id = tbl_survey_student_quiz.id');

        $this->db->where('tbl_survey.id', $id);
        $this->db->where('tbl_survey_student_quiz.user_id', $user_id);
        $this->db->where('tbl_survey_course.isDeleted', false);
        $this->db->group_by('tbl_survey_student_quiz.id');

        $query = $this->db->get();
        $result = $query->result();

        $total_percentages = 0;
        foreach ($result as $row) {
            $total_percentages += $row->percentage;
        }
        $average_percentage = count($result) > 0 ? $total_percentages / count($result) : 0;

        // Format individual percentages and average percentage without decimal places
        foreach ($result as &$row) {
            $row->percentage = number_format($row->percentage, 0);
        }
        $average_percentage = number_format($average_percentage, 0);

        return [
            'individual_percentages' => $result,
            'average_percentage' => $average_percentage,
        ];
    }



}