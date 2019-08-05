	<?php

	class ClassroomCalendar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model("Model_Classroomcalendar","mc");
		}

		public function bookroom()
		{
			$id=$this->input->post("id");
			$today=date('Y-m-d');

			
			if($this->mc->checkprevbookingdate()>$today)
			{
				$data="exist";
			}
			else
			{
				$data="Not exist";
			}


			echo json_encode($data);
		}


		public function bookroomcheck()
		{
			$id=(int)($this->input->post("id"));
			$this->mc->bookroomforexistingbooking($id);
		}
		public function bookroomnewuser()
		{
			$id=(int)($this->input->post("id"));
			$this->mc->bookroomfornonexistingbooking($id);
		}
		public function setpostcolor()
		{
			var_dump($_SESSION['postcolor']);
			$_SESSION['postcolor']= $this->input->post('color');
		}
		
		// public function index()
		// {

			
			
		// }
		
	    public function finddescription()
	    {
	    	$id=$this->input->post("id");
	    	$this->load->model('Model_Classroomcalendar','sl');
			$description=$this->sl->finddescription($id);
			echo json_encode($description);
	    } 
		public function delete()
		{
			$id=$this->input->post("id");
			//echo $id;

			$this->load->model('Model_Classroomcalendar','sl');
			$permission=$this->sl->delete($id);

			
			if ($permission=="yes") {
				//echo "<script>alert('Can be deleted');</script>";
				$data[] = array("access"  => "granted");
				echo json_encode($data);
			}
			if ($permission=="no")
			{
				$data[] = array("access"  => "denied");
				echo json_encode($data);
			}
			
		}
		public function insert()
		{
			//$title=$this->input->post("title");
			$start=$this->input->post("start");
			$end=$this->input->post("end");
			$description=$this->input->post("description");
			$title=$this->input->post("title");
			$color= $_SESSION['postcolor'];
			
			
			
			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->insert($start,$end,$title,$description,$color);
			$_SESSION['postcolor']='#3788d8';
			
		}
		public function set()
		{  
			$_SESSION['roomid']= $this->input->post("room_id");
			var_dump($_SESSION['roomid']);
		}

		public function load()
		{
			$this->load->model('Model_Classroomcalendar','sl');
			$result=$this->sl->load();
			

			foreach($result as $row)
				{
				 $data[] = array(
				  	'id'   => $row["id"],
				  	'title'   => $row["title"],
				  	'start'   => $row["start_event"],
				  	'end'   => $row["end_event"],
				  	'color' => $row["favcolor"],
	      			'textColor' => 'white',
				 );
				}
				
				

				//var_dump($totaldata);
				echo json_encode($data);	
		}
		public function new()
		{
			$calendar=$this->input->post("calendar");
			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->new($calendar);
			redirect("pages/dashboard");

		}
		public function deletecal()
		{
			$calendar=$this->input->post("calendar");
			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->deletecal($calendar);
			redirect("pages/dashboard");
		}

		public function exportdates()
		{
			$from=$this->input->post("calfrom");
			$to=$this->input->post("calto");

			$this->load->model("Model_Classroomcalendar",'sl');
			$this->sl->exportdates($from,$to);
			redirect("pages/dashboard");
		}
		// public function update()
		// {
		// 	$title=$this->input->post("title");
		// 	$start=$this->input->post("start");
		// 	$end=$this->input->post("end");
		// 	$id=$this->input->post("id");
		// 	$this->load->model('Model_Classroomcalendar','sl');
		// 	$this->sl->update($title,$start,$end,$id);
			
		// }

		public function update()
		{
			$title=$this->input->post("title");
			$start=$this->input->post("start");
			$end=$this->input->post("end");
			$id=$this->input->post("id");
			$description=$this->input->post("description");
			$color= $_SESSION['postcolor'];
			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->update($title,$start,$end,$id,$description,$color);
			
		}	

		
	}