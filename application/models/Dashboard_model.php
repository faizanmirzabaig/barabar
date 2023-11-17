<?php
class Dashboard_model extends MY_Model
{

    public function FetchDayShiftGaurd($shift_id)
    {
       
        $this->db->select('tbl_site_guards_mapping.user_id,tbl_site_guards_mapping.site_id,tbl_sites.name as site_name,count("tbl_users.id") as user_count, (select count(id) from tbl_attendance where isDeleted=0 and date(`added_date`)=" '.date('Y-m-d').' " and user_id=tbl_site_guards_mapping.user_id and shift_id='.$shift_id.' ) as attendance_count ');
        $this->db->from('tbl_site_guards_mapping');
        $this->db->join('tbl_sites','tbl_site_guards_mapping.site_id=tbl_sites.id');
        $this->db->join('tbl_users','tbl_site_guards_mapping.user_id=tbl_users.id');
        // $this->db->join('tbl_attendance', 'tbl_site_guards_mapping.user_id=tbl_attendance.user_id and tbl_site_guards_mapping.site_id=tbl_attendance.site_id and tbl_attendance.isDeleted=0 and tbl_attendance.status= 0 and tbl_attendance.shift_id='.$shift_id.' and and tbl_attendance.added_date="'.date('Y-m-d H:i:s').' " ','left');
        $this->db->where('tbl_site_guards_mapping.isDeleted', false);
        $this->db->where('tbl_sites.isDeleted', false);
        $this->db->where('tbl_site_guards_mapping.shift_id',$shift_id);
        $this->db->group_by('tbl_site_guards_mapping.site_id');
        $this->db->order_by('tbl_site_guards_mapping.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function FetchGeoFancyGaurd($shift_id)
    {       
        $this->db->select('IF(sum(tbl_geo_fancy.count) IS NULL,0,sum(tbl_geo_fancy.count)) AS count,count(tbl_geo_fancy.id) as total_count,tbl_users.name,tbl_users.mobile,tbl_attendance.id,tbl_site_guards_mapping.user_id,tbl_site_guards_mapping.site_id,tbl_sites.name as site_name,tbl_supervisor.mobile as supervisor_mobile,tbl_supervisor.name as supervisor_name,');
        $this->db->from('tbl_site_guards_mapping');
        $this->db->join('tbl_sites','tbl_site_guards_mapping.site_id=tbl_sites.id');
        $this->db->join('tbl_attendance', 'tbl_site_guards_mapping.user_id=tbl_attendance.user_id and tbl_site_guards_mapping.site_id=tbl_attendance.site_id','left');
        $this->db->join('tbl_geo_fancy', 'tbl_geo_fancy.attendance_id=tbl_attendance.id and DATE(tbl_geo_fancy.added_date)="'.date('Y-m-d').'" ','left');
        $this->db->join('tbl_users','tbl_geo_fancy.user_id=tbl_users.id');
        $this->db->join('tbl_supervisor_guards_mapping','tbl_geo_fancy.user_id=tbl_supervisor_guards_mapping.user_id');
        $this->db->join('tbl_supervisor','tbl_supervisor.id=tbl_supervisor_guards_mapping.supervisor_id');
        $this->db->where('tbl_site_guards_mapping.isDeleted', false);
        $this->db->where('tbl_sites.isDeleted', false);
        $this->db->where('tbl_attendance.shift_id',$shift_id);
        $this->db->where('tbl_site_guards_mapping.shift_id',$shift_id);
        $this->db->group_by('tbl_site_guards_mapping.id');
        $this->db->order_by('tbl_site_guards_mapping.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function FetchGeoFancyGaurdDetails($shift_id)
    {       
        $this->db->select('IF(sum(tbl_geo_fancy.count) IS NULL,0,sum(tbl_geo_fancy.count)) AS count,count(tbl_geo_fancy.id) as total_count,tbl_users.name,tbl_users.mobile,tbl_attendance.id,tbl_site_guards_mapping.user_id,tbl_site_guards_mapping.site_id,tbl_sites.name as site_name,tbl_supervisor.mobile as supervisor_mobile,tbl_supervisor.name as supervisor_name,tbl_geo_fancy.added_date');
        $this->db->from('tbl_site_guards_mapping');
        $this->db->join('tbl_sites','tbl_site_guards_mapping.site_id=tbl_sites.id');
        $this->db->join('tbl_attendance', 'tbl_site_guards_mapping.user_id=tbl_attendance.user_id and tbl_site_guards_mapping.site_id=tbl_attendance.site_id','left');
        $this->db->join('tbl_geo_fancy', 'tbl_geo_fancy.attendance_id=tbl_attendance.id and DATE(tbl_geo_fancy.added_date)="'.date('Y-m-d').'" ','left');
        $this->db->join('tbl_users','tbl_geo_fancy.user_id=tbl_users.id');
        $this->db->join('tbl_supervisor_guards_mapping','tbl_geo_fancy.user_id=tbl_supervisor_guards_mapping.user_id');
        $this->db->join('tbl_supervisor','tbl_supervisor.id=tbl_supervisor_guards_mapping.supervisor_id');
        $this->db->where('tbl_site_guards_mapping.isDeleted', false);
        $this->db->where('tbl_sites.isDeleted', false);
        $this->db->where('tbl_attendance.shift_id',$shift_id);
        $this->db->where('tbl_site_guards_mapping.shift_id',$shift_id);
        $this->db->group_by('tbl_geo_fancy.id');
        $this->db->order_by('tbl_geo_fancy.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }
    
    public function FetchTotalGaurdDetails($shift_id)
    {
        $this->db->select('tbl_users.id as user_id,tbl_users.name as user_name,tbl_users.mobile,tbl_sites.name as site_name,tbl_shift.name as shift_name,tbl_shift.from_time,tbl_shift.to_time,tbl_supervisor.mobile as supervisor_mobile,tbl_supervisor.name as supervisor_name');
        $this->db->from('tbl_site_guards_mapping');
        $this->db->join('tbl_users','tbl_site_guards_mapping.user_id=tbl_users.id');
        $this->db->join('tbl_sites','tbl_site_guards_mapping.site_id=tbl_sites.id');
        $this->db->join('tbl_shift','tbl_site_guards_mapping.shift_id=tbl_shift.id');
        $this->db->join('tbl_supervisor_guards_mapping','tbl_users.id=tbl_supervisor_guards_mapping.user_id','left');
        $this->db->join('tbl_supervisor','tbl_supervisor.id=tbl_supervisor_guards_mapping.supervisor_id','left');
        $this->db->where('tbl_shift.isDeleted', false);
        $this->db->where('tbl_users.isDeleted', false);
        $this->db->where('tbl_sites.isDeleted', false);
        $this->db->where('tbl_site_guards_mapping.isDeleted', false);
        // $this->db->where('tbl_supervisor_guards_mapping.isDeleted', false);
        // $this->db->where('tbl_supervisor.isDeleted', false);
        $this->db->where('tbl_site_guards_mapping.shift_id',$shift_id);
        $this->db->group_by('tbl_users.id');
        $this->db->order_by('tbl_users.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function FetchPresentGaurdDetails($shift_id,$date='')
    {
        $this->db->select('tbl_users.id as user_id,tbl_users.name as user_name,tbl_users.mobile,tbl_sites.name as site_name,tbl_shift.name as shift_name,tbl_shift.from_time,tbl_shift.to_time,tbl_supervisor.mobile as supervisor_mobile,tbl_supervisor.name as supervisor_name,tbl_attendance.in_selfie,tbl_attendance.punch_in,tbl_attendance.id as attendance_id');
        $this->db->from('tbl_attendance');
        $this->db->join('tbl_site_guards_mapping', 'tbl_attendance.user_id=tbl_site_guards_mapping.user_id');
        $this->db->join('tbl_users','tbl_attendance.user_id=tbl_users.id');
        $this->db->join('tbl_sites','tbl_attendance.site_id=tbl_sites.id');
        $this->db->join('tbl_shift','tbl_attendance.shift_id=tbl_shift.id');
        $this->db->join('tbl_supervisor_guards_mapping','tbl_users.id=tbl_supervisor_guards_mapping.user_id','left');
        $this->db->join('tbl_supervisor','tbl_supervisor.id=tbl_supervisor_guards_mapping.supervisor_id','left');
        if(!empty($date)){
            $this->db->where('DATE(tbl_attendance.added_date)', $date);
        }else{
            $this->db->where('DATE(tbl_attendance.added_date)', date('Y-m-d'));
        }
        
        $this->db->where('tbl_attendance.isDeleted', false);
        $this->db->where('tbl_shift.isDeleted', false);
        $this->db->where('tbl_users.isDeleted', false);
        $this->db->where('tbl_sites.isDeleted', false);
        // $this->db->where('tbl_supervisor_guards_mapping.isDeleted', false);
        // $this->db->where('tbl_supervisor.isDeleted', false);
        // $this->db->where('tbl_site_guards_mapping.isDeleted', false);
        $this->db->where('tbl_attendance.shift_id',$shift_id);
        $this->db->group_by('tbl_users.id');
        $this->db->order_by('tbl_users.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function FetchGaurdSelfie($attendance_id)
    {
       
        $this->db->select('tbl_selfie.selfie,tbl_selfie.added_date,tbl_users.name as user_name ');
        $this->db->from('tbl_selfie');
        $this->db->join('tbl_users','tbl_selfie.user_id=tbl_users.id');
        // $this->db->join('tbl_attendance', 'tbl_site_guards_mapping.user_id=tbl_attendance.user_id and tbl_site_guards_mapping.site_id=tbl_attendance.site_id and tbl_attendance.isDeleted=0 and tbl_attendance.status= 0 and tbl_attendance.shift_id='.$shift_id.' and and tbl_attendance.added_date="'.date('Y-m-d H:i:s').' " ','left');
        $this->db->where('tbl_selfie.isDeleted', false);
        $this->db->where('tbl_users.isDeleted', false);
        $this->db->where('tbl_selfie.attendace_id',$attendance_id);
        $this->db->group_by('tbl_selfie.id');
        $this->db->order_by('tbl_selfie.id','desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function getallusers($admin_id='')
    {
        $admin_role=$this->session->userdata('role');
        if($admin_role<=1){
        $this->db->select('tbl_users.*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.isDeleted', false);
        // $this->db->where('tbl_admin.id', $admin_id);
        $this->db->order_by('tbl_users.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
        // $Query = $this->db->select('tbl_users.*')
        //     ->from('tbl_users')
        //     ->where('tbl_users.isDeleted', false)
           
        //     ->order_by('tbl_users.id', 'desc')
        //     ->get();
        // return $Query->result();
        }else{
        $this->db->select('tbl_course.creator_id,tbl_course.id as tbl_course_id,tbl_course_purchase.course_id,tbl_admin.id as admin_id,tbl_users.*');
        $this->db->from('tbl_course');
        $this->db->join('tbl_course_purchase', 'tbl_course.id = tbl_course_purchase.course_id');
        $this->db->join('tbl_admin', 'tbl_course.creator_id = tbl_admin.id');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_course_purchase.user_id');
        $this->db->where('tbl_admin.id', $admin_id);
        $this->db->where('tbl_users.isDeleted', false);
        $this->db->order_by('tbl_users.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
        }
        

    }

    public function getallcourses($admin_id='')
    {
        $admin_role=$this->session->userdata('role');
        if($admin_role<=1){
        $Query = $this->db->select('tbl_course.*')
            ->from('tbl_course')
            ->where('tbl_course.isDeleted', false)
            // ->where('tbl_admin.id', $admin_id)
            ->order_by('tbl_course.id', 'desc')
            ->get();
        return $Query->result();
    }else{
        $Query = $this->db->select('tbl_course.*,tbl_admin.id as admin_id')
            ->from('tbl_course')
            // ->join('tbl_course_purchase', 'tbl_course_purchase.course_id=tbl_course.id')
            ->join('tbl_admin', 'tbl_course.creator_id=tbl_admin.id')
            ->where('tbl_course.isDeleted', false)
            // ->where('tbl_course.status', APPROVED)
            ->where_not_in('tbl_course.status', PAYMENT_PEND)
            ->where_not_in('tbl_course.status', PENDING)
            ->where('tbl_admin.id', $admin_id)
            ->order_by('tbl_course.id', 'desc')
            ->get();
        return $Query->result();
            
        }
        
    }

    public function getcoursepurchase($admin_id='')
    {
        $admin_role=$this->session->userdata('role');
        if($admin_role<=1){
        $Query = $this->db->select('tbl_course_purchase.*')
            ->from('tbl_course_purchase')
            
            ->where('tbl_course_purchase.isDeleted', false)
            // ->where('tbl_admin.id', $admin_id)
            ->order_by('tbl_course_purchase.id', 'desc')
            ->get();
        return $Query->result();
    }else{
        $Query = $this->db->select('tbl_course_purchase.*,tbl_course_purchase.course_id,tbl_admin.id as admin_id,tbl_users.id')
            ->from('tbl_course_purchase')
            ->join('tbl_course', 'tbl_course_purchase.course_id=tbl_course.id')
            ->join('tbl_users', 'tbl_course_purchase.user_id=tbl_users.id')
            ->join('tbl_admin', 'tbl_course.creator_id=tbl_admin.id')
            ->where('tbl_course_purchase.isDeleted', false)
            ->where('tbl_admin.id', $admin_id)
            ->order_by('tbl_course_purchase.id', 'desc')
            ->get();
        return $Query->result();
        }
    }

    public function getcreator()
    {
        $Query = $this->db->select('tbl_admin.*')
            ->from('tbl_admin')
            ->where('tbl_admin.role', 2)
            ->where('tbl_admin.isDeleted', false)
            ->order_by('tbl_admin.id', 'desc')
            ->get();
        return $Query->result();
    }

    public function getmanagers()
    {
        $Query = $this->db->select('tbl_admin.*')
            ->from('tbl_admin')
            ->where('tbl_admin.role', 1)
            ->where('tbl_admin.isDeleted', false)
            ->order_by('tbl_admin.id', 'desc')
            ->get();
        return $Query->result();
    }
}