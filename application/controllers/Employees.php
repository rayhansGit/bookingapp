<?php

	class Employees extends CI_Controller
	{
		public function technicians()
		{
			$this->load->model("Model_users",'mu');
			$technicians= $this->mu->gettechnicians();
			$data['technicians']=$technicians;
			$this->load->view('technicians',$data);

		}
		public function builders()
		{
			$this->load->model("Model_users",'mu');
			$data['builders']= $this->mu->getbuilders();
			$this->load->view('builders', $data);
		}
		public function subcontractors()
		{
			$this->load->model("Model_users",'mu');
			$data['subcontractors']=$this->mu->getsubcontractors();
			$this->load->view('subcontractors',$data);
		}

		public function statistics()
		{
			
			$this->load->model("Model_Classroomcalendar","mc");
			$technicians= $this->mc->getTechnicianNames();
			$data['technicians']=$technicians;
			
			if ($this->input->post('submit')!=null) {
				$techname=$this->input->post('techname');
				$res= $this->mc->stat($techname);
				$data['stat']=$res;
				$this->load->view('statisticsresult',$data);
			}
			else
			{

			$technicians= $this->mc->getTechnicianNames();
			$data['technicians']=$technicians;
			$this->load->view('statistics',$data);
			}
		}
	}