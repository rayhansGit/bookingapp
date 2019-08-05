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
		
	    public function findjobnote()
	    {
	    	$id=$this->input->post("id");
	    	$this->load->model('Model_Classroomcalendar','sl');
			$description=$this->sl->findjobnote($id);
			echo json_encode($description);
	    } 
		public function delete()
		{
			$id=$this->input->post("id");
			//echo $id;

			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->delete($id);
			
		}
		public function insert()
		{
			//$title=$this->input->post("title");
			$start=$this->input->post("start");
			$end=$this->input->post("end");
			$description=$this->input->post("description");
			$project=$this->input->post("project");
			$jobpoint=$this->input->post("jobpoint");
			// $color= $_SESSION['postcolor'];
			$lotnumber=$this->input->post("lotnumber");
			$phase= $this->input->post("phase");
			$techname= $this->input->post("techname");
			$builder= $this->input->post("builder");
			$subcontractors= $this->input->post("subcontractors");
			$phasecolor= $this->input->post("phasecolor");
			$assigneddate=$this->input->post("assigneddate");

			
			$this->load->model('Model_Classroomcalendar','sl');
			$check= $this->sl->check($start,$end,$project,$lotnumber,$phase,$techname,$builder,$phasecolor,$jobpoint,$assigneddate,$subcontractors);
			if ($check==0) {
				$this->sl->insert($start,$end,$project,$lotnumber,$phase,$techname,$builder,$phasecolor,$jobpoint,$assigneddate,$subcontractors);
			}
			
			
			
		}

		public function insertcomplete()
		{
			$this->load->model('Model_Classroomcalendar','sl');
			$id=$this->input->post("id");
			$technician= $this->input->post('technician');
			$jobpoint=$this->input->post('jobpoint');
			//adding point to technician
			$this->sl->addjobpoint($technician,$jobpoint);
			
			

			$checkcompletion= $this->sl->checkcompletion($id);
			
			if ($checkcompletion==0) {
				$this->sl->completeproject($id);
			}
		}
		public function insertincomplete()
		{
			$this->load->model('Model_Classroomcalendar','sl');
			$id=$this->input->post("id");
			$technician= $this->input->post('technician');
			$jobpoint=$this->input->post('jobpoint');
			//adding point to technician
			$this->sl->addjobpoint($technician,$jobpoint);
			$checkincompletion= $this->sl->checkincompletion($id);
			
			if ($checkincompletion==0) {
				$this->sl->incompleteproject($id);
			}
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
					// $tech='<b>'.$row['tech'].'</b>';
				 $data[] = array(
				  	'id'   => $row["id"],
				  	'title'   => $row["project"].' '.$row["lotnumber"].' '.$row['phase'],
				  	'lotnumber'=>$row["lotnumber"],
				  	'tt' => $row['tech'],
				  	'builder'=>$row['builder'],
				  	'phase'=>$row['phase'],
				  	'subcontractors'=>$row['subcontractors'],
				  	'jobnote'=>$row['jobnote'],
				  	'jobpoint'=>$row['jobpoint'],
				  	'start'   => $row["start_event"],
				  	// 'end'   => $row["end_event"],
				  	'textColor' => 'black',
				  	'complete' => $row["complete"],
				  	'incomplete' => $row["incomplete"],
				  	'color' => $row["phasecolor"],
				  	'titleforeventdrop' => $row["project"]
	      			
				 );
				}
				
				

				//var_dump($totaldata);
				echo json_encode($data);	
		}

		

		public function updateunassignedjob()
		{
			$this->load->model('Model_Classroomcalendar','sl');

			$jobid= $this->input->post('id');
			$techname= $this->input->post('techname');
			$date= $this->input->post('assigneddate');

			$this->sl->updateunassignedjob($jobid,$techname,$date);

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
			
			$id=$this->input->post("id");
			$description=$this->input->post("description");
			
			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->update($id,$description);
			
		}	
		public function updateEvent()
		{

			$id=$this->input->post("id");
			$title=$this->input->post("title");
			$start=$this->input->post("start");
			// $end=$this->input->post("end");

			$this->load->model('Model_Classroomcalendar','sl');
			$this->sl->updateEvent($title,$start,$id);
		}

		

		
	}