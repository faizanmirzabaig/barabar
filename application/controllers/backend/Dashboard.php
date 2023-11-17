<?php
class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(['Student_model','School_model','Feeds_model','Event_model']);
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        
        $role = $this->session->userdata('role');
        $admin_id=$this->session->userdata('admin_id');
        
        if ($role == CREATOR) {
            
            $data = [
                'title' => 'Creator Dashboard',
                'totalUsers' => count($this->Dashboard_model->getallusers($admin_id)),
                'totalCourses' => count($this->Dashboard_model->getallcourses($admin_id)),
                'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase($admin_id)),
                
            ];
            
            template('dashboard/creator',$data);
            // Redirect to the 'backend/dashboard/creator' page for role 2
            // redirect('backend/dashboard/creator');
        } elseif ($role == MANAGER) {
         
            $data = [
                'title' => 'Manager Dashboard',
                'totalUsers' => count($this->Dashboard_model->getallusers($admin_id)),
                'totalCourses' => count($this->Dashboard_model->getallcourses($admin_id)),
                'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase($admin_id)),
                'totalCreator' => count($this->Dashboard_model->getcreator()),
                
            ];
            template('dashboard/manager',$data);
            // Redirect to the 'backend/dashboard/admin' page for other roles
            //redirect('backend/dashboard/manager');
        } else {
            $data = [
                'title' => 'Admin Dashboard',
                'totalUsers' => count($this->Dashboard_model->getallusers($admin_id)),
                'totalCourses' => count($this->Dashboard_model->getallcourses($admin_id)),
                'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase($admin_id)),
                'totalCreator' => count($this->Dashboard_model->getcreator($admin_id)),
                'totalmanager' => count($this->Dashboard_model->getmanagers($admin_id))
            ];
            
            template('dashboard/admin',$data);
            // User is not logged in, redirect to the login page
            //redirect('backend/dashboard/admin');
        }
    }


    // public function admin()
    // {
    //     $data = [
    //         'title' => 'Dashboard',
    //         'totalUsers' => count($this->Dashboard_model->getallusers()),
    //         'totalCourses' => count($this->Dashboard_model->getallcourses()),
    //         'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase()),
    //         'totalCreator' => count($this->Dashboard_model->getcreator()),
    //         'totalmanager' => count($this->Dashboard_model->getmanagers())
    //     ];
        
    //     template('dashboard/admin',$data);
    // }

    // public function creator()
    // {
    //     $data = [
    //         'title' => 'Dashboard',
    //         'totalUsers' => count($this->Dashboard_model->getallusers()),
    //         'totalCourses' => count($this->Dashboard_model->getallcourses()),
    //         'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase()),
            
    //     ];
    //     template('dashboard/creator',$data);
    // }

    // public function manager()
    // {
    //     $data = [
    //         'title' => 'Dashboard',
    //         'totalUsers' => count($this->Dashboard_model->getallusers()),
    //         'totalCourses' => count($this->Dashboard_model->getallcourses()),
    //         'totalCoursePurchase' => count($this->Dashboard_model->getcoursepurchase()),
    //         'totalCreator' => count($this->Dashboard_model->getcreator()),
            
    //     ];
    //     template('dashboard/manager',$data);
    // }
   
}
