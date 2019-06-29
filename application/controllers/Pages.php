<?php 

class Pages extends MY_Controller
{
    public function index()
    {
        $this->load->model("Model_Classroomcalendar","mc");
        $data['cal']=$this->mc->calendars();
        
        $this->load->view('userview',$data);

       
    }
    public function login()
    {
        $this->load->view('login');

    }
	
    public function dashboard()
    {
        
        if (isset($_SESSION['username'])) {
            $this->load->model("Model_Classroomcalendar","mc");
        $data['cal']=$this->mc->calendars();
        
        $this->load->view('classroomcalendar',$data);
        }
        else
        {
            echo "You are not allowed to view this page";
        }
        
        //
            
    }
    public function editcal()
    {
    	
    	// if (isset($_SESSION['username'])) {
     //        $this->load->model("Model_Classroomcalendar","mc");
     //        $data['cal']=$this->mc->calendars();
        
     //    $this->load->view('editcal',$data);
     //    }
    }
    public function logout()
    {
        session_destroy();
        redirect('pages/index', 'refresh');
    }
    
   
}