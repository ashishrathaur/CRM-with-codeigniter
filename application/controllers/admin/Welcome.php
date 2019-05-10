<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->session->userdata('id')){
		return redirect('admin/Login');
	}
	else{
		$this->load->model('Admin_model','am');
		$clientcount = $this->am->customer_details();
		$unpaidcount = $this->am->unpaid_task();
		$monthcount = $this->am->currentMonthDetail();
		$upcomingRenewals = $this->am->upcomingRenewals();
		$this->load->view('admin_login/index',['clientcount'=>$clientcount, 'unpaidcount'=>$unpaidcount, 'monthcount'=>$monthcount, 'upcomingRenewals'=>$upcomingRenewals]);


		}
	}

	public function client_login()
	{
		if(!$this->session->userdata('user_id'))
		{
			return redirect('Login');
		}
	}
}
