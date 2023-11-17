<?php
class Notepad_model extends MY_Model
{
    private $table;

    public function __construct()
    {
        $this->table = 'tbl_notepad';
    }

    public function View($id = '', $user_id = '')
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        if (!empty($user_id)) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get($this->table);
        return $Query->result();
    }

    public function Insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function Update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
        return true;
    }


    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update($this->table);
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
