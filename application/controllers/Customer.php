<?php
class Customer extends MY_Controller
{
	public function __construct()
	{
	   parent::__construct();

	   if(!$this->session->userdata('user_id')){
		return redirect('Login');
		}
	}	
	
	public function running_task()
	{
		$this->load->model('Client_model','cm');
		$runningDetails = $this->cm->running_details();

		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('task/running_task',['running_details'=>$runningDetails]);
		$this->load->view('inc/footer');
	}

	public function unpaid_service()
	{
		$this->load->model('Client_model','cm');
		
		$unpaid_task = $this->cm->unpaid_task();

		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('task/unpaid_task',['unpaid_task'=>$unpaid_task]);
		$this->load->view('inc/footer');
	}

	public function currentMonthData()
	{
		$this->load->model('Client_model','cm');		
		$currentMonthData = $this->cm->currentMonthDetail();
		
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('task/currentMonthData',['currentMonthData'=>$currentMonthData]);
		$this->load->view('inc/footer');
	}

	
}