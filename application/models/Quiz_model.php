<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Quiz_model extends MY_Model
{
    public function Listquiz($videoId)
    {
        // $this->db->select('tbl_quiz.*');
        // $this->db->from('tbl_quiz');
       // $this->db->where('id', $id);
       $this->db->where('tbl_quiz.video_id', $videoId);
        $this->db->where('tbl_quiz.isDeleted', false);
        $Query = $this->db->get('tbl_quiz');
        return $Query->result();
    
    }
    public function StudentQuizReport($student_quiz_id)
    {
        $this->db->select('tbl_student_quiz_report.*,tbl_quiz.`question_no`, tbl_quiz.`question`, tbl_quiz.`option_1`, tbl_quiz.`option_2`, tbl_quiz.`option_3`, tbl_quiz.`option_4`, tbl_quiz.`correct_ans`');
        $this->db->from('tbl_student_quiz_report');
        $this->db->join('tbl_quiz', 'tbl_student_quiz_report.quiz_id = tbl_quiz.id');
       // $this->db->where('id', $id);
        $this->db->where('tbl_student_quiz_report.student_quiz_id', $student_quiz_id);
        $this->db->where('tbl_student_quiz_report.isDeleted', false);
        $Query = $this->db->get();
        return $Query->result();
    }
    public function QuizReportId($quiz_id){
        $this->db->select('tbl_student_quiz_report.*,tbl_quiz.correct_ans');
        $this->db->from('tbl_student_quiz_report');
        $this->db->join('tbl_quiz','tbl_student_quiz_report.quiz_id=tbl_quiz.id');
        $this->db->where('tbl_student_quiz_report.id',$quiz_id);
        $Query=$this->db->get();
        return $Query->result();

    }    

    public function Answer($Id, $answer, $isCorrect, $student_quiz_id)
    {
        // Get the previous answer from the tbl_student_quiz_report
        $prevAnswerQuery = $this->db->select('answer,is_correct')->where('id', $Id)->get('tbl_student_quiz_report');
        $prevAnswer = $prevAnswerQuery->row()->answer;
    
        // Calculate the change in obtained_marks
        // $obtainedMarksChange = 0;
     
    
        // Update the answer and is_correct columns in tbl_student_quiz_report
        $this->db->where('id', $Id);
        $this->db->set('answer', $answer);
        $this->db->set('is_correct', $isCorrect);
        $this->db->update('tbl_student_quiz_report');
    
        // Update the attempted_question in tbl_student_quiz
        $this->db->set('attempted_question', 'attempted_question + 1', false);
    
        // Update obtained_marks based on the calculated change
        if ($prevAnswer != $answer) {
            if ($isCorrect) {
                $this->db->set('obtained_marks', 'obtained_marks +1', false);
            }else{
                $this->db->set('obtained_marks', 'obtained_marks-'.$prevAnswerQuery->row()->is_correct, false);
            }
        }
    
        $this->db->where('id', $student_quiz_id);
        $this->db->update('tbl_student_quiz');
    
        return $this->db->affected_rows();
    }
    
    private function getObtainedMarks($student_quiz_id)
    {
        $this->db->select('obtained_marks')->where('id', $student_quiz_id);
        $query = $this->db->get('tbl_student_quiz');
        return $query->row()->obtained_marks;
    }
    
    

    // public function Answer($Id, $answer, $isCorrect, $student_quiz_id)
    // {
    //     // Get the previous answer from the tbl_student_quiz_report
    //     $prevAnswerQuery = $this->db->select('answer')->where('id', $Id)->get('tbl_student_quiz_report');
    //     $prevAnswer = $prevAnswerQuery->row()->answer;
    
    //     $this->db->where('id', $Id);
    //     $this->db->set('answer', $answer);
    //     $this->db->set('is_correct', $isCorrect);
    //     $this->db->update('tbl_student_quiz_report');
    
    //     // Update the attempted_question in tbl_student_quiz
    //     $this->db->set('attempted_question', 'attempted_question + 1', false);
    
    //     // Calculate the change in obtained_marks
    //     $obtainedMarksChange = 0;
    //     if ($prevAnswer != $answer) {
    //         if ($isCorrect) {
    //             $obtainedMarksChange = 1; // The answer changed and is now correct
    //         } elseif ($isCorrect == 0) {
    //             $obtainedMarksChange = -1; // The answer changed from correct to incorrect
    //         }
    //     }
    
    //     // Calculate the new obtained_marks value
    //     $newObtainedMarks = 'GREATEST(obtained_marks + ' . $obtainedMarksChange . ', 0)';
    //     $this->db->set('obtained_marks', $newObtainedMarks, false);
    
    //     // Update the answer and is_correct columns in tbl_student_quiz_report
    
    //     $this->db->where('id', $student_quiz_id);
    //     $this->db->update('tbl_student_quiz');
    
    //     return $this->db->affected_rows();
    // }
    

    

    

    public function getTotalAnswerEntries($Id,$answer)
{
    $this->db->where('id', $Id);
    $this->db->where('answer', $answer);
    $this->db->from('tbl_student_quiz_report');
    return $this->db->count_all_results();
}
public function getTotalMarks($user_id, $video_id,$answer)
{
    $this->db->where('user_id', $user_id);
    $this->db->where('video_id', $video_id);
    $this->db->where('answer', $answer);
    $this->db->where('is_correct', true);
    $Query = $this->db->get('tbl_student_quiz_report');
    return $Query->result();
}

public function updateAttemptedQuestion($Id,$totalEntries)
{
    $this->db->set('attempted_question', 'attempted_question+1', false);

    //$this->db->where('user_id', $user_id);
    $this->db->where('id', $Id);
    $this->db->update('tbl_student_quiz');

    return $this->db->affected_rows();
 
}

public function updateTotalMarks($Id, $totalEntries, $isCorrect)
{
    if ($isCorrect == 1) {
        $this->db->set('obtained_marks', 'obtained_marks+1', false);
        //$this->db->where('user_id', $user_id);
        $this->db->where('id', $Id);
        $this->db->update('tbl_student_quiz');

        return $this->db->affected_rows();
    } else {
        return 0;
    }
}




public function checkAnswer($Id, $answer)
{
    $this->db->select('correct_ans');
    $this->db->from('tbl_quiz');
    $this->db->where('id', $Id);
    $query = $this->db->get();
    $row = $query->row();

    if ($row) {
        return ($row->correct_ans === $answer) ? 1 : 0;
    } else {
        return 0;
    }
}

public function updateIsCorrect($Id, $isCorrect)
{
   // $this->db->where('quiz_id', $quiz_id);
   // $this->db->where('user_id', $user_id);
    $this->db->where('id', $Id);
    $this->db->set('is_correct', $isCorrect);
    $this->db->update('tbl_student_quiz_report');
    return $this->db->affected_rows();
}

    public function GiveAnswer($AnswerData)
    {
        $this->db->insert('tbl_student_quiz_report', $AnswerData);
        return $this->db->insert_id();
    }

    

    public function addquiz($data){
        $this->db->insert('tbl_quiz', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function Insertquiz($data)
    {
       
        $this->db->insert('tbl_quiz', $data);
        $quizId = $this->db->insert_id();
        return $quizId;
    }

    public function getquiz($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_quiz');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Updatequiz($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_quiz', $data))
            return $this->db->last_query();
        else
            return false;
    }
    public function Deletequiz($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_quiz');
        if ($Query) {
            $last = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('video_id', $id)
                ->update('tbl_quiz');
            return $last;
        } else {
            return false;
        }
    }

    public function quizreport()
{
    $admin_role=$this->session->userdata('role');
    $admin_id=$this->session->userdata('admin_id');

    if($admin_role<=1){
    $this->db->select('tbl_student_quiz.*, tbl_users.name as user_name, tbl_coursevideo.title, tbl_course.name');
    $this->db->from('tbl_student_quiz');
    $this->db->join('tbl_users', 'tbl_student_quiz.user_id = tbl_users.id');
    $this->db->join('tbl_student_quiz_report', 'tbl_student_quiz_report.student_quiz_id = tbl_student_quiz.id');
    $this->db->join('tbl_quiz', 'tbl_quiz.id = tbl_student_quiz_report.quiz_id');
    $this->db->join('tbl_coursevideo', 'tbl_student_quiz.video_id = tbl_coursevideo.id');
    $this->db->join('tbl_chapter','tbl_coursevideo.chapter_id = tbl_chapter.id', 'left');
    $this->db->join('tbl_course','tbl_course.id = tbl_coursevideo.course_id');
    $this->db->where('tbl_quiz.isDeleted', false);
    $this->db->group_by('tbl_student_quiz.id');
}
else{
    $this->db->select('tbl_student_quiz.*, tbl_users.name as user_name, tbl_coursevideo.title, tbl_course.name');
    $this->db->from('tbl_student_quiz');
    $this->db->join('tbl_users', 'tbl_student_quiz.user_id = tbl_users.id');
    $this->db->join('tbl_student_quiz_report', 'tbl_student_quiz_report.student_quiz_id = tbl_student_quiz.id');
    $this->db->join('tbl_quiz', 'tbl_quiz.id = tbl_student_quiz_report.quiz_id');
    $this->db->join('tbl_coursevideo', 'tbl_student_quiz.video_id = tbl_coursevideo.id');
    $this->db->join('tbl_chapter','tbl_coursevideo.chapter_id = tbl_chapter.id', 'left');
    $this->db->join('tbl_course','tbl_course.id = tbl_coursevideo.course_id');
    $this->db->where('tbl_course.creator_id',$admin_id);
    $this->db->where('tbl_quiz.isDeleted', false);
    $this->db->group_by('tbl_student_quiz.id');
}


    $query = $this->db->get();
    // echo $this->db->last_query(); // Uncomment this for debugging purposes if needed
    // exit;                         // Uncomment this for debugging purposes if needed
    return $query->result();
}
    public function detailreport($id)
    {
        //  print_r($id);
        //  die('hello');
        $this->db->select('tbl_quiz.*,tbl_student_quiz_report.answer');
        $this->db->from('tbl_quiz');
        $this->db->join('tbl_student_quiz_report', 'tbl_quiz.id = tbl_student_quiz_report.quiz_id');
        $this->db->join('tbl_student_quiz', 'tbl_student_quiz_report.student_quiz_id = tbl_student_quiz.id');
        $this->db->where('tbl_student_quiz.id',$id);
        $this->db->where('tbl_quiz.isDeleted', false);
        $this->db->group_by('tbl_quiz.id');
        $query = $this->db->get();
        // echo $this->db->last_query(); // Uncomment this for debugging purposes if needed
        // exit;                         // Uncomment this for debugging purposes if needed
        return $query->result();

    }


    // public function Displayquiz($videoId, $user_id)
    // {
    //     $this->db->select('tbl_student_quiz.*');
    //     $this->db->from('tbl_student_quiz');
    //     $this->db->insert('tbl_quiz_student.user_id'.$user_id);
    //     $this->db->insert('tbl_quiz_student.video_id'.$videoId);
    //     $query = $this->db->get();
    //     return $query->result();    
    // }

    public function InsertStudentQuiz($videoId, $user_id, $quizdisplayCount)
    {
        $data = array(
            'user_id' => $user_id,
            'video_id' => $videoId,
            'total_question' => $quizdisplayCount,
            'total_marks' => $quizdisplayCount,
        );
        $this->db->insert('tbl_student_quiz', $data);
        return $this->db->insert_id();
        // $query = $this->db->get();
        // return $query->result();
    }

    public function InsertStudentQuizReport($data)
    {
        $this->db->insert('tbl_student_quiz_report', $data);
        return $this->db->insert_id();
    }

    // public function DisplayStudentQuizReport($videoId, $user_id)
    // {
    //     $this->db->select('tbl_quiz.*');
    //     $this->db->from('tbl_quiz');
    //     $this->db->join('tbl_student_quiz', 'tbl_student_quiz.video_id = tbl_quiz.video_id');
    //     $this->db->where('tbl_quiz.id', $id);
    //     $this->db->where('tbl_quiz.isDeleted', false);
    //     $query = $this->db->get();
    //     return $query->result();
    // }


    //   public function GetReport($user_id,$video_id,$student_quiz_id)
    // {
    //     $this->db->select('tbl_student_quiz.*,tbl_users.name');
    //     $this->db->from('tbl_student_quiz');
    //     $this->db->join('tbl_student_quiz_report', 'tbl_student_quiz.id = tbl_student_quiz_report.student_quiz_id');
    //     $this->db->join('tbl_users', 'tbl_student_quiz.user_id = tbl_users.id');
    //     $this->db->where('tbl_student_quiz_report.student_quiz_id',$student_quiz_id);
    //     $this->db->group_by('tbl_student_quiz.id');
    //     $query = $this->db->get();
    //     return $query->result(); 
        
       
    // }

    public function GetReport($user_id, $video_id = null, $student_quiz_id = null)
    {
        $this->db->select('tbl_student_quiz.*, tbl_users.name,tbl_student_quiz_report.*, tbl_quiz.*,tbl_course.reward_point,tbl_course.creator_id,tbl_course.id');
        $this->db->from('tbl_student_quiz');
        $this->db->join('tbl_student_quiz_report', 'tbl_student_quiz.id = tbl_student_quiz_report.student_quiz_id');
        $this->db->join('tbl_users', 'tbl_student_quiz.user_id = tbl_users.id');
        $this->db->join('tbl_quiz', 'tbl_student_quiz_report.quiz_id = tbl_quiz.id');
        $this->db->join('tbl_coursevideo', 'tbl_student_quiz.video_id = tbl_coursevideo.id');
        $this->db->join('tbl_course', 'tbl_coursevideo.course_id = tbl_course.id');
        $this->db->where('tbl_student_quiz.user_id', $user_id);
        if (!empty($video_id !== null)) {
        $this->db->where('tbl_student_quiz.video_id', $video_id);
        }
        if (!empty($student_quiz_id) ) {
            $this->db->where('tbl_student_quiz.id', $student_quiz_id);
        }
        $this->db->group_by('tbl_student_quiz.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function checkRewardAdded($student_quiz_id)
{
    $this->db->where('id', $student_quiz_id);
    $this->db->where('quiz_reward', 0); // Check if reward points are greater than 0
    // $this->db->group_by('tbl_student_quiz.id');
    $query = $this->db->get('tbl_student_quiz');
    return $query->result(); // Return true if reward points are already added
}

public function addRewardToUserWallet($user_id, $reward_point)
{
    if (!empty($reward_point)) {
        $this->db->where('id', $user_id);
        $this->db->set('wallet', 'wallet + ' . $reward_point, false); // Increase wallet by reward points
        $this->db->update('tbl_users');
        // echo $this->db->last_query();
        return $this->db->affected_rows() > 0; // Return true if update was successful
    }
    
    return false; // Return false if reward points are empty
}



public function addRewardToStudentQuiz($student_quiz_id, $reward_point)
{
    if (!empty($reward_point)) {
        $this->db->where('id', $student_quiz_id);
        $this->db->set('quiz_reward', $reward_point);
        $this->db->update('tbl_student_quiz');
        // $this->db->group_by('tbl_student_quiz.id');
        return $this->db->affected_rows() > 0; // Return true if update was successful
    }
    
    return false; // Return false if reward points are empty
}


public function user_quiz_reward($user_id)
{
    $this->db->select('tbl_student_quiz.*,tbl_users.name');
    $this->db->from('tbl_student_quiz');
    $this->db->join('tbl_users','tbl_student_quiz.user_id=tbl_users.id');
    $this->db->where('tbl_student_quiz.user_id',$user_id);
    $query = $this->db->get();
    return $query->result();
}


public function deductRewardFromCreatorPurchase($reward_amount, $creator_id, $course_id)
{
    if (!empty($reward_amount)) {
        $this->db->where(['creator_id' => $creator_id, 'course_id' => $course_id])
                 ->set('remaining_amount', 'remaining_amount - ' . $reward_amount, false)
                 ->update('tbl_creator_purchase');
        // echo $this->db->last_query();
        return $this->db->affected_rows() > 0; // Return true if update was successful
    }

    return false; // Return false if reward amount is empty
    // return true; // Deduction successful
}


    public function GetCertificate($user_id,$video_id)
    {
        $this->db->select('tbl_student_quiz.*,tbl_users.name,tbl_course.name as course_name') ;
        $this->db->from('tbl_student_quiz');
        $this->db->join('tbl_users', 'tbl_student_quiz.user_id=tbl_users.id');     
        $this->db->join('tbl_coursevideo', 'tbl_student_quiz.video_id=tbl_coursevideo.id');     
        $this->db->join('tbl_course', 'tbl_coursevideo.course_id=tbl_course.id');  
        $this->db->where('tbl_student_quiz.user_id', $user_id);
        $this->db->where('tbl_student_quiz.video_id', $video_id);
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();   
    }





    
    


}
