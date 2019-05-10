<?php
class Customer extends MY_Controller
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
		$this->load->model('Admin_model','am');
		// $config = [
		// 			'base_url' => base_url('customer/index'),
		// 			'per_page' => 10,
		// 			'total_rows' => $this->um->num_rows(),
		// 			'full_tag_open' => '<ul class="pagination">',
		// 			'full_tag_close' => '</ul>',
		// 			'next_tag_open' => '<li>',
		// 			'next_tag_close' => '</li>',
		// 			'prev_tag_open' => '<li>',
		// 			'prev_tag_close' => '</li>',
		// 			'num_tag_open' => '<li>',
		// 			'num_tag_close' => '</li>',
		// 			'cur_tag_open' => '<li class ="active"><a>',
		// 			'cur_tag_close' => '</a></li>'

		// ];
				// $this->pagination->initialize($config);
// $config['per_page'], $this->uri->segment(3)
				$customerDetails = $this->am->customer_details();

				$this->load->view('admin_login/inc/header');
				$this->load->view('admin_login/inc/sidebar');
				$this->load->view('admin_login/customer/customer_list',['c_details'=>$customerDetails]);
				// $this->load->view('inc/footer');
				// echo $status;
	}

	// =========================add_customer_services() Show page Add Select customer name===========================//
	public function add_customer_services()
	{
		$this->load->model('Admin_model','am');
		$customerData = $this->am->customer_details();

		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/customer/select_customer_name', ['customerData'=>$customerData]);
		$this->load->view('admin_login/inc/footer');
		// echo $status;
	}

// ======================================fetchSubDetails() Show page Add Customer================================//
	public function fetchSubDetails()
	{
		$user_name = $this->input->post('subscriberName');
		// echo $user_name;
		$this->load->model('Admin_model','am');
		$subDetails = $this->am->subDetails($user_name);

		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/customer/add_customer', ['subDetails'=>$subDetails]);
		

	}

