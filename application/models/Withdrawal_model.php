<?php
class Withdrawal_model extends MY_Model
{
    public function WithDrawal_list($status,$startDate="", $endDate="")
    {
        $this->db->select('tbl_withdrawal_log.*,tbl_users.name as user_name,tbl_users.mobile as user_mobile,tbl_users.bank_detail,tbl_users.adhar_card,tbl_users.upi');
        $this->db->from('tbl_withdrawal_log');
        $this->db->join('tbl_users', 'tbl_users.id=tbl_withdrawal_log.user_id');
            // filter
        if(!empty($startDate)) {
            $startDate = date('Y-m-d 00:00:00', strtotime($startDate));
            $endDate = date('Y-m-d 23:59:59', strtotime($endDate));
            $this->db->where('created_date >=', $startDate);
            $this->db->where('created_date <=', $endDate);
        }else {
            $startDate = date('Y-m-d 00:00:00');
            $endDate = date('Y-m-d 23:59:59');
            $this->db->where('created_date >=', $startDate);
            $this->db->where('created_date <=', $endDate);
        }
        $this->db->where('tbl_withdrawal_log.isDeleted', FALSE);
        $this->db->where('tbl_withdrawal_log.status', $status);
        $Query= $this->db->get();
        return $Query->result();
    }

    public function ChangeStatus($id, $status, $reason)
    {
        $this->db->where('id', $id)
        ->set('status', $status)
        ->set('message', $reason)
            ->update('tbl_withdrawal_log');
            
        if($status==2)
        {
            $Query = $this->db->where('isDeleted', FALSE)
            ->where('id', $id)
            ->get('tbl_withdrawal_log')->row();

            $this->db->set('wallet', "wallet+$Query->coin", FALSE)
            // ->set('wallet', "wallet+$Query->coin", FALSE)
            ->set('updated_date', date('Y-m-d H:i:s'))
            ->where('id', $Query->user_id)
            ->update('tbl_users');
        }
        return $this->db->last_query();
    }

    public function WithDraw($user_id, $amount)
    {
        $Deducted = $this->db->set('wallet', "wallet-$amount", FALSE)
            // ->set('winning_wallet', "winning_wallet-$amount", FALSE)
            ->set('updated_date', date('Y-m-d H:i:s'))
            ->where('id', $user_id)
            ->update('tbl_users');
        if ($Deducted) {
            $data = [
                'user_id' => $user_id,
                // 'redeem_id' => $Redeem_id,
                // 'mobile' => $mobile,
                'coin' => $amount,
            ];
            $this->db->insert('tbl_withdrawal_log', $data);
            return $this->db->insert_id();
        }
    }

    public function UserWithdrawalLog($userId)
    {
        $this->db->select('tbl_withdrawal_log.*,tbl_users.name');
        $this->db->from('tbl_withdrawal_log');
        $this->db->join('tbl_users', 'tbl_users.id=tbl_withdrawal_log.user_id');
        $this->db->where('tbl_withdrawal_log.user_id',$userId);
        // $this->db->where('tbl_withdrawal_log.status',1);
        $Query= $this->db->get();
        return $Query->result();

    }

}