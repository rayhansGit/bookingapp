<?php 

class Exportcalendar extends MY_Controller
{
	public function index()
	{
		if (isset($_SESSION['username'])) {
            $this->load->model("Model_Classroomcalendar","mc");
            $data['cal']=$this->mc->calendars();
        
        $this->load->view('exportcalendar',$data);
        }
		
	}

	public function exportdates()
	{
		$calfrom= $this->input->post("checkboxvar");
		
		$startdate= $this->input->post("startdate");
		$enddate= $this->input->post("enddate");
		$this->load->model("Model_Classroomcalendar","mc");
		$result=$this->mc->exportevents($calfrom,$startdate,$enddate);
		

		if (isset($_SESSION['username'])) {
            $this->load->model("Model_Classroomcalendar","mc");
            $data['cal']=$this->mc->calendars();

        
        $this->load->view('exportcalendar',$data);
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />';
        echo "<br>";
			echo "<table class='table table-striped'>";
			echo "<th>";
			echo "Date";
			echo "</th>";
			echo "<th>";
			echo "Calendar";
			echo "</th>";
			echo "<th>";
			echo "Title";
			echo "</th>";
			echo "<th>";
			echo "Start";
			echo "</th>";
			echo "<th>";
			echo "End";
			echo "</th>";
			
        foreach ($result as $row) {
			
			

			echo "<tr>";
			echo "<td>";
			echo date('d/m/Y',strtotime($row['start_event']));
			echo "</td>";
			echo "<td>";
			echo $row['roomid'];
			echo "</td>";
			echo "<td>";
			echo $row['title'];
			echo "</td>";

			echo "<td>";
			echo date('H:i',strtotime($row['start_event']));
			echo "</td>";

			echo "<td>";
			echo date('H:i',strtotime($row['end_event']));
			// echo date(strtotime("Y-m-d",$row['start_event']));
			echo "</td>";

			
			echo "</tr>";
			
		}
		echo "</table>";
        }
		

		
	}
}