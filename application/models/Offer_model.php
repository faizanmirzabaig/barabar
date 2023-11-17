<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Offer_model extends MY_Model
{
    public function AllOffer()
    {
        $this->db->select('*');
        $this->db->from('tbl_offer');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function CheckPromoExist($promocode)
    {
        $this->db->select('*');
        $this->db->from('tbl_offer');
        $this->db->where('promocode',$promocode);
        $this->db->where('isDeleted', false);
        // $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function CheckUpdatePromoExist($promocode,$offer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_offer');
        $this->db->where_not_in('id',$offer_id);
        $this->db->where('promocode',$promocode);
        $this->db->where('isDeleted', false);
        // $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insert($promocode,$use_per_user,$amount,$valid_from,$valid_till)
    {
        $data=[
            'promocode'=>$promocode,
            'use_per_user'=>$use_per_user,
            'amount'=>$amount,
            'valid_from'=>$valid_from,
            'valid_till'=>$valid_till,
            ];
        if($this->db->insert('tbl_offer',$data))
            return $this->db->last_query();
        else
            return false;
    
    }

    public function getOffer($id)
    {
        $Query=$this->db->where('id',$id)
                    ->get('tbl_offer');
        if($Query)
            return $Query->row();
        else   
            return false;
    }
   
    public function getOfferByCode($code)
    {
        $Query=$this->db->where('coupoun_code',$code)
                    ->where('isDeleted',false)
                    ->get('tbl_coupoun');
        if($Query)
            return $Query->row();
        else   
            return false;
    }

    public function update($offer_id,$promocode,$use_per_user,$amount,$valid_from,$valid_till)
    {
        $data=[
            'promocode'=>$promocode,
            'use_per_user'=>$use_per_user,
            'amount'=>$amount,
            'valid_from'=>$valid_from,
            'valid_till'=>$valid_till,
            ];

        $this->db->where('id',$offer_id);
        if($this->db->update('tbl_offer',$data))
            return $this->db->last_query();
        else 
            return false;
    }

   
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_offer');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
