<?php
 class Services extends MY_Controller
 {
 	public function __construct()
	{
	   parent::__construct();
	   if(!$this->session->userdata('id')){
		return redirect('admin/login');
		}
	}

	public function index()
	{
		$this->load->model('Admin_model');
		$serviceDetails = $this->Admin_model->showservice();
		json_encode($serviceDetails);
		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/services_view',['serviceDetails'=>$serviceDetails]);
	}

	public function serviceValidation()
	{
		$serviceData = $this->input->post();
		$this->form_validation->set_rules('serviceName', 'Service Name', 'required|is_unique[services.serviceName]');
		if($this->form_validation->run())
		{
			$this->load->model('Admin_model');
			if($this->Admin_model->addService($serviceData))
			{
				$this->session->set_flashdata('msg','Add success');
				$this->session->set_flashdata('msg_class','alert alert-success');
				return redirect('admin/Services');
			}
			else
			{
				$this->session->set_flashdata('msg','Failed');
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    return redirect('admin/Services');
			}
		}		
		else{
				$this->load->model('Admin_model');
				$serviceDetails = $this->Admin_model->showservice();
				$this->load->view('admin_login/inc/header');
				$this->load->view('admin_login/inc/sidebar');
				$this->load->view('admin_login/services_view',['serviceDetails'=>$serviceDetails]);
			}
	}

	public function edit_service()
	{
		$serviceData = $this->input->post();
		$id =  $serviceData['serviceId'];
		// $this->form_validation->set_rules('serviceName', 'Service Name', 'required');
		// if($this->form_validation->run())
		// {
			$this->load->model('Admin_model');
			if($this->Admin_model->editService($id, $serviceData))
			{
				$this->session->set_flashdata('msg','Update success');
				$this->session->set_flashdata('msg_class','alert alert-success');
				return redirect('admin/Services');
			}
			else
			{
				$this->session->set_flashdata('msg','Failed');
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    return redirect('admin/Services');
			}

		// }
		// else
		// {
		// 	$this->load->model('Admin_model');
		// 	$serviceDetails = $this->Admin_model->showservice();
		// 	$this->load->view('admin_login/inc/header');
		// 	$this->load->view('admin_login/inc/sidebar');
		// 	$this->load->view('admin_login/services_view',['serviceDetails'=>$serviceDetails]);
		// }
	}

	public function delete_service()
	{
		$id = $this->input->post('serviceId');
		$this->load->model('Admin_model');
		if($this->Admin_model->deleteService($id))
		{
			$this->session->set_flashdata('msg','Delete success');
			$this->session->set_flashdata('msg_class','alert alert-success');
			return redirect('admin/Services');
		}
		else
		{
			$this->session->set_flashdata('msg','Failed');
			$this->session->set_flashdata('msg_class','alert alert-danger');
			return redirect('admin/Services');
		}
	}
	public function dee()
	{
		$this->load->model('Admin_model');
		$serviceDetails = $this->Admin_model->showservice();
		echo json_encode($serviceDetails);
	}

	// fetch subscribe service Id if delete service then alert
	public function showServicesId()
	{
		$this->load->model('Admin_model');
		$serviceId = $this->Admin_model->subscribeService();
		echo json_encode($serviceId);
	}
 }



 ?>