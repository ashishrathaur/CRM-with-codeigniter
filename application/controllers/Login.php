<?php
class Login extends MY_Controller
{
	public function index()
	{
		$this->load->view('login');
	}
	public function dash_open()
	{
		
		$this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if($this->form_validation->run())
		{
			$username = $this->input->post('user_email');
			$password = $this->input->post('password');
			$this->load->model('Client_model');
			$userdata = $this->Client_model->getClient($username, $password);
			$id = $userdata->user_id;
			$user_name = $userdata->user_name;
			// echo $id;
			// exit;
			if($id)
			{
				
				$this->session->set_userdata('user_id',$id);
				$this->session->set_userdata('user_name',$user_name);
				return redirect('Welcome');
			}
			else{
				$this->session->set_flashdata('login_failed','Invailid Username/Password.');
				return redirect('Login');
			}
			
		}
		else{
			$this->load->view('login');
			// $this->session->set_flashdata('login_failed','Invailid Username/Password.');
				// return redirect('client/login');
		}
	}
	// public function welcome()
	// {
	// 	$this->load->view('index');

	// }
	// public function customer()
	// {
	// 	$this->load->view('inc/header');
	// 	$this->load->view('inc/sidebar');
	// 	$this->load->view('customer/customer_list');
	// 	$this->load->view('inc/footer');
	// }
	public function register_open()
	{
		
		$this->load->view('register');
	}
}



?>