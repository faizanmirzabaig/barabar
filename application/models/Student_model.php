<?php
class Student_model extends MY_Model
{

    public function AllStudentList($school_id='')
    {
        $this->db->select('tbl_student.*,tbl_admin.name as school_name');
        $this->db->from('tbl_student');
        $this->db->join('tbl_admin','tbl_admin.id = tbl_student.school_id');
        $this->db->where('tbl_admin.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        if(!empty($school_id))
        {
            $this->db->where('tbl_student.school_id', $school_id);
        }
        $this->db->order_by('tbl_student.id', 'desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function Insert($school_id,$student_code,$first_name,$last_name,$father_name,$father_mobile,$age)
    {
        $data = [
            'school_id' =>$school_id,
            'student_code' =>$student_code,
            'first_name' =>$first_name,
            'last_name' =>$last_name,
            'father_name' =>$father_name,
            'father_mobile' =>$father_mobile,
            'age' => $age,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_student', $data);
        return $this->db->insert_id();
    }

    public function View($id)
    {        
        $this->db->from('tbl_student');
        $this->db->where('isDeleted', false);
        $this->db->where('id', $id);
        $Query = $this->db->get();
        return $Query->row();
    }

    public function Update($id,$school_id,$student_code,$first_name,$last_name,$father_name,$father_mobile,$age)
    {
        $data = [
            'school_id' =>$school_id,
            'student_code' =>$student_code,
            'first_name' =>$first_name,
            'last_name' =>$last_name,
            'father_name' =>$father_name,
            'father_mobile' =>$father_mobile,
             'age' => $age,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_student', $data);
        return $this->db->last_query();
   
    }
    
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_student');
        if ($Query){
           return true;
        }
        else
            return false;
    }

    public function ChangeStatus($status,$id)
    {
        $data = [
            'status' =>$status,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_student', $data);
        return $this->db->last_query();
   }


    public function LoginStudent($mobile_no,$student_code)
    {        
        $this->db->from('tbl_student');
        $this->db->where('isDeleted', false);
        $this->db->where('father_mobile', $mobile_no);
        $this->db->where('student_code', $student_code);
        $Query = $this->db->get();
        return $Query->row();
    }

     public function StudentByMobile($MobileNo)
    {
        // $this->db->where('isDeleted', FALSE);
        // $this->db->where('father_mobile', $MobileNo);
        // $Query = $this->db->get('tbl_student');
        // return $Query->row();

        $this->db->select('tbl_student.*,tbl_admin.name as school_name,tbl_admin.theme_color');
        $this->db->from('tbl_student');
        $this->db->join('tbl_admin','tbl_admin.id = tbl_student.school_id');
        $this->db->where('tbl_admin.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_student.father_mobile', $MobileNo);
        $this->db->order_by('tbl_student.id', 'desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->row();
    }


     public function InsertOTP($MobileNo, $OTP)
    {
        # code...
        $this->db->where('isDeleted', FALSE);
        $this->db->where('mobile_no', $MobileNo);
        $Query = $this->db->get('tbl_mobile_otp');
        $OTPRecord = $Query->row();
        if ($OTPRecord) {
            //update otp
            $data = [
                'otp' => $OTP,
                'updated_date' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $OTPRecord->id);
            if ($this->db->update('tbl_mobile_otp', $data)) {
                return $OTPRecord->id;
            } else {
                return FALSE;
            }
        } else {
            //insert otp
            $data = [
                'otp' => $OTP,
                'mobile_no' => $MobileNo
            ];
            if ($this->db->insert('tbl_mobile_otp', $data)) {
                return $this->db->insert_id();
            } else {
                return FALSE;
            }
        }
    }

    public function OTPConfirm($Id, $OTP, $MobileNo)
    {
        $this->db->where('isDeleted', FALSE);
        $this->db->where('id', $Id);
        $this->db->where('otp', $OTP);
        $this->db->where('mobile_no', $MobileNo);
        $Query = $this->db->get('tbl_mobile_otp');
        return $Query->row();
    }
  
   public function InsertAppoinment($type,$user_id,$name,$phone_no,$date,$time,$comment)
    {
        // // print_r('01-'.$month_year);
        // print_r(date('Y-m',strtotime('01-'.$month_year)));
        // die;
        $data =[
            'type'=>$type,
            'user_id'=>$user_id,
            'name'=>$name,
            'phone_no'=>$phone_no,
            // 'date'=>$date,
            'comment'=>$comment,
            'date_time' => date('Y-m-d H:i:s',strtotime($date.$time)),
            'added_date' => date('Y-m-d H:i:s'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_appoinment', $data);
       return $this->db->insert_id();
    }

   public function FetchAppionment()
    {
        $this->db->select('tbl_appoinment.*,tbl_student.first_name,tbl_student.father_name,tbl_student.last_name,tbl_appoinment_type.name as type_name');
        $this->db->from('tbl_appoinment');
        $this->db->join('tbl_student','tbl_student.id = tbl_appoinment.user_id');
        $this->db->join('tbl_appoinment_type','tbl_appoinment_type.id = tbl_appoinment.type');
        $this->db->where('tbl_appoinment.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_appoinment_type.isDeleted', false);
        $this->db->order_by('tbl_appoinment.id', 'desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

     public function AllAppoinmentType()
   {
        return $this->db->select('id,name,image')->get_where('tbl_appoinment_type', ['isDeleted'=>FALSE])->result();
   }


    public function FetchHeartRateAnlysis($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_student.last_name,tbl_heart_rate_anlysis.*');
        $this->db->from('tbl_heart_rate_anlysis');
        $this->db->join('tbl_student','tbl_heart_rate_anlysis.student_id=tbl_student.id');
        $this->db->where('tbl_heart_rate_anlysis.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_heart_rate_anlysis.student_id',$id);
        $this->db->group_by('tbl_heart_rate_anlysis.id');
        $this->db->order_by('tbl_heart_rate_anlysis.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
        
    }

     public function UpdateHeartRateAnlysis($id,$report='')
    {
        $Data =[
            'student_id'=>$id,
            'maximum_heart_rate'=>$this->input->post('maximum_heart_rate'),
            'resting_heart_rate'=>$this->input->post('resting_heart_rate'),
            'immediate_heart_rate'=>$this->input->post('immediate_heart_rate'),
            'heart_rate_analysis'=>$this->input->post('heart_rate_analysis'),
            'report'=>!empty($report)?$report:'',
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_heart_rate_anlysis',$Data);
        return $this->db->last_query();
    }

     public function FetchPrimaryFitnessComponents($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_student.last_name,tbl_primary_fitness_components.*');
        $this->db->from('tbl_primary_fitness_components');
        $this->db->join('tbl_student','tbl_primary_fitness_components.student_id=tbl_student.id');
        $this->db->where('tbl_primary_fitness_components.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_primary_fitness_components.student_id',$id);
        $this->db->group_by('tbl_primary_fitness_components.id');
        $this->db->order_by('tbl_primary_fitness_components.id','desc');
        $Query = $this->db->get();
         if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdatePrimaryFitnessComponents($id,$report='',$media='',$type='')
    {
        $Data =[
            'student_id'=>$id,
            'cardiovascular_ability'=>$this->input->post('cardiovascular_ability'),
            'muscular_ability'=>$this->input->post('muscular_ability'),
            'flexibility'=>$this->input->post('flexibility'),
            'grade'=>$this->input->post('grade'),
            'report'=>!empty($report)?$report:'',
            'media'=>!empty($media)?$media:'',
            'type'=>!empty($type)?$type:'',
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_primary_fitness_components',$Data);
        return $this->db->last_query();
    }

     public function FetchSecondaryFitnessComponents($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_student.last_name,tbl_secondary_fitness_components.*');
        $this->db->from('tbl_secondary_fitness_components');
        $this->db->join('tbl_student','tbl_secondary_fitness_components.student_id=tbl_student.id');
        $this->db->where('tbl_secondary_fitness_components.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_secondary_fitness_components.student_id',$id);
        $this->db->group_by('tbl_secondary_fitness_components.id');
        $this->db->order_by('tbl_secondary_fitness_components.id','desc');
        $Query = $this->db->get();
         if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdateSecondaryFitnessComponents($id,$report='',$media='',$type='')
    {
        $Data =[
            'student_id'=>$id,
            'balance'=>$this->input->post('balance'),
            'coordination'=>$this->input->post('coordination'),
            'agility'=>$this->input->post('agility'),
            'speed'=>$this->input->post('speed'),
            'reaction'=>$this->input->post('reaction'),
            'power'=>$this->input->post('power'),
            'grade'=>$this->input->post('grade'),
            'report'=>!empty($report)?$report:'',
            'media'=>!empty($media)?$media:'',
            'type'=>!empty($type)?$type:'',
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_secondary_fitness_components',$Data);
        return $this->db->last_query();
    }

     public function FetchBMIReport($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_bmi_report.*');
        $this->db->from('tbl_bmi_report');
        $this->db->join('tbl_student','tbl_bmi_report.student_id=tbl_student.id');
        $this->db->where('tbl_bmi_report.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_bmi_report.student_id',$id);
        $this->db->group_by('tbl_bmi_report.id');
        $this->db->order_by('tbl_bmi_report.id','desc');
        $Query = $this->db->get();
         if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdateBMIReport($id,$report='',$media='',$type='')
    {
        $Data =[
            'student_id'=>$id,
            'age'=>$this->input->post('age'),
            'height'=>$this->input->post('height'),
            'weight'=>$this->input->post('weight'),
            'result'=>$this->input->post('result'),
            'normal_range'=>$this->input->post('normal_range'),
            'grade'=>$this->input->post('grade'),
            'remark'=>$this->input->post('remark'),
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_bmi_report',$Data);
        return $this->db->last_query();
    }

      public function FetchCBCLevel($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_cbc_level.*');
        $this->db->from('tbl_cbc_level');
        $this->db->join('tbl_student','tbl_cbc_level.student_id=tbl_student.id');
        $this->db->where('tbl_cbc_level.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_cbc_level.student_id',$id);
        $this->db->group_by('tbl_cbc_level.id');
        $this->db->order_by('tbl_cbc_level.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die;
      if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdateCBCLevel($id,$report='')
    {
        $Data =[
            'student_id'=>$id,
            'report_analysis'=>$this->input->post('report_analysis'),
            'remark'=>$this->input->post('remark'),
            'grade'=>$this->input->post('grade'),
            'report'=>!empty($report)?$report:'',
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_cbc_level',$Data);
        return $this->db->last_query();
    }

     public function FetchMuscuskelotalReport($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_muscuskelotal_report.*');
        $this->db->from('tbl_muscuskelotal_report');
        $this->db->join('tbl_student','tbl_muscuskelotal_report.student_id=tbl_student.id');
        $this->db->where('tbl_muscuskelotal_report.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_muscuskelotal_report.student_id',$id);
        $this->db->group_by('tbl_muscuskelotal_report.id');
        $this->db->order_by('tbl_muscuskelotal_report.id','desc');
        $Query = $this->db->get();
        if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdateMuscuskelotalReport($id,$report='')
    {
        $Data =[
            'student_id'=>$id,
            'upper_extremity'=>$this->input->post('upper_extremity'),
            'spine'=>$this->input->post('spine'),
            'lower_extremity'=>$this->input->post('lower_extremity'),
            'grade'=>$this->input->post('grade'),
            'report'=>!empty($report)?$report:'',
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_muscuskelotal_report',$Data);
        return $this->db->last_query();
    }

     public function FetchOverallGrade($id,$flag='')
    {
        $this->db->select('tbl_student.first_name,tbl_overall_grade.*');
        $this->db->from('tbl_overall_grade');
        $this->db->join('tbl_student','tbl_overall_grade.student_id=tbl_student.id');
        $this->db->where('tbl_overall_grade.isDeleted', false);
        $this->db->where('tbl_student.isDeleted', false);
        $this->db->where('tbl_overall_grade.student_id',$id);
        $this->db->group_by('tbl_overall_grade.id');
        $this->db->order_by('tbl_overall_grade.id','desc');
        $Query = $this->db->get();
         if (!empty($flag)) {
            return $Query->row();
        }else{
           return $Query->result(); 
        }
    }

     public function UpdateOverallGrade($id)
    {
        $Data =[
            'student_id'=>$id,
            'fitness_grade'=>$this->input->post('fitness_grade'),
            'health_grade'=>$this->input->post('health_grade'),
            'added_date' => date('Y-m-d H:i:s')
        ]; 
        $this->db->insert('tbl_overall_grade',$Data);
        return $this->db->last_query();
    }
   
}
