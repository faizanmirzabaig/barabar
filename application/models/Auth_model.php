<?php
class Auth_model extends MY_Model
{
    public function login($username,$password)
    {
        $Query = $this->db->select('id,role,email_id,first_name,last_name,loged_in,status,permissions')
                 ->where('isDeleted',false)
                 ->where('email_id',$username)
                 ->where('sw_password',$password)
                 ->where('loged_in','1')
                 ->get($this->TBL_ADMIN);           
        return $Query->row();
    }
}
