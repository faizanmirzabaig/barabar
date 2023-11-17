<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $TBL_ADMIN = 'tbl_admin';
    protected $TBL_USER = 'tbl_user';
    protected $TBL_CATEGORY = 'tbl_category';
    
}
