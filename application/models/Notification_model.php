<?php
class Notification_model extends MY_Model
{

    public function AllNotificationList()
    {
        $this->db->select('tbl_notification.*');
        $this->db->from('tbl_notification');
        $this->db->where('tbl_notification.isDeleted', false);
        $this->db->order_by('tbl_notification.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insert($name)
    {
        $data =[
            'name'=>$name,
            'added_date' => date('Y-m-d H:i:s'),
			'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_notification', $data);
       return $this->db->insert_id();
    }

    public function View($id)
    {        
        $this->db->from('tbl_notification');
        $this->db->where('isDeleted', false);
        $this->db->where('id', $id);
        $Query = $this->db->get();
        return $Query->row();
    }

    public function Update($id,$name)
    {
        $data =[
            'name'=>$name,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id',$id);
        $this->db->update('tbl_notification', $data);
        return true;
    } 
    
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_notification');
        if ($Query){
           return true;
        }
        else
            return false;
    }
}
