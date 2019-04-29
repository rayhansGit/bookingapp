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
	public function insert($start,$end,$title,$description)
	{
		$roomid=$_SESSION['roomid'];
		$userid='"'.($_SESSION['username']).'"';
		$this->db->query("INSERT INTO classroombooking (title, start_event, end_event, roomid,userid,description) VALUES ('$title', '$start', '$end', '$roomid',$userid,'$description')");
	
	}
	public function load()
	{
		$this->load->library('session');
		$roomid=$_SESSION['roomid'];
		//$userid=$_SESSION['username'];
		$query=$this->db->query("SELECT * FROM classroombooking WHERE roomid='$roomid' ORDER BY id");
		$statement = $query->result_array();
		return $statement;

		
	}
		
	public function update($title,$start,$end,$id,$description)
	{
		
		$this->db->query("UPDATE classroombooking SET title='$title', start_event='$start', end_event='$end', description='$description' WHERE id='$id'");
		
		
	}
	public function new($calendar)
	{
		$this->db->query("INSERT into calendars(numbers) VALUES ('$calendar')");
	}
	public function calendars()
	{
		$res=$this->db->query("SELECT numbers from calendars")->result_array();
		
		return $res;
	}
	public function deletecal($calendar)
	{
		$this->db->query("DELETE from calendars WHERE numbers='$calendar'");
	}
	public function finddescription($id)
	{
		$description=$this->db->query("SELECT description from classroombooking where id='$id'")->row()->description;
		return $description;
	}

	public function exportdates($from,$to)
	{
		var_dump($from);
		var_dump($to);
		$this->db->query("INSERT into classroombooking (userid,roomid,title,start_event,end_event,description) SELECT userid,'$to',title,start_event,end_event,description FROM classroombooking WHERE roomid='$from'");
	}

}