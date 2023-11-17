<?php
class Adminprofile_model extends MY_Model
{
   
    public function updateprofile()
    {
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', false);

        $Query = $this->db->get();
        return $Query->row();
    }

    public function Updateadminprofile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_admin', $data);
        return $this->db->affected_rows();
    }
}