<?php

class Login extends MY_Controller
{
	public function index()
	{
		$this->load->view('admin_login/login');
	}
	public function dash_open()
	{
		
		$this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if($this->form_validation->run())
		{
			$username = $this->input->post('user_email');
			$password = $this->input->post('password');
			$this->load->model('Admin_model');
			$id = $this->Admin_model->getUser($username, $password);
			// echo $id;
			// exit;
			if($id)
			{
				
				$this->session->set_userdata('id',$id);
				return redirect('admin/Welcome');
			}
			else{
				$this->session->set_flashdata('login_failed','Invailid Username/Password.');
				return redirect('admin/Login');
			}
			
		}
		else{
			$this->load->view('admin_login/login');
			// $this->session->set_flashdata('login_failed','Invailid Username/Password.');
			// 	return redirect('Login');
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
	
}



?>