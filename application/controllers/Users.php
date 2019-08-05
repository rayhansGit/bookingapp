<?php 

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// loading the users model
		$this->load->model('model_users');

		// loading the form validation library
		$this->load->library('form_validation');		

	}

	public function login()
	{

		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|callback_validate_username'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {			
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$login = $this->model_users->login($username, $password);

			if($login) {
				$this->load->library('session');

				$user_data = array(
					'id' => $login,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				$validator['success'] = true;
				$validator['messages'] = "dashboard";				
			}	
			else {
				$validator['success'] = false;
				$validator['messages'] = "Incorrect username/password combination";
			} // /else

		} 	
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}			
		} // /else

		echo json_encode($validator);
	} // /lgoin function

	public function validate_username()
	{
		$validate = $this->model_users->validate_username($this->input->post('username'));

		if($validate === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_username', 'The {field} does not exists');
			return false;			
		} // /else
	} // /validate username function

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}






	public function validate_current_password()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('id');
		$validate = $this->model_users->validate_current_password($this->input->post('currentPassword'), $userId);

		if($validate === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_current_password', 'The {field} is incorrect');
			return false;			
		} // /else	
	}
	public function register()
		{
			$this->load->view('register');
			if ($this->input->post('submit')!=null) {
				
			
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$phonenumber=$this->input->post('phonenumber');
			$address=$this->input->post('address');
			$type=$this->input->post('type');

			if ($type=='Builder') {
				$this->load->model('Model_users','mu');
				$check= $this->mu->checkbuilderexist($firstname,$lastname,$email,$phonenumber,$address);

				if ($check==0) {
					$this->mu->insertbuilder($firstname,$lastname,$email,$phonenumber,$address);
					echo "Builder Registration Successful!";
					header( "refresh:2;url=register" );
				}
			}
			else if ($type=='Sub Contractor') {
				$this->load->model('Model_users','mu');
				$check= $this->mu->checkcontractorexist($firstname,$lastname,$email,$phonenumber,$address);

				if ($check==0) {
					$this->mu->insertsubcontractor($firstname,$lastname,$email,$phonenumber,$address);
					echo "Sub contractor Registration Successful!";
					header( "refresh:2;url=register" );
				}
			}
			else if ($type=='Technician') {
				$this->load->model('Model_users','mu');
				$check= $this->mu->checktechnicianexist($firstname,$lastname,$email,$phonenumber,$address);

				if ($check==0) {
					$this->mu->inserttech($firstname,$lastname,$email,$phonenumber,$address);
					echo "Technician Registration Successful!";
					header( "refresh:2;url=register" );
				}
			}
		    	}

		}

}