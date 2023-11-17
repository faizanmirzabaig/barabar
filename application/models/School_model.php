<?php
class School_model extends MY_Model
{

    public function AllSchoolList()
    {
        $this->db->select('tbl_admin.*');
        $this->db->from('tbl_admin');
        $this->db->where('tbl_admin.isDeleted', false);
        $this->db->where('tbl_admin.role', TRUE);
        $this->db->order_by('tbl_admin.id', 'desc');
        $Query = $this->db->get();
        // echo $this->db->last_query();exit;
        return $Query->result();
    }

    public function Insert($name,$logo,$email_id,$password,$contact_name,$mobile,$theme_color)
    {
        $data =[
            'name'=>$name,
            'logo'=>$logo,
            'email_id'=>$email_id,
            'password'=>md5($password),
            'sw_password'=>$password,
            'contact_name' => $contact_name,
            'mobile'=>$mobile,
            'theme_color'=>$theme_color,
            'role'=>1,
            'created_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_admin', $data);
       return $this->db->insert_id();
    }

    public function View($id)
    {        
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', false);
        $this->db->where('id', $id);
        $Query = $this->db->get();
        return $Query->row();
    }

    public function Update($client_id,$name,$logo,$email_id,$contact_name,$mobile,$theme_color)
    {
        $data =[
            'name'=>$name,
            'email_id'=>$email_id,
            'contact_name' => $contact_name,
            'mobile'=>$mobile,
            'theme_color'=>$theme_color,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        // if(!empty($password)){
        //      $data['sw_password']= $password;
        //       $data['password']= md5($password);
        //     // $data =[
        //     //    'password'=>md5($password),
        //     //    'sw_password'=>$password,
        //     // ];
        // }
        if(!empty($logo)){
            $data['logo']= $logo;
        }
        $this->db->where('id',$client_id);
        $this->db->update('tbl_admin', $data);
        // return $this->db->affected_rows();
        return true;
    } 
    
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_admin');
        if ($Query){
           return true;
        }
        else
            return false;
    }
}
