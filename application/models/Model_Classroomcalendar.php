<?php

class Model_Classroomcalendar extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function delete($id)
	{
		
		$this->db->query("DELETE FROM classroombooking WHERE id=$id");
			
	}
	public function insert($start,$end,$project,$lotnumber,$phase,$techname,$builder,$phasecolor,$jobpoint,$assigneddate)
	{
		
		$userid='"'.($_SESSION['username']).'"';
		$this->db->query("INSERT INTO classroombooking (project, start_event, end_event,userid,lotnumber,phase,tech,builder,phasecolor,jobpoint, assignedDate) VALUES ('$project', '$start', '$end',$userid,'$lotnumber','$phase','$techname','$builder','$phasecolor','$jobpoint', '$assigneddate')");
	
	}
	public function load()
	{
		$this->load->library('session');
		
		//$userid=$_SESSION['username'];
		$query=$this->db->query("SELECT * FROM classroombooking WHERE tech NOT LIKE '' ORDER BY id");
		$statement = $query->result_array();
		return $statement;

		
	}

	public function loadunassignedjobs()
	{
		$this->load->library('session');
		
		//$userid=$_SESSION['username'];
		$query=$this->db->query("SELECT * FROM classroombooking WHERE tech='' ORDER BY id");
		$statement = $query->result_array();
		return $statement;

		
	}
	public function getTechnicianNames()
	{
		$query= $this->db->query("SELECT * from technician ORDER BY firstname")->result_array();
		return $query;
	}
	public function getBuildersNames()
	{
		$query= $this->db->query("SELECT * from builder ORDER BY firstname")->result_array();
		return $query;
	}
	

	public function updateunassignedjob($jobid,$techname,$date)
	{
		$this->db->query("UPDATE classroombooking set tech='$techname',assignedDate='$date' WHERE id='$jobid'");
	}
		
	public function update($id,$description)
	{
		
		$this->db->query("UPDATE classroombooking SET jobnote='$description' WHERE id='$id'");
		
		
	}
	public function updateEvent($title,$start,$id)
	{
		$this->db->query("UPDATE classroombooking SET project='$title',start_event='$start' WHERE id='$id'");
	}
	public function new($calendar)
	{
		$this->db->query("INSERT into calendars(numbers) VALUES ('$calendar')");
	}
	
	public function deletecal($calendar)
	{
		$this->db->query("DELETE from calendars WHERE numbers='$calendar'");
	}
	public function findjobnote($id)
	{
		$description=$this->db->query("SELECT jobnote from classroombooking where id='$id'")->row()->jobnote;
		return $description;
	}

	public function exportdates($from,$to)
	{
		var_dump($from);
		var_dump($to);
		$this->db->query("INSERT into classroombooking (userid,roomid,title,start_event,end_event,description,favcolor) SELECT userid,'$to',title,start_event,end_event,description,favcolor FROM classroombooking WHERE roomid='$from'");
	}
	public function check($start,$end,$project,$lotnumber,$phase,$techname,$builder,$phasecolor,$jobpoint,$assigneddate)
	{
		$userid='"'.($_SESSION['username']).'"';
		$check= $this->db->query("SELECT * FROM classroombooking where start_event='$start' and end_event='$end' and project='$project' and lotnumber='$lotnumber' and phase='$phase' and tech='$techname' and builder='$builder' and phasecolor='$phasecolor' and userid=$userid and jobpoint='$jobpoint' and assignedDate='$assigneddate'")->num_rows();
		return $check;
	}

	public function checkcompletion($id)
	{
		$check=$this->db->query("SELECT complete from classroombooking WHERE id='$id' and complete='&#9989'")->num_rows();
		return $check;
	}
	public function checkincompletion($id)
	{
		$check=$this->db->query("SELECT incomplete from classroombooking WHERE id='$id' and incomplete='&#10006'")->num_rows();
		return $check;
	}
	public function completeproject($id)
	{
		var_dump($id);
		
		$this->db->query("UPDATE classroombooking set complete='&#9989',incomplete='' WHERE id='$id'");
	}
	public function incompleteproject($id)
	{
		$this->db->query("UPDATE classroombooking set incomplete='&#10006',complete='' WHERE id='$id'");
	}
	
	public function addjobpoint($technician,$jobpoint)
	{
		$date= date('Y-m-d');
		$res= $this->db->query("SELECT COUNT(*) FROM techsjobpoint where username='$technician' and dated='$date' and points=$jobpoint ")->row_array();
		
		var_dump($res['COUNT(*)']);
		if ($res['COUNT(*)']==0) {
			$this->db->query("INSERT INTO techsjobpoint (username,dated,points) VALUES ('$technician','$date',$jobpoint)");
		}
		// if ($this->db->query()) {
		// 	$this->db->query("INSERT INTO techsjobpoint (username,dated,points) VALUES ('$technician','$date',$jobpoint)");
		// }
		
	}
	public function stat($techname)
	{
		$week=date('Y-m-d', strtotime('-7 days'));
		$month=date('Y-m-d', strtotime('-30 days'));
		$year=date('Y-m-d', strtotime('-365 days'));
		$weekly= $this->db->query("SELECT SUM(points) FROM techsjobpoint WHERE dated>= '$week' AND username='$techname'")->result_array();
		$monthly= $this->db->query("SELECT SUM(points) FROM techsjobpoint WHERE dated>= '$month' AND username='$techname'")->result_array();
		$yearly= $this->db->query("SELECT SUM(points) FROM techsjobpoint WHERE dated>= '$year' AND username='$techname'")->result_array();

		return array('weekly' => $weekly, 'monthly' => $monthly,'yearly'=>$yearly);
		
	}

	

}