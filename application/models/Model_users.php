<?php 

class Model_Users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function validate_username($username = null)
	{
		if($username) {			
			// die($username);
			$sql = "SELECT * FROM users WHERE username = ?";
			$query = $this->db->query($sql, array($username));
			$result = $query->row_array();
			
			return ($query->num_rows() === 1 ? true : false);			
		}	
		else {
			return false;
		}
	} // /validate username function

	
	public function validate_current_password($password = null, $userId = null)
	{
		if($password && $userId) {			
			$password = md5($this->input->post('currentPassword'));									

			$sql = "SELECT * FROM users WHERE password = ? AND user_id = ?";
			$query = $this->db->query($sql, array($password, $userId));
			$result = $query->row_array();
			
			return ($query->num_rows() === 1 ? true : false);			
		}	
		else {
			return false;
		}
	} // /validate username function

	public function login($username = null, $password = null) 
	{

		
		if($username && $password) {
			$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
			$_SESSION['username']=$username;
			$query = $this->db->query($sql, array($username, $password));
			$result = $query->row_array();

			return ($query->num_rows() === 1 ? $result['user_id'] : false);
			
		}
		else {
			return false;
		}
	}

	public function fetchUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}

	public function updateProfile($userId = null)
	{
		if($userId) {
			$update_data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

	public function changePassword($userId = null)
	{
		if($userId) {
			$password = md5($this->input->post('newPassword'));
			$update_data = array(
				'password' => $password
			);

			$this->db->where('user_id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

	public function checkbuilderexist($firstname,$lastname,$email,$phonenumber,$address)
	{
		$query= $this->db->query("SELECT * FROM builder WHERE firstname='$firstname' and lastname='$lastname' and email='$email' and phonenumber='$phonenumber' and address='$address'")->num_rows();

		return $query;
	}
	public function checkcontractorexist($firstname,$lastname,$email,$phonenumber,$address)
	{
		$query= $this->db->query("SELECT * FROM subcontractors WHERE firstname='$firstname' and lastname='$lastname' and email='$email' and phonenumber='$phonenumber' and address='$address'")->num_rows();

		return $query;
	}
	public function checktechnicianexist($firstname,$lastname,$email,$phonenumber,$address)
	{
		$query= $this->db->query("SELECT * FROM technician WHERE firstname='$firstname' and lastname='$lastname' and email='$email' and phonenumber='$phonenumber' and address='$address'")->num_rows();

		return $query;
	}

	public function insertbuilder($firstname,$lastname,$email,$phonenumber,$address)
	{
		$this->db->query("INSERT INTO builder (firstname,lastname,email,phonenumber,address) VALUES ('$firstname','$lastname','$email','$phonenumber','$address')");
	}
	public function inserttech($firstname,$lastname,$email,$phonenumber,$address)
	{
		$this->db->query("INSERT INTO technician (firstname,lastname,email,phonenumber,address) VALUES ('$firstname','$lastname','$email','$phonenumber','$address')");
	}
	public function insertsubcontractor($firstname,$lastname,$email,$phonenumber,$address)
	{
		$this->db->query("INSERT INTO subcontractors (firstname,lastname,email,phonenumber,address) VALUES ('$firstname','$lastname','$email','$phonenumber','$address')");
	}

	public function gettechnicians()
	{
		$result= $this->db->query("SELECT * from technician ORDER BY id")->result_array();
		return $result;
	}
	public function getbuilders()
	{
		$result= $this->db->query("SELECT * from builder ORDER BY id")->result_array();
		return $result;
	}
	public function getsubcontractors()
	{
		$result= $this->db->query("SELECT * from subcontractors ORDER BY id")->result_array();
		return $result;
	}

}