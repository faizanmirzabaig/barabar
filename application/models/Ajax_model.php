<?php
class Ajax_model extends MY_Model
{
    public function DeleteRecord($RecordId, $Table)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date("Y-m-d H:i:s")
        ];
        $this->db->where('id', $RecordId);
        $this->db->update($Table, $data);
        return $this->db->last_query();
    }

    public function Check_exsiting($id, $type, $Columename, $ColumeValue)
    {
        $this->db->where('isDeleted', FALSE);
        if ($id) {
            $this->db->where('id!=', $id);
        }
        $this->db->where($Columename, $ColumeValue);
        $Query  = $this->db->get($type);
        return $Query->num_rows();
    }
    public function Check_exsiting_admin_email($email_id, $id = '')
    {
        // die($id);
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', FALSE);
        $this->db->where('email_id', $email_id);
        if (!empty($id)) {
            $this->db->where('id!=', $id);
        }
        $Query  = $this->db->get();
        return $Query->num_rows();


        // if ($num_results >0 ) {
        //     // Email already exists
        //     return true;
        // } else {
        //     // Email doesn't exist, proceed with the insertion
        //     echo 'true';
        // }
    }

    public function user_on_change($pincode = '', $min_age = '', $max_age = '', $male = '', $female = '', $occupation = '', $education = '', $hobby = '', $heard_about_us = '', $area_of_interest = '')
    {
        //         $Query = $this->db->query('SELECT tbl_users.* 
        //         FROM tbl_users 
        //         WHERE tbl_users.isDeleted = 0 
        //         AND (YEAR(CURDATE()) - YEAR(date_of_birth)) BETWEEN ' . $min_age . ' AND ' . $max_age . '
        //         AND 
        // ');
        $this->db->select('tbl_users.*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.isDeleted',false);
        if ($pincode) {
            $this->db->where_in("pincode", $pincode);
        }
        if ($min_age && $max_age) {
            $this->db->where('(YEAR(CURDATE()) - YEAR(date_of_birth)) BETWEEN ' . $min_age . ' AND ' . $max_age);
        }
        if ($male || $female) {
            $this->db->group_start();
            if ($male) {
                $this->db->or_where('tbl_users.gender', 'male');
            }
            if ($female) {
                $this->db->or_where('tbl_users.gender', 'female');
            }
            $this->db->group_end();
        }
        if ($occupation) {
            $this->db->where('tbl_users.occupation_id', $occupation);
        }
        if ($education) {
            $this->db->where('tbl_users.education_id', $education);
        }
        if ($hobby) {
            $this->db->where('tbl_users.hobby_id', $hobby);
        }
        if ($heard_about_us) {
            $this->db->where('tbl_users.heard_about_us_id', $heard_about_us);
        }
        if ($area_of_interest) {
            $this->db->where('tbl_users.area_of_interest_id', $area_of_interest);
        }
        $Query  = $this->db->get();
        $data = $this->db->last_query();
        // echo $data;
        echo $Query->num_rows();



    }
}
