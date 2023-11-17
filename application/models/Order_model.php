<?php
class Order_model extends MY_Model
{

    public function cart($UserId)
    {
        $this->db->select('tbl_cart.*,tbl_product.name,tbl_product.img,tbl_product.main_img,tbl_product.price,tbl_product.detail');
        $this->db->from('tbl_cart');
        $this->db->join('tbl_product','tbl_product.id=tbl_cart.product_id');
        $this->db->where('tbl_cart.user_id', $UserId);
        $this->db->where('tbl_cart.isDeleted', false);
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->order_by('tbl_cart.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function MyOrder($UserId)
    {
        $this->db->from('tbl_order');
        $this->db->where('user_id', $UserId);
        $this->db->where('isDeleted', false);
        $this->db->where('payment', 1);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function MyPromoOrder($UserId,$code)
    {
        $this->db->from('tbl_order');
        $this->db->where('user_id', $UserId);
        $this->db->where('promocode', $code);
        $this->db->where('isDeleted', false);
        $this->db->where('payment', 1);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function GetProductByOrder($order_id)
    {
        $this->db->select('tbl_order_product.*,tbl_product.name,tbl_product.img,tbl_product.main_img,tbl_product.detail');
        $this->db->from('tbl_order_product');
        $this->db->join('tbl_product','tbl_product.id=tbl_order_product.product_id');
        $this->db->where('tbl_order_product.order_id', $order_id);
        $this->db->where('tbl_order_product.isDeleted', false);
        $this->db->order_by('tbl_order_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AddToCart($data)
    {
        $this->db->from('tbl_cart');
        $this->db->where('isDeleted', false);
        $this->db->where('user_id', $data['user_id']);
        $this->db->where('product_id', $data['product_id']);
        $Query = $this->db->get();
        if($Query->num_rows())
        {
            $this->db->set('quantity','quantity+1',FALSE);
            $this->db->where('isDeleted', false);
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('product_id', $data['product_id']);
            return $this->db->update('tbl_cart');
        }
        else
        {
            $this->db->insert('tbl_cart', $data);
            return $this->db->insert_id();
        }
    }

    public function PlaceOrder($data)
    {
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
    }

    public function UpdateOrder($user_id, $order_id, $final_amount, $amount, $discount, $RazorPayId, $coupounAmount)
    {
        $this->db->set('amount', $amount);
        $this->db->set('final_amount', $final_amount);
        $this->db->set('discount', $discount);
        $this->db->set('razorpay_order_id', $RazorPayId);
        $this->db->set('coupoun_amount', $coupounAmount);
        $this->db->where('id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_order');
        return $this->db->affected_rows();
    }

    public function UpdateOrderCOD($user_id, $order_id, $final_amount, $amount, $discount)
    {
        $this->db->set('amount', $amount);
        $this->db->set('final_amount', $final_amount);
        $this->db->set('discount', $discount);
        $this->db->set('payment', 1);
        $this->db->set('razorpay_order_id', 'CASH');
        $this->db->where('id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_order');
        return $this->db->affected_rows();
    }

    public function UpdateOrderPayment($order_id)
    {
        $this->db->set('payment', 1);
        $this->db->where('id', $order_id);
        $this->db->update('tbl_order');
        return $this->db->affected_rows();
    }

    public function CartToOrder($order_id,$product_id,$price,$quantity)
    {
        $data = [
            'order_id' => $order_id,
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_order_product', $data);
        return $this->db->insert_id();
    }

    public function RemoveCart($data)
    {
        $this->db->from('tbl_cart');
        $this->db->where('isDeleted', false);
        $this->db->where('quantity>=', 2);
        $this->db->where('user_id', $data['user_id']);
        $this->db->where('product_id', $data['product_id']);
        $Query = $this->db->get();
        if($Query->num_rows())
        {
            $this->db->set('quantity','quantity-1',FALSE);
            $this->db->where('isDeleted', false);
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('product_id', $data['product_id']);
            return $this->db->update('tbl_cart');
        }
        else
        {
            $this->db->set('isDeleted',1);
            $this->db->where('isDeleted', false);
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('product_id', $data['product_id']);
            return $this->db->update('tbl_cart');
        }
    }

    public function EmptyCart($user_id)
    {
        $this->db->set('isDeleted',1);
        $this->db->where('isDeleted', false);
        $this->db->where('user_id', $user_id);
        return $this->db->update('tbl_cart');
    }

    public function View($id)
    {
        $this->db->select('tbl_order.*,tbl_users.name as user_name,tbl_users.mobile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_users','tbl_users.id=tbl_order.user_id');
        $this->db->where('tbl_order.isDeleted', false);
        // $this->db->where('tbl_order.payment', 1);
        $this->db->where('tbl_order.id', $id);

        $Query = $this->db->get();
        return $Query->row();
    }

    public function ViewOrderProduct($id)
    {
        $this->db->select('tbl_order_product.*,tbl_product.name,tbl_product.img,tbl_product.main_img,tbl_product.detail');
        $this->db->from('tbl_order_product');
        $this->db->join('tbl_product','tbl_order_product.product_id=tbl_product.id');
        $this->db->where('tbl_order_product.isDeleted', false);
        $this->db->where('tbl_order_product.order_id', $id);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $Query->result();
    }

    public function AllOrder()
    {
        $this->db->select('tbl_order.*,tbl_users.name,tbl_users.mobile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_users','tbl_users.id=tbl_order.user_id');
        $this->db->where('tbl_order.isDeleted',false);
        $this->db->where('tbl_order.payment',1);
        $this->db->order_by('tbl_order.id','DESC');
        $Query = $this->db->get();
        // echo $this->db->last_query();
        return $Query->result();
    }

    public function OrderByStatus($status)
    {
        $this->db->select('tbl_order.*,tbl_users.name,tbl_users.mobile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_users','tbl_users.id=tbl_order.user_id');
        $this->db->where('tbl_order.isDeleted',false);
        $this->db->where('tbl_order.delivery_status',$status);
        $this->db->where('tbl_order.payment',1);
        $this->db->order_by('tbl_order.id','DESC');
        $Query = $this->db->get();
        // echo $this->db->last_query();
        return $Query->result();
    }

    public function ChangeOrderStatus($id,$status)
    {
        $data['delivery_status']=$status;
         
        $this->db->where('id',$id);
        if($this->db->update('tbl_order',$data))
            return $this->db->last_query();
        else
            return false;
    }
}
