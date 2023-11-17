<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Refer_model extends MY_Model
{
    public function AllReferList()
    {
        $this->db->select('*');
        $this->db->from('tbl_refer');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Insert($amount)
    {
        $data=[
            'amount'=>$amount,
            ];
        if($this->db->insert('tbl_refer',$data))
            return $this->db->last_query();
        else
            return false;
    
    }

    public function getRefer($id)
    {
        $Query=$this->db->where('id',$id)
                    ->get('tbl_refer');
        if($Query)
            return $Query->row();
        else   
            return false;
    }
   
   

    public function update($id,$amount)
    {
        // print_r($Banner_id);
        // print_r($img); exit;
        $data = [
            
            'updated_date' => date('Y-m-d H:i:s')
        ];

        if($amount)
            $data['amount']=$amount;
        
        $this->db->where('id',$id);
        if($this->db->update('tbl_refer',$data))
            return $this->db->last_query();
        else 
            return false;
    }

   
    public function Delete($id)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $id)
            ->update('tbl_refer');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
}
