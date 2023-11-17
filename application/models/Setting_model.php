<?php

class Setting_model extends MY_Model
{
    public function Setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $Query = $this->db->get();
        return $Query->row();
    }

    public function update($contact_us,$about_us,$terms,$mission,$policy,$faq,$youtube_link,$email_us,$terms1)
    {
        $data = ['updated_date' => date('Y-m-d H:i:s')];

        if(!empty($contact_us)){$data['contact_us']=$contact_us;}
        if(!empty($about_us)){$data['about_us']=$about_us;}
        if(!empty($terms)){$data['vision']=$terms;}
        if(!empty($mission)){$data['mission']=$mission;}
        if(!empty($policy)){$data['policy']=$policy;}
        if(!empty($email_us)){$data['email_us']=$email_us;}
        if(!empty($terms1)){$data['terms']=$terms1;}
        // if(!empty($youtube_link)){$data['youtube_link']=$youtube_link;}
        //$this->db->where('id',1);
        if($this->db->update('tbl_setting',$data))
            return $this->db->last_query();
        else 
            return false;
    }
}
