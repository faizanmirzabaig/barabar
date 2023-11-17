<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Purchase_model extends MY_Model
{
    public function PurchaseList()
    {
    $this->db->select('tbl_purchase.*,tbl_users.name');
    $this->db->from('tbl_purchase');
    $this->db->join('tbl_users','tbl_purchase.user_id=tbl_users.id');
    $this->db->where('tbl_purchase.payment',1);
    $query = $this->db->get();
    return $query->result();
    }

    public function user_purchase_list($user_id)
    {$this->db->select('tbl_purchase.*,tbl_users.name,tbl_users.wallet');
        $this->db->from('tbl_purchase');
        $this->db->join('tbl_users','tbl_purchase.user_id=tbl_users.id');
        $this->db->where('tbl_purchase.payment',1);
        $this->db->where('tbl_purchase.user_id',$user_id);
        $query = $this->db->get();
        return $query->result();

    }

    public function user_wallet($user_id)
    {
        $this->db->select('tbl_users.name,tbl_users.wallet');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.id', $user_id);
        $this->db->where('tbl_users.isDeleted', false);
        $query = $this->db->get();
        return $query->result();
    }
}
