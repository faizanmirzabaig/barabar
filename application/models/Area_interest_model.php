<?php
class Area_interest_model extends MY_Model
{
    public function AllAreaInterest()
    {
        $this->db->select('*');
        $this->db->from('tbl_area_interest');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function Insert($data)
    {
        //   $data['occupation_name'] = 1;
        $this->db->insert('tbl_area_interest', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }
    public function getAreaInterst($id)
    {
        $Query = $this->db->where('id', $id)
            ->get('tbl_area_interest');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Update($data)
    {
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_area_interest', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_area_interest');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
