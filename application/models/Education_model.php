<?php
class Education_model extends MY_Model
{
    public function AllEducationList()
    {
        $this->db->select('*');
        $this->db->from('tbl_education');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function Insert($data)
    {
        //   $data['occupation_name'] = 1;
        $this->db->insert('tbl_education', $data);
        $serviceId =  $this->db->insert_id();
        return $serviceId;
    }
    public function getOccupation($id)
    {
        $Query = $this->db->where('id', $id)
            ->get('tbl_education');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function Update($data)
    {
        $this->db->where('id', $data['id']);
        if ($this->db->update('tbl_education', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_education');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
