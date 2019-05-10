<?php
class Logout extends MY_Controller
{
	public function index()
	{
		$this->session->unset_userdata('id');
		$this->load->view('admin_login/login');
	}
}

?>