<?php
class Donation_model extends MY_Model
{
    public function donationlist()
    {
        $this->db->select('tbl_donation.*,tbl_users.name');
        $this->db->from('tbl_donation');
        $this->db->join('tbl_users','tbl_donation.user_id=tbl_users.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function user_donation_list($user_id)
    {
        $this->db->select('tbl_donation.*,tbl_users.name');
        $this->db->from('tbl_donation');
        $this->db->join('tbl_users','tbl_donation.user_id=tbl_users.id');
        $this->db->where('tbl_donation.user_id',$user_id);
        $query = $this->db->get();
        return $query->result();
    }
}