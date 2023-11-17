<?php
class Admin_model extends MY_Model
{
    public function Login($email, $Password)
    {
        $this->db->where('email_id', $email);
        // $this->db->where('role', 0);
        $this->db->where('isDeleted', 0);
        $this->db->where('password', $Password);
        $user = $this->db->get('tbl_admin');
        return $user->result();
    }
    function get_userdetail($email, $password) {
        $this->db->where('email_id', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_admin');
        return $query->row();
    }
    public function get_user_by_id($userId) {
        $this->db->where('id', $userId);
        $query = $this->db->get('tbl_admin');
        return $query->row();
    }

    public function get_Order($Order_status)
    {
        $this->db->where('delivery_status', $Order_status);
        $this->db->where('isDeleted', 0);
        $user = $this->db->get('tbl_order');
        return $user->result();
    }

    public function get_AllOrder1()
    {
        $this->db->where('isDeleted', 0);
        $this->db->order_by('id', 'desc');
        $AllOrder = $this->db->get('tbl_order');
        if ($AllOrder)
            return $AllOrder->result();
        else
            return false;
    }

    public function get_AllOrder()
    {
        $this->db->select('tbl_order.*,tbl_users.mobile')
                 ->from('tbl_order')
                 ->join('tbl_users','tbl_users.id=tbl_order.user_id')
                 ->where('tbl_order.isDeleted', 0)
                 ->where('tbl_order.payment', 1)
                 ->where('tbl_order.delivery_status!=', 3)
                 ->where('tbl_users.isDeleted', 0);
                //  ->where('tbl_order.isDeleted', 0);
        $this->db->order_by('tbl_order.id', 'desc');
        $AllOrder = $this->db->get();
        if ($AllOrder)
            return $AllOrder->result();
        else
            return false;
    }

    public function ChangeOrderStatus($Order_status, $Order_id)
    {
        $data['delivery_status'] = $Order_status;

        $this->db->where('id', $Order_id);
        if ($this->db->update('tbl_order', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function viewBanner()
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function addBanner($image)
    {
        # code...
        $data = [
            'img' => $image,
        ];
        if ($this->db->insert('tbl_banner', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function DeleteBanner($BannerId)
    {
        # code...
        // echo $BannerId; exit;
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $BannerId)
            ->update('tbl_banner');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }

    public function UpdateBanner($source_image, $BannerId)
    {
        # code...
        $data = [

            'updated_date' => date('Y-m-d H:i:s')
        ];

        if ($source_image)
            $data['img'] = $source_image;

        $this->db->where('id', $BannerId);
        if ($this->db->update('tbl_banner', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function UpdateUserFcm($fcm)
    {
        # code...
        $data=[
            'fcm'=>$fcm,
        ];

        if($this->db->update('tbl_admin',$data))
            return $this->db->last_query();
        else
            return false;
    }

    public function AdminFcm()
    {
        $this->db->select('fcm');
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', false);
        $Query = $this->db->get();
        return $Query->row()->fcm;
    }

    public function getBanner($BannerId)
    {
        $Query = $this->db->select('*')
            ->from('tbl_banner')
            ->where('id', $BannerId)
            ->where('isDeleted', 0)
            ->get();
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function viewOrderDetails($id)
    {
        # code...
        $this->db->select('tbl_order.*,tbl_users.name as user_name,tbl_users.mobile');
        $this->db->from('tbl_order');
        $this->db->join('tbl_users', 'tbl_users.id=tbl_order.user_id');
        $this->db->where('tbl_order.isDeleted', false);
        // $this->db->where('tbl_order.payment', 1);
        $this->db->where('tbl_order.id', $id);

        $Query = $this->db->get();
        return $Query->row();
    }

    public function ViewOrderProduct($id)
    {
        # code...
        $this->db->select('tbl_order_product.*,tbl_product.name,tbl_product.img,tbl_product.main_img,tbl_product.detail');
        $this->db->from('tbl_order_product');
        $this->db->join('tbl_product', 'tbl_order_product.product_id=tbl_product.id');
        $this->db->where('tbl_order_product.isDeleted', false);
        $this->db->where('tbl_order_product.order_id', $id);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $Query->result();
    }

    public function allUser()
    {
        $this->db->select('tbl_users.*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.isDeleted', false);
        $this->db->order_by('tbl_users.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function getallOffer()
    {
        # code...
        $this->db->select('*');
        $this->db->from('tbl_offer');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }


    public function AddOffer($promocode, $use_per_user, $amount, $valid_from, $valid_till)
    {
        # code...
        $data = [
            'promocode' => $promocode,
            'use_per_user' => $use_per_user,
            'amount' => $amount,
            'valid_from' => $valid_from,
            'valid_till' => $valid_till,
        ];
        if ($this->db->insert('tbl_offer', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function CheckExistPromocode($promocode)
    {
        # code...
        $Query = $this->db->select('*')
            ->from('tbl_offer')
            ->where('promocode', $promocode)
            ->where('isDeleted', 0)
            ->get();
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function DeleteOffer($OfferId)
    {
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $OfferId)
            ->update('tbl_offer');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }

    public function getOffer($OfferId)
    {
        # code...
        $Query = $this->db->where('id', $OfferId)
            ->get('tbl_offer');
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function CheckUpdatePromoExist($promocode, $offer_id)   # asdfasdkf
    {
        # code...
        $this->db->select('*');
        $this->db->from('tbl_offer');
        $this->db->where_not_in('id', $offer_id);
        $this->db->where('promocode', $promocode);
        $this->db->where('isDeleted', false);
        // $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function updateOffer($offer_id, $promocode, $use_per_user, $amount, $valid_from, $valid_till)
    {
        # code...
        $data = [
            'promocode' => $promocode,
            'use_per_user' => $use_per_user,
            'amount' => $amount,
            'valid_from' => $valid_from,
            'valid_till' => $valid_till,
        ];

        $this->db->where('id', $offer_id);
        if ($this->db->update('tbl_offer', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function CategoryList($category_id = '')
    {
        # code...
        $category_id = (empty($category_id)) ? 0 : $category_id;

        $this->db->from('tbl_category');
        $this->db->where('parent_id', $category_id);
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AddCategory($name)
    {
        # code...
        $data = [
            'name' => $name,
            'parent_id' => 0,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_category', $data);
        $InsertId =  $this->db->insert_id();

        return $InsertId;
    }

    public function getCategory($CategoryId)
    {
        # code...
        $this->db->from('tbl_category');
        $this->db->where('isDeleted', false);
        $this->db->where('id', $CategoryId);

        $Query = $this->db->get();
        return $Query->row();
    }

    public function CheckUpdateCategoryExist($category_id, $name,$parent_id)
    {
        # code...
        $Query=$this->db->select('*')
                 ->from('tbl_category')
                 ->where('name',$name)
                 ->where('parent_id',$parent_id)
                 ->where('id!=', $category_id)
                 ->where('isDeleted',0)
                 ->get();
        if($Query)
            return $Query->row();
        else    
            return false;
    }

    public function UpdateCategory($category_id, $name)
    {
        # code...
        $this->db->set('name',$name);
        $this->db->set('updated_date',date('Y-m-d H:i:s'));
        $this->db->where('id',$category_id);
        $this->db->update('tbl_category');
        $rows = $this->db->affected_rows();
        // echo $this->db->last_query();
        return $rows;
    }

    public function DeleteCategrory($CategoryId)
    {
        # code...
        $Query = $this->db->set('isDeleted', 1)
            ->where('id', $CategoryId)
            ->update('tbl_category');
        if ($Query)
            return $this->db->last_query();
        else
            return false;
    }
    public function CheckExistCategoryName($name)
    {
        # code...

        $Query=$this->db->select('*')
                 ->from('tbl_category')
                 ->where('parent_id',0)
                 ->where('name',$name)
                 ->where('isDeleted',0)
                 ->get();
        if($Query)
            return $Query->row();
        else    
            return false;
    }


    public function ProductList()
    {
        # code...
        $this->db->select('tbl_product.*,tbl_category.name as category_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.category_id');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->order_by('tbl_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    
    }

    public function addProduct($source_image,$CategoryId, $name, $price, $detail)
    {
        # code...
        // $img = implode(',', $images);

        
            $data = [
                'name' => $name,
                'category_id' => $CategoryId,
                'price' => $price,
                'main_img' => $source_image,
                // 'img' => $img,
                'detail' => $detail,
                'added_date' => date('Y-m-d H:i:s')
            ];
        $this->db->insert('tbl_product', $data);
        $InsertId =  $this->db->insert_id();

        return $InsertId;
    }

    public function getProduct($ProductId)
    {
        # code...
        $Query = $this->db->select('*')
            ->from('tbl_product')
            //  ->join('tbl_category','tbl_product.category_id=tbl_category.id')
            ->where('id', $ProductId)
            ->get();
        if ($Query)
            return $Query->row();
        else
            return false;
    }

    public function UpdateProduct($ProductId,$name,$price,$details)
    {
        # code...
        $data = [
            'name' => $name,
            // 'category_id' => $M_category,
            'price' => $price,
            'detail' => $details,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        // if ($images) {
        //     $Mapped_Images = $this->View($product_id)->img;
        //     if (!empty($Mapped_Images)) {
        //         $Images_Arr = explode(',', $Mapped_Images);
        //         $images = array_merge($Images_Arr, $images);
        //     }
        //     $img = implode(',', $images);
        //     $data['img'] = $img;
        // }
        // if ($main_img) {
        //     $data['main_img'] = $main_img;
        // }


        $this->db->where('id', $ProductId);
        if ($this->db->update('tbl_product', $data))
            return $this->db->last_query();
        else
            return false;
    }

    public function RegisterCreator($data) {
        $data['role'] = CREATOR; // Set the role to 2 for each entry
       
        $data['sw_password'] = md5($data['password']);
        $password = $data['password'];
        $this->db->insert('tbl_admin', $data);
        $serviceId = $this->db->insert_id();
        // Update the 'password' column separately
        // $this->db->set('password', $password);
        // $this->db->where('id', $serviceId);
        // $this->db->update('tbl_admin');
        return $serviceId;
    }

    public function EditCreator($id,$data) {
        // $data['role'] = CREATOR; // Set the role to 2 for each entry
       
        // $data['sw_password'] = md5($data['password']);
        // $password = $data['password'];
        $this->db->where('id', $id);
        $serviceId =$this->db->update('tbl_admin', $data);
        //  $this->db->insert_id();
        // Update the 'password' column separately
        // $this->db->set('password', $password);
        // $this->db->where('id', $serviceId);
        // $this->db->update('tbl_admin');
        return $serviceId;
    }
}