// ===============================userValidation() Add Customer Services Details============================//
	public function userValidation()
	{
		// if($this->form_validation->run('add_customerData_rules'))
		// {
		$subDate = $this->input->post('subscriptionDate');
		$subscriptionDate = strtotime($subDate);
		$renewalsDate = $this->input->post('productValidity');
		$renewals = '+'.$renewalsDate;
        $renewalsStringdate = strtotime($renewals, $subscriptionDate);
        $renewDate = Date('d M Y', $renewalsStringdate);
		  $data = array(
			'user_id' => $this->input->post('user_id'),
			'subscriberName' => $this->input->post('subscriberName'),
			'subscriberPhone' => $this->input->post('subscriberPhone'),
			'subscriberEmail' => $this->input->post('subscriberEmail'),
			'subscriberAddress' => $this->input->post('subscriberAddress'),
			'productId' => $this->input->post('productId'),
			'productName' => $this->input->post('productName'),
			'productValidity' => $this->input->post('productValidity'),
			'productAmount' => $this->input->post('productAmount'),
			'subscriptionDate' => $subscriptionDate,
			'renewalsDate' => $renewalsStringdate,
			'status' => $this->input->post('status'),
			'pay_status' => $this->input->post('pay_status')
		);
			// print_r($data);
			
			$this->load->model('Admin_model');
			if($this->Admin_model->add_customerDetails($data))
			{
				require_once(APPPATH . 'Email/PHPMailerAutoload.php');
                      $mail = new PHPMailer;

                      $htmlversion="<p>Hi <b>".ucwords(strtolower($data['subscriberName']))."</b>,</p><p>Your service of <b>`".$data['productName']."`</b> has been started. </p> <p>Subscription Date : " .$subDate. "</p><p>Service Validity : " . $renewalsDate . '</p><p>Renewals Date : ' . $renewDate . '</p><p>Service Price : ' . $data['productAmount'] . '</p><p>Service Status : ' . $data['status'] . '</p><p>Payment Status : ' . $data['pay_status'] . '</p> <div><br></div> <p style=""><span style="font-size: 12.8px"><b><i><span style="color: rgb(247, 150, 70)">Assuring you best of our services always!</span></i></b></span><br></p><p style=""><span style="font-size: 12.8px"><b><span style="color: rgb(31, 73, 125)">ZopSoft Technology Pvt. Ltd.</span></b></span><br></p><p style=""><span style="font-size: 12.8px">Email:&nbsp;<a href="mailto:rahul@techlyn.com" target="_blank">rahul@zopsoft.com</a>,<span style="color: rgb(31, 73, 125)"> </span>Mobile:+91 9990477744<span style="color: rgb(31, 73, 125)"> | Landline: +91 124 436 2278</span></span><br></p><p style=""><span style="font-size: 12.8px">For support please email to<span style="color: rgb(31, 73, 125)"> <a href="mailto:sales@techlyn.com" target="_blank">support@zopsoft.com</a></span></span><br></p><div><span style="color: rgb(31, 73, 125)"></span>For sales please email to<span style="color: rgb(31, 73, 125)">&nbsp;<a href="mailto:sales@techlyn.com" target="_blank">sales@zopsoft.com</a></span><br></div>';
                      
                      $mail->isSMTP();                                          // Set mailer to use SMTP
                      $mail->Host = 'smtp.zoho.com';                         // Specify main and backup SMTP servers
                      $mail->SMTPAuth = true;                                // Enable SMTP authentication
                      $mail->Username = 'info@zopsoft.com';                   // SMTP username
                      $mail->Password = '3Yhj8jiu989121@#';                      // SMTP password
                      $mail->Port = 587;                                   // TCP port to connect to
                      $mail->setFrom('info@zopsoft.com', 'Zopsoft Technology Pvt Ltd');
                      // $mail->addReplyTo('ashishr9919@gmail.com', 'Your Name');
                      $mail->addAddress($data['subscriberEmail']);               // Name is optional
                      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                      $mail->isHTML(true);                                  // Set email format to HTML
                      $mail->Subject = 'Customer Services Detail';
                      $mail->Body    = $htmlversion;
                      

                   if(!$mail->send()) {
                         // echo 'Message could not be sent.';
                         echo 'Mailer Error: ' . $mail->ErrorInfo;
                   }
                   else{
		                   	$this->session->set_flashdata('msg','Service Add successfully');
							$this->session->set_flashdata('msg_class','alert alert-success');
							return redirect('admin/customer/running_task');				
                   }
				
			}
			else
			{
				$this->session->set_flashdata('msg','Data not insert please try again');
				$this->session->set_flashdata('msg_class','alert alert-danger.');
				return redirect('admin/customer/fetchSubDetails');
				// echo "not insert";
			}
		// }
		// else
		// {
		// 	return redirect('customer/fetchSubDetails');
			// $this->load->view('inc/header');
			// $this->load->view('inc/sidebar');
			// $this->load->view('customer/add_customer');
			// $this->load->view('inc/footer');
		// }
	}
	public function running_task()
	{
		$this->load->model('Admin_model','um');
		// $config = [
		// 			'base_url' => base_url('customer/running_task'),
		// 			'per_page' => 10,
		// 			'total_rows' => $this->um->num_rows(),
		// 			'full_tag_open' => '<ul class="pagination">',
		// 			'full_tag_close' => '</ul>',
		// 			'next_tag_open' => '<li>',
		// 			'next_tag_close' => '</li>',
		// 			'prev_tag_open' => '<li>',
		// 			'prev_tag_close' => '</li>',
		// 			'num_tag_open' => '<li>',
		// 			'num_tag_close' => '</li>',
		// 			'cur_tag_open' => '<li class ="active"><a>',
		// 			'cur_tag_close' => '</a></li>'

		// ];
		// $this->pagination->initialize($config);
		// $config['per_page'], $this->uri->segment(3)
		$runningDetails = $this->um->running_details();

		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/task/running_task',['running_details'=>$runningDetails]);
		$this->load->view('admin_login/inc/footer');
	}
	
	public function edit_task()
	{
		$id = $this->input->post('id');
		$post = $this->input->post();
		// print_r($id);
		$this->load->model('Admin_model','edit_task');
		if($this->edit_task->edit_task(strip_tags($id), $post))
		{
			// echo 'update';
			$this->session->set_flashdata('msg','Update success');
			$this->session->set_flashdata('msg_class','alert alert-success');
			$this->load->helper('url');
			redirect($_SERVER['HTTP_REFERER']);
				   // return redirect('admin/customer/running_task');
		}
		else
		{
			// echo 'not';
			$this->session->set_flashdata('msg','Please try again');
			$this->session->set_flashdata('msg_class','alert alert-danger.');
			redirect($_SERVER['HTTP_REFERER']);
				   // return redirect('admin/customer/running_task');
		}
	}

	public function delete_task()
	{
		$id = $this->input->post('id');
		// print_r($id);
		$this->load->model('Admin_model','del_task');
		if($this->del_task->delete_task($id))
		{
			$this->session->set_flashdata('msg','Delete success');
			$this->session->set_flashdata('msg_class','alert alert-success');
				   // return redirect('admin/customer/running_task');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('msg','Please try again');
			$this->session->set_flashdata('msg_class','alert alert-danger.');
				   // return redirect('admin/customer/running_task');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function edit_customer()
	{
		$id = $this->input->post('user_id');
		$post = $this->input->post();
		// Changes in subscriber table
		$user_name = $this->input->post('user_name');
		$phone = $this->input->post('phone');
		$user_email = $this->input->post('user_email');		
		$address = $this->input->post('address');
		// $this->load->model('Admin_model', 'edit_subscriber');
		// End Changes in subscriber table
		// print_r($id);
		$this->load->model('Admin_model','edit_customer');
		if($this->edit_customer->edit_customer(strip_tags($id),$post) && $this->edit_customer->edit_subscriber(strip_tags($id),strip_tags($user_name),strip_tags($phone),strip_tags($user_email),strip_tags($address)))
		{
			// echo 'update';
			$this->session->set_flashdata('msg','Update success');
			$this->session->set_flashdata('msg_class','alert alert-success');
				   return redirect('admin/customer');
		}
		else
		{
			// echo 'not';
			$this->session->set_flashdata('msg','Please try again');
			$this->session->set_flashdata('msg_class','alert alert-danger.');
				   return redirect('admin/customer');
		}
	}

	public function delete_customer()
	{
		$id = $this->input->post('user_id');
		// print_r($id);
		$this->load->model('Admin_model','del');
		if($this->del->delete_customer($id) && $this->del->deleteCustomerWithAllServices($id))
		{
			$this->session->set_flashdata('msg','Delete success');
			$this->session->set_flashdata('msg_class','alert alert-success');
				   return redirect('admin/customer');
		}
		else
		{
			$this->session->set_flashdata('msg','Please try again');
			$this->session->set_flashdata('msg_class','alert alert-danger.');
				   return redirect('admin/customer');
		}
	}

	public function unpaid_service()
	{
		$this->load->model('Admin_model','um');
		// $config = [
		// 			'base_url' => base_url('customer/unpaid_service'),
		// 			'per_page' => 10,
		// 			'total_rows' => $this->um->num_rows(),
		// 			'full_tag_open' => '<ul class="pagination">',
		// 			'full_tag_close' => '</ul>',
		// 			'next_tag_open' => '<li>',
		// 			'next_tag_close' => '</li>',
		// 			'prev_tag_open' => '<li>',
		// 			'prev_tag_close' => '</li>',
		// 			'num_tag_open' => '<li>',
		// 			'num_tag_close' => '</li>',
		// 			'cur_tag_open' => '<li class ="active"><a>',
		// 			'cur_tag_close' => '</a></li>'

		// ];

		// $this->pagination->initialize($config);
		// $config['per_page'], $this->uri->segment(3)
		$unpaid_task = $this->um->unpaid_task();

		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/task/unpaid_task',['unpaid_task'=>$unpaid_task]);
		$this->load->view('admin_login/inc/footer');
	}

	public function currentMonthData()
	{
		$this->load->model('Admin_model','um');
		// $config = [
		// 			'base_url' => base_url('customer/currentMonthData'),
		// 			'per_page' => 10,
		// 			'total_rows' => $this->um->num_rows(),
		// 			'full_tag_open' => '<ul class="pagination">',
		// 			'full_tag_close' => '</ul>',
		// 			'next_tag_open' => '<li>',
		// 			'next_tag_close' => '</li>',
		// 			'prev_tag_open' => '<li>',
		// 			'prev_tag_close' => '</li>',
		// 			'num_tag_open' => '<li>',
		// 			'num_tag_close' => '</li>',
		// 			'cur_tag_open' => '<li class ="active"><a>',
		// 			'cur_tag_close' => '</a></li>'

		// ];
		// $this->pagination->initialize($config);
		// $config['per_page'], $this->uri->segment(3)
		$currentMonthData = $this->um->currentMonthDetail();
		
		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/task/currentMonthData',['currentMonthData'=>$currentMonthData]);
		$this->load->view('admin_login/inc/footer');
	}

	public function showCustomer()
	{
		$date = $this->input->post('dateFrom');
		$date2 = $this->input->post('dateTo');
		 // echo $date." ". $date2;
		$this->load->model('Admin_model','um');
		$result = $this->um->showCustomer($date,$date2);
		echo json_encode($result);
	}

	// click eye button on customer service show customer sevices
	public function showCustomerServices()
	{
		$userId = $this->input->post('userId');
		$this->load->model('Admin_model','um');
		$result = $this->um->showCustomerData($userId);
		echo json_encode($result);
	}

	public function archive_services()
	{
		$this->load->model('Admin_model');
		$archive_details = $this->Admin_model->inactiveData();
		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/task/archive_service',['archive_details'=>$archive_details]);
		$this->load->view('admin_login/inc/footer');

	}

	// Add New Customer from Admin
	public function addNewCustomer()
	{
		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/customer/add_new_customer');
		$this->load->view('admin_login/inc/footer');

	}
	// add Validation for new customer
	public function newCustomerValidation()
	{
		$userData = $this->input->post();
			// print_r($userData['user_name']);
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|exact_length[10]|is_natural');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[user.user_email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('address', 'Address', 'required');

		if($this->form_validation->run())
		{
			$userData = $this->input->post();
			print_r($userData);
			$this->load->model('Admin_model');
			if($this->Admin_model->userRegister($userData))
			{
				require_once(APPPATH . 'Email/PHPMailerAutoload.php');
                      $mail = new PHPMailer;

                      $htmlversion="<p>Hi ".ucwords(strtolower($userData['user_name'])).",</p><p>Thank you for register.</p> <p>Your Email Id is " .$userData['user_email']. "</p><p>Your password is " . $userData['password'] . '</p> <div><br></div> <p style=""><span style="font-size: 12.8px"><b><i><span style="color: rgb(247, 150, 70)">Assuring you best of our services always!</span></i></b></span><br></p><p style=""><span style="font-size: 12.8px"><b><span style="color: rgb(31, 73, 125)">ZopSoft Technology Pvt. Ltd.</span></b></span><br></p><p style=""><span style="font-size: 12.8px">Email:&nbsp;<a href="mailto:rahul@techlyn.com" target="_blank">rahul@zopsoft.com</a>,<span style="color: rgb(31, 73, 125)"> </span>Mobile:+91 9990477744<span style="color: rgb(31, 73, 125)"> | Landline: +91 124 436 2278</span></span><br></p><p style=""><span style="font-size: 12.8px">For support please email to<span style="color: rgb(31, 73, 125)"> <a href="mailto:sales@techlyn.com" target="_blank">support@zopsoft.com</a></span></span><br></p><div><span style="color: rgb(31, 73, 125)"></span>For sales please email to<span style="color: rgb(31, 73, 125)">&nbsp;<a href="mailto:sales@techlyn.com" target="_blank">sales@zopsoft.com</a></span><br></div>';
                      
                      $mail->isSMTP();                                          // Set mailer to use SMTP
                      $mail->Host = 'smtp.zoho.com';                         // Specify main and backup SMTP servers
                      $mail->SMTPAuth = true;                                // Enable SMTP authentication
                      $mail->Username = 'info@zopsoft.com';                   // SMTP username
                      $mail->Password = '3Yhj8jiu989121@#';                      // SMTP password
                      $mail->Port = 587;                                   // TCP port to connect to
                      $mail->setFrom('info@zopsoft.com', 'Zopsoft Technology Pvt Ltd');
                      $mail->addAddress($userData['user_email']);               // Name is optional
                      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                      $mail->isHTML(true);                                  // Set email format to HTML
                      $mail->Subject = 'Login Detail';
                      $mail->Body    = $htmlversion;
                      

                   if(!$mail->send()) {
                         // echo 'Message could not be sent.';
                         echo 'Mailer Error: ' . $mail->ErrorInfo;
                   }
                   else{
                   			$this->session->set_flashdata('login','Registeration Success. Login detail is sent to customer register email id.');
                   			$this->session->set_flashdata('class','alert alert-success');
							return redirect('admin/Customer/addNewCustomer');
                   }
                }
                else{
                		$this->session->set_flashdata('login','Registeration Failed');
                		$this->session->set_flashdata('class','alert alert-danger');
						return redirect('admin/Customer/addNewCustomer');
                }     
			}		
			else{
					$this->load->view('admin_login/inc/header');
					$this->load->view('admin_login/inc/sidebar');
					$this->load->view('admin_login/customer/add_new_customer');
					$this->load->view('admin_login/inc/footer');	
				}
	}

	public function customerService()
	{
		$user_id = $this->uri->segment(4);
		$this->load->model('Admin_model');
		$cusService = $this->Admin_model->fetchCusSerivce($user_id);
		$this->load->view('admin_login/inc/header');
		$this->load->view('admin_login/inc/sidebar');
		$this->load->view('admin_login/customer/customer_service',['cusService'=>$cusService]);
		$this->load->view('admin_login/inc/footer');	
	}
}