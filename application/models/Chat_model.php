<?php
class Chat_model extends MY_Model
{

    public function view($room_id = '')
{
    if ($room_id != '') {
        $this->db->where('tbl_chat_history.room_id', $room_id);
    }
    $this->db->select('tbl_chat_history.*,tbl_users.name,(select count(ch.id) from tbl_chat_history as ch where ch.sender_id=tbl_chat_room.user_id and ch.status=0) as msg_count');
    $this->db->where('tbl_chat_history.isDeleted', false);
    $this->db->group_by('tbl_chat_history.room_id');

    // Join the tbl_chat_room table
    $this->db->join('tbl_chat_room', 'tbl_chat_room.id = tbl_chat_history.room_id');

    // Join the tbl_users table
    $this->db->join('tbl_users', 'tbl_chat_room.user_id = tbl_users.id');

    $Query = $this->db->get('tbl_chat_history');

    return $Query->result();
}

public function get_unseen_message_count($room_id)
{
    $this->db->select('COUNT(id) as count');
    $this->db->from('tbl_chat_history');
    $this->db->where('status', 0); // Assuming 0 represents unseen messages in the 'status' column
    $this->db->where('isDeleted', 0); // Assuming 0 represents not deleted messages in the 'isDeleted' column
    $this->db->where('room_id', $room_id); // Assuming 0 represents not deleted messages in the 'isDeleted' column

    $query = $this->db->get();
    $result = $query->row();

    return $result->count;
}





    public function messageUser($room_id)
{
    $this->db->select('tbl_chat_history.*, tbl_users.name');
    $this->db->from('tbl_chat_history');
    $this->db->join('tbl_chat_room', 'tbl_chat_history.room_id=tbl_chat_room.id');
    $this->db->join('tbl_users', 'tbl_chat_room.user_id=tbl_users.id');
    $this->db->where('tbl_chat_history.room_id', $room_id);
    // $this->db->where('receiver_id', $receiver_id);
    $this->db->where('tbl_chat_history.isDeleted', false);
    // $this->db->update('tbl_chat_history.status => 1');
    $query = $this->db->get();

    // Check if there are any chat messages for the given room_id
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if there are no chat messages
    }
}
public function update_status($room_id)
{
    $this->db->where('room_id', $room_id);
    $this->db->update('tbl_chat_history', ['status' => 1]);
}

    

public function getOriginalSenderId($room_id)
    {
        $this->db->where('room_id', $room_id);
        $query = $this->db->get('tbl_chat_history');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->sender_id;
        } else {
            // Return false if the original sender_id is not found
            return false;
        }
    }

    public function add($data)
    {
        $this->db->select('tbl_chat_history.*,tbl_users.name');
        $this->db->from('tbl_chat_history');
        $this->db->join('tbl_users', 'tbl_chat_history.sender_id = tbl_users.id');
        //$this->db->join('tbl_users', 'c.receiver_id = u2.id', 'left');
        $this->db->where('tbl_chat_history.room_id', $data['room_id']);
        
        $insert_data = array(
            'room_id' => $data['room_id'],
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'message' => $data['message'],
            'communicate' => $data['communicate'],
        );
        
        $this->db->insert('tbl_chat_history', $insert_data);
        return $this->db->insert_id() ? $this->db->insert_id() : false;
    }
    




    // public function ViewUserMessage($room_id)
    // {

    // }

    public function update($data, $id)
{
    $this->db->where('id', $id);
    $this->db->update('tbl_chat_history', $data);
    $this->db->order_by('added_date', 'DESC');
    $query = $this->db->get();
    return $query->result();
}


    // Update the fetch_user_details() function to fetch user details from the database
   


    public function get_room_id($user_id, $vendor_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('vendor_id', $vendor_id);
        //$this->db->where('product_id', $product_id);
        $Query = $this->db->get('tbl_chat_room');
        $Record = $Query->row();
        if ($Record) {
            return $Record->id;
        } else {
            
            $data = [
                'user_id' => $user_id,
                'vendor_id' => $vendor_id,
                //'product_id' => $product_id
            ];
            if ($this->db->insert('tbl_chat_room', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function get_user($vendor_id)
    {
        $this->db->select('tbl_chat_room.*,tbl_user.fname as user_first_name,tbl_user.lname as user_last_name,tbl_product.product_name');
        $this->db->from('tbl_chat_room');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_chat_room.user_id', 'left');
        $this->db->join('tbl_product', 'tbl_product.id = tbl_chat_room.product_id', 'left');
        $this->db->where('tbl_chat_room.vendor_id', $vendor_id);
        $this->db->order_by('tbl_chat_room.id', 'desc');
        // $this->db->limit(10);
        $Query = $this->db->get();
        return $Query->result();
    }



}
