<?php

if (!function_exists('render')) {

    function template($view, $data) {
        $title['title'] = $data['title'];
        $ci = &get_instance();
        $ci->load->view('src/header', $title);
        $ci->load->view('src/nav', $title);
        $ci->load->view('src/sidebar',$data);
        $ci->load->view('src/notification', $title);
        $ci->load->view($view, $data);
        $ci->load->view('src/footer', $data);
    }
    function website($view, $data) {
        $title['title'] = $data['title'];
        $ci = &get_instance();
        $ci->load->view('website/src/header', $data);
        $ci->load->view($view, $data);
        $ci->load->view('website/src/footer', $data);
    }
    function GetTableData($id,$table) {
        $ci = & get_instance();
        $ci->db->select($table.".*");
        $ci->db->from($table);
        $ci->db->where($table.'.isDeleted', false);
        $ci->db->where($table.'.id', $id);    
        $Query = $ci->db->get();
        // echo $ci->db->last_query();exit;
        return $Query->row();
    }
}