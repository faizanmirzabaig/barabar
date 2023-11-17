
<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Course_model extends MY_Model
{
    public function ourcourse($admin_id = '', $course_id = '')
    {
        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');
        if (!empty($admin_id)) {
            $this->db->where('creator_id', $admin_id);
        }
        if (!empty($course_id)) {
            $this->db->where('tbl_course.id', $course_id);
        }

        $this->db->where('tbl_course.isDeleted', false);
        $this->db->where('tbl_course.status', 1);
        $this->db->order_by('tbl_course.sort', 'asc');
        $Query = $this->db->get();


        return $Query->result();
    }
    public function course_by_id($id){
        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');
        
        $this->db->where('tbl_course.isDeleted', false);
        $this->db->where('tbl_course.id', $id);
        $this->db->order_by('tbl_course.sort', 'asc');
        $Query = $this->db->get();
        return $Query->row();

    }

    public function List($admin_id = '')
    {
        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');

        // Filter by creator_id
        $this->db->where('creator_id', $admin_id);  // Replace '1' with the desired creator_id

        $this->db->where('tbl_course.isDeleted', false);
        $this->db->where('tbl_course.status >=', 0);
        $this->db->order_by('tbl_course.sort', 'asc');

        $Query = $this->db->get();
        return $Query->result();
    }



    public function createcourse()
    {
        // $role = $this->session->userdata('role');

        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');
        $this->db->where('tbl_course.isDeleted', false);

        // Filter by creator_id greater than 0
        $this->db->where('tbl_course.creator_id >', 1);

        // if ($role == SUPERADMIN || $role == MANAGER) {
        $this->db->where('tbl_course.status', 2);
        // }

        $this->db->order_by('tbl_course.sort', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }


    public function ListData($course_id, $id = '')
    {
        $this->db->select('tbl_coursevideo.*');
        $this->db->from('tbl_coursevideo');
        $this->db->where('tbl_coursevideo.course_id', $course_id);

        if (!empty($id)) {
            $this->db->where('tbl_coursevideo.chapter_id', $id);
        }

        $this->db->where('tbl_coursevideo.isDeleted', false);
        $this->db->order_by('tbl_coursevideo.sort', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function ViewCourse($id = '', $course_type_id = '', $status = '')
    {
        $this->db->select('tbl_course.*,count(tbl_coursevideo.id) as videocount,
        tbl_course.videos as course_video');
        $this->db->from('tbl_course');
        // $this->db->join('tbl_chapter ', 'tbl_chapter.course_id=tbl_course.id AND tbl_chapter.isDeleted=0', 'LEFT');
        $this->db->join('tbl_coursevideo', 'tbl_coursevideo.course_id=tbl_course.id AND tbl_coursevideo.isDeleted=0', 'LEFT');
        if (!empty($course_type_id)) {
            $this->db->where('tbl_course.course_type_id', $course_type_id);
        }
        if (!empty($status)) {
            $this->db->where('tbl_course.status', $status);
        }
        // $this->db->join('tbl_chapter', 'tbl_chapter.course_id=tbl_course.id');
        if (!empty($id)) {
            $this->db->where('tbl_course.id', $id);
        }
        $this->db->group_by('tbl_course.id');
        $this->db->where('tbl_course.isDeleted', false);
        // $this->db->order_by('tbl_coursevideo.sort', 'asc');
        $Query = $this->db->get();

        return $Query->result();


        // $Query = $this->db->get();
        // return $Query->result();
    }

    // public function chapterListView($id)
    // {

    //     $this->db->select('tbl_course.id,tbl_course.name as course_name,tbl_course.title as course_title,tbl_course.description as course_description, tbl_course.writer as course_writer, tbl_course.language as course_language, tbl_course.duration as course_duration, tbl_course.sort as course_serial_number,tbl_course.price as course_price,tbl_course.image as course_image,
    //     tbl_course.videos as course_video, tbl_chapter.name as chapter_name,tbl_chapter.chapter_no');
    //     $this->db->from('tbl_chapter');
    //     $this->db->join('tbl_course', 'tbl_chapter.course_id=tbl_course.id');
    //     $this->db->where('tbl_chapter.course_id', $id);
    //     $this->db->where('tbl_chapter.isDeleted', false);
    //     $this->db->order_by('tbl_chapter.sort', 'asc');
    //     $Query = $this->db->get();
    //     return $Query->result();
    // }

    public function chapterList($id)
    {
        $this->db->select('tbl_chapter.*');
        $this->db->from('tbl_chapter');
        $this->db->where('tbl_chapter.course_id', $id);
        $this->db->where('tbl_chapter.isDeleted', false);
        $this->db->order_by('tbl_chapter.name', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }



    public function ChapterVideo($id)
    {

        $this->db->select('tbl_coursevideo.*');
        $this->db->from('tbl_coursevideo');
        $this->db->join('tbl_course', 'tbl_course.id=tbl_coursevideo.course_id');
        $this->db->where('tbl_coursevideo.course_id', $id);
        $this->db->where('tbl_coursevideo.isDeleted', false);
        $this->db->order_by('tbl_coursevideo.sort', 'asc');
        $Query = $this->db->get();
        // print_r($Query->result());
        // die('i m here');
        // return $Query->result();
    }


    public function MakeLive($id, $data)
    {

        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_course', $data))
            return $this->db->last_query();
        else
            return false;
    }


    public function Insert($data)
    {
        // $data['status'] = 0;
        $this->db->insert('tbl_course', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function Insertvideo($data)
    {
        $this->db->insert('tbl_coursevideo', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function InsertCoursePurchase($data)
    {
        $this->db->insert('tbl_course_purchase', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }

    public function Insertchapter($data)
    {
        $this->db->insert('tbl_chapter', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }
    public function getSite($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_course');
        if ($Query)
            return $Query->result();
        else
            return false;
    }
    public function checkPurchase($user_id, $course_id)
    {
        $date = date('Y-m-d H:i:s');

        $this->db->where('user_id', $user_id)
            ->where('course_id', $course_id)
            ->where('expiry_date >', $date)
            ->where('isDeleted', 0); // Add this condition

        $Query = $this->db->get('tbl_course_purchase');

        if ($Query->num_rows() > 0) {
            return $Query->row();
        } else {
            return false;
        }
    }

    public function getCourseVideo($id)
    {
        $this->db->select('tbl_coursevideo.*,tbl_course.status');
        $this->db->from('tbl_coursevideo');
        // $this->db->join('tbl_chapter','tbl_coursevideo.chapter_id=tbl_chapter.id');
        $this->db->join('tbl_course', 'tbl_coursevideo.course_id=tbl_course.id');
        $Query = $this->db->where('tbl_coursevideo.id', $id)->get();
        if ($Query)
            return $Query->result();
        else
            return false;
    }
    public function getCourseId($chapter_id)
    {
        $Query = $this->db->where('id', $chapter_id)->get('tbl_chapter');
        if ($Query)
            return $Query->row();
        else
            return false;
    }


    public function getCourseChapter($id)
    {
        $Query = $this->db->where('id', $id)->get('tbl_chapter');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Update($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_course', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Updatevideo($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_coursevideo', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Updatechapter($data, $settingId)
    {
        $this->db->where('id', $settingId);
        if ($this->db->update('tbl_chapter', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_course');
        if ($Query) {
            $last_q = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('course_id', $id)
                ->update('tbl_coursevideo');

            return $last_q;
        } else {
            return false;
        }
    }
    public function Deletevideo($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_coursevideo');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }


    public function DeleteChapter($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_chapter');
        if ($Query) {
            $last = $this->db->last_query();

            $Query = $this->db->set('isDeleted', 1)
                ->where('chapter_id', $id)
                ->update('tbl_coursevideo');
            return $last;
        } else {
            return false;
        }
    }

    public function AllCreator($status)
    {
        $this->db->select('tbl_course.*,tbl_course_type.name as course_type_name,tbl_admin.first_name as admin_name ');
        $this->db->from('tbl_course');
        $this->db->join('tbl_course_type', 'tbl_course_type.id=tbl_course.course_type_id');
        $this->db->join('tbl_admin', 'tbl_admin.id=tbl_course.creator_id');

        // $this->db->join('tbl_creator', 'tbl_creator.id=tbl_course.creator_id');
        $this->db->where('tbl_course.isDeleted', false);
        $this->db->where('tbl_course.status', $status);
        $this->db->where('tbl_course.creator_id >', 0);
        $this->db->order_by('tbl_course.id', 'DESC');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function approval_pending()
    {
        $this->db->select('tbl_course.*');
        $this->db->from('tbl_course');
        // $this->db->join('tbl_creator', 'tbl_creator.id=tbl_course.creator_id');
        $this->db->where('tbl_course.isDeleted', false);
        $this->db->where('tbl_course.status', 1);
        $Query = $this->db->get();
        return $Query->num_rows();
    }

    public function ChangeStatus($id, $status, $reject_reason = '')
    {
        $data = [
            'status' => $this->input->post('status'),
            'updated_date' => date('Y-m-d H:i:s'),
            'reject_reason' => $reject_reason,
            'status' => $status,

        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_course', $data);
        return $this->db->last_query();
    }
    public function ExportCourseQuiz($id)
    {
        // $this->db->select('tbl_course.*,tbl_quiz.id,tbl_users.name as user_name,tbl_users.date_of_birth,tbl_users.pincode,tbl_users.gender,tbl_users.email,tbl_users.mobile,tbl_coursevideo.name as course_video_name,tbl_quiz.question,tbl_quiz.correct_ans,tbl_quiz.option_1,tbl_quiz.option_2,tbl_quiz.option_3,tbl_quiz.option_4,tbl_student_quiz_report.answer,tbl_student_quiz_report.is_correct');
        // $this->db->from('tbl_course');
        // $this->db->join('tbl_coursevideo', 'tbl_coursevideo.course_id=tbl_course.id');
        // $this->db->join('tbl_quiz', 'tbl_quiz.video_id=tbl_coursevideo.id');
        // $this->db->join('tbl_student_quiz', 'tbl_student_quiz.video_id=tbl_coursevideo.id');
        // $this->db->join('tbl_users', 'tbl_users.id=tbl_student_quiz.user_id');
        // $this->db->join('tbl_student_quiz_report', 'tbl_student_quiz_report.video_id=tbl_coursevideo.id');
        // $this->db->where('tbl_coursevideo.isDeleted', false);
        // $this->db->order_by('tbl_users.id');
        // $this->db->group_by('tbl_users.id');
        // $this->db->where('tbl_course.id', $id);
        // $Query = $this->db->get();
        // // return $Query->result();
        // $data=$this->db->last_query();
        // // echo ' im  here' ;
        // echo $data;
        // exit;
        // die($data);

        $this->db->select('tbl_course.*,tbl_quiz.id,tbl_users.name as user_name,tbl_users.date_of_birth,tbl_users.pincode,tbl_users.gender,tbl_users.email,tbl_users.mobile,tbl_coursevideo.name as course_video_name,tbl_quiz.question,tbl_quiz.correct_ans,tbl_quiz.option_1,tbl_quiz.option_2,tbl_quiz.option_3,tbl_quiz.option_4,tbl_student_quiz_report.answer,tbl_student_quiz_report.is_correct');
        $this->db->from('tbl_student_quiz_report');
        $this->db->join('tbl_users', 'tbl_users.id=tbl_student_quiz_report.user_id');
        $this->db->join('tbl_coursevideo', 'tbl_coursevideo.id=tbl_student_quiz_report.video_id');
        $this->db->join('tbl_course', 'tbl_course.id=tbl_coursevideo.course_id');
        $this->db->join('tbl_quiz', 'tbl_quiz.id=tbl_student_quiz_report.quiz_id');
        $this->db->where('tbl_coursevideo.isDeleted', false);
        $this->db->order_by('tbl_users.id');
        // $this->db->group_by('tbl_users.id');
        $this->db->where('tbl_course.id', $id);
        $Query = $this->db->get();
        return $Query->result();
        // $data=$this->db->last_query();
        // echo ' im  here' ;
        // echo $data;
        // exit;



    }
    //     public function UserView($user_data, $user_id, $course_type_id = '')
    // {
    //     $course_type_sql = '';
    //     if (!empty($course_type_id)) {
    //         $course_type_sql = 'tbl_course.course_type_id=' . $course_type_id . ' AND';
    //     }

    //     $Query = $this->db->query('SELECT tbl_course.*,count(tbl_coursevideo.id) as videocount,tbl_course.videos as course_video FROM tbl_course LEFT JOIN tbl_coursevideo ON tbl_coursevideo.course_id=tbl_course.id AND tbl_coursevideo.isDeleted=0 WHERE tbl_course.status='.APPROVED.' AND '.$course_type_sql.' tbl_course.isDeleted=0 AND (tbl_course.view=0 OR ("' . $user_data['age'] . '" BETWEEN tbl_course.min_age AND tbl_course.max_age AND ( tbl_course.gender=2 OR tbl_course.gender="' . $user_data['gender'] . '") AND (tbl_course.pincode="" OR FIND_IN_SET(' . $user_data['pincode'] . ',tbl_course.pincode)) AND (tbl_course.occupation_id="" OR tbl_course.occupation_id=' . $user_data['occupation_id'] . ') AND (tbl_course.hobby_id="" OR tbl_course.hobby_id=' . $user_data['hobby_id'] . ' AND (tbl_course.education_id="" OR tbl_course.education_id=' . $user_data['education_id'] . ') AND (tbl_course.heard_about_us_id="" OR tbl_course.heard_about_us_id=' . $user_data['heard_about_us_id'] . ') AND (tbl_course.area_of_interest_id="" OR tbl_course.area_of_interest_id=' . $user_data['area_of_interest_id'] . ')))) GROUP BY tbl_course.id ORDER BY tbl_course.min_age DESC');
    //     $data=$this->db->last_query();
    //     // echo $data;
    //     return $Query->result();

    // }

    public function UserView($user_data, $user_id, $course_type_id = '')
    {
        $course_type_sql = '';
        if (!empty($course_type_id)) {
            $course_type_sql = 'tbl_course.course_type_id=' . $course_type_id . ' AND';
        }
        // print_r($user_data);
        // exit;
        $Query = $this->db->query('SELECT tbl_course.*,count(tbl_coursevideo.id) as videocount,tbl_course.videos as course_video FROM tbl_course LEFT JOIN tbl_coursevideo ON tbl_coursevideo.course_id=tbl_course.id AND tbl_coursevideo.isDeleted=0 WHERE tbl_course.status=' . APPROVED . ' AND ' . $course_type_sql . ' tbl_course.isDeleted=0 AND (tbl_course.view=0 OR ("' . $user_data['age'] . '" BETWEEN tbl_course.min_age AND tbl_course.max_age AND ( tbl_course.gender=2 OR tbl_course.gender="' . $user_data['gender'] . '") AND (tbl_course.pincode="0" OR FIND_IN_SET(' . $user_data['pincode'] . ',tbl_course.pincode)) AND (tbl_course.occupation_id="0" OR tbl_course.occupation_id=' . $user_data['occupation_id'] . ') AND (tbl_course.hobby_id="0" OR tbl_course.hobby_id=' . $user_data['hobby_id'] . ' AND (tbl_course.education_id="0" OR tbl_course.education_id=' . $user_data['education_id'] . ') AND (tbl_course.heard_about_us_id="0" OR tbl_course.heard_about_us_id=' . $user_data['heard_about_us_id'] . ') AND (tbl_course.area_of_interest_id="0" OR tbl_course.area_of_interest_id=' . $user_data['area_of_interest_id'] . ')))) GROUP BY tbl_course.id ORDER BY tbl_course.min_age DESC');
        $data = $this->db->last_query();
        //  echo $data;
        return $Query->result();
    }

    // public function ViewPerformanceReport($id)
    // {
    //     $this->db->select('tbl_course.name, tbl_student_quiz.id, tbl_student_quiz.total_marks, tbl_student_quiz.obtained_marks, (tbl_student_quiz.obtained_marks / tbl_student_quiz.total_marks) * 100 AS percentage');
    //     $this->db->from('tbl_course');
    //     $this->db->join('tbl_chapter', 'tbl_course.id = tbl_chapter.course_id');
    //     $this->db->join('tbl_coursevideo', 'tbl_chapter.id = tbl_coursevideo.chapter_id');
    //     $this->db->join('tbl_quiz', 'tbl_coursevideo.id = tbl_quiz.video_id');
    //     $this->db->join('tbl_student_quiz_report', 'tbl_quiz.id = tbl_student_quiz_report.quiz_id');
    //     $this->db->join('tbl_student_quiz', 'tbl_student_quiz_report.student_quiz_id = tbl_student_quiz.id');

    //     $this->db->where('tbl_course.id', $id);
    //     $this->db->where('tbl_course.isDeleted', false);
    //     $this->db->group_by('tbl_student_quiz.id');

    //     // Calculate the average percentage using AVG() function
    //    // $this->db->select_avg('(tbl_student_quiz.obtained_marks / tbl_student_quiz.total_marks) * 100', 'average_percentage');

    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function ViewPerformanceReport($id, $user_id)
    {
        $this->db->select('tbl_course.name, tbl_student_quiz.id, tbl_student_quiz.total_marks, tbl_student_quiz.obtained_marks,tbl_student_quiz.total_question,tbl_student_quiz.attempted_question,tbl_student_quiz.updated_at, (tbl_student_quiz.obtained_marks / tbl_student_quiz.total_marks) * 100 AS percentage');
        $this->db->from('tbl_course');
        // $this->db->join('tbl_chapter', 'tbl_course.id = tbl_chapter.course_id', 'LEFT');
        $this->db->join('tbl_coursevideo', 'tbl_course.id = tbl_coursevideo.course_id', 'LEFT');
        $this->db->join('tbl_quiz', 'tbl_coursevideo.id = tbl_quiz.video_id');
        $this->db->join('tbl_student_quiz_report', 'tbl_quiz.id = tbl_student_quiz_report.quiz_id');
        $this->db->join('tbl_student_quiz', 'tbl_student_quiz_report.student_quiz_id = tbl_student_quiz.id');

        $this->db->where('tbl_course.id', $id);
        $this->db->where('tbl_student_quiz.user_id', $user_id);
        $this->db->where('tbl_course.isDeleted', false);
        $this->db->group_by('tbl_student_quiz.id');

        $query = $this->db->get();
        // echo $this->db->last_query();
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


    //     public function UpdateCreatorCourse($data, $course_id)
    // {
    //     // Update tbl_course table
    //     $this->db->where('id', $course_id);

    //     $this->db->update('tbl_course', $data);


    //     return true; // Return true if the update is successful
    // }

    public function UpdateCreatorCourse($data, $course_id)
    {
        // Update tbl_course table
        // print_r($data);
        // die('im here');
        $this->db->where('id', $course_id);
        $this->db->set('status', 2); // Set the status to 2
        $this->db->update('tbl_course', $data);
        return true;
        // if ($this->db->update('tbl_course', $data)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    public function UpdateCreatorVideo($data, $course_id,$video_id)
    {
        $this->db->where('id', $video_id);
        $this->db->where('course_id', $course_id);
        if ($this->db->update('tbl_coursevideo', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateCreatorChapter($data, $course_id,$chapter_id)
    {

        $this->db->where('id', $chapter_id);
        $this->db->where('course_id', $course_id);
        $this->db->update('tbl_chapter', $data);
        return true;
       
    }
    public function ChangeStatusSucces($id)
    {
        $data = [
            'updated_date' => date('Y-m-d H:i:s'),
            'status' => INCOMPLETE,
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_course', $data);
        return;
    }

    public function ExportTransaction($id)
    {
        $this->db->select('tbl_course.name as course_name,tbl_admin.first_name as creator_name,tbl_course_purchase.*,tbl_users.name as user_name,tbl_creator_purchase.*,tbl_student_quiz.quiz_reward');
        $this->db->from('tbl_creator_purchase');
        $this->db->join('tbl_admin','tbl_creator_purchase.creator_id=tbl_admin.id');
        $this->db->join('tbl_course','tbl_creator_purchase.course_id=tbl_course.id');
        $this->db->join('tbl_course_purchase','tbl_course_purchase.course_id=tbl_course.id');
        $this->db->join('tbl_users','tbl_course_purchase.user_id=tbl_users.id');
        $this->db->join('tbl_student_quiz','tbl_users.id=tbl_student_quiz.user_id','left');
        $this->db->where('tbl_course.id',$id);
        $query = $this->db->get();
        // echo $this->db->last_query();
        return  $query->result();

    }
}
