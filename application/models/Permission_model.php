<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Permission_model extends MY_Model
{
    public function List()
    {
        $this->db->select('*');
        $this->db->from('tbl_permission_list');
        $this->db->where('isDeleted', false);
        $this->db->order_by('name', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
}