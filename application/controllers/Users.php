<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('authentication');
	}

	public function signup()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("first_name", "First name", "trim|required|min_length[2]|max_length[45]");
		$this->form_validation->set_rules("last_name", "Last name", "trim|required|min_length[2]|max_length[45]");
		$this->form_validation->set_rules("number", "Contact number", "trim|required|min_length[11]|max_length[11]|is_unique[users.contact_number]");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]|max_length[45]");
		$this->form_validation->set_rules('re_password', 'Password Confirmation', 'required|matches[password]');
		if($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->load->view('authentication', $this->view_data);
		} else {
			echo "nice";
			$this->load->model("User"); 
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$number = $this->input->post('number');
			$password = $this->input->post('password');
			$user_details = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'number' => $number,
				'password' =>  $password
			);
			$add_user = $this->User->add_user($user_details); 
			if($add_user === TRUE) {
				redirect("users");
			}
		}
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("number", "Contact number", "trim|required|min_length[11]|max_length[11]");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]|max_length[45]");
		if($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->load->view('authentication', $this->view_data);
		} else {
			$this->load->model('User');
			$contact_number = $this->input->post('number');
    		$password = $this->input->post('password');
			$login_user = $this->User->login_user($contact_number, $password); 
			//var_dump($login_user);
			if($login_user == NULL) {
				$this->view_data['errors'] = 'Wrong number or password';
				$this->load->view('authentication', $this->view_data);
			} else {
				$this->load->view('profile', $login_user);
			}
		}
	}
}
?>