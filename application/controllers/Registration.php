<?php
class Registration extends MY_Controller
{
	public function index()
	{
		
		$this->load->view('register');
	}

	public function register_valid()
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
                   			$this->session->set_flashdata('login','Registeration Success. Login detail is sent to your register email id.');
                   			$this->session->set_flashdata('class','alert alert-success');
							return redirect('Registration');
                   }
                }
                else{
                		$this->session->set_flashdata('login','Registeration Failed');
                		$this->session->set_flashdata('class','alert alert-danger');
						return redirect('Registration');
                }     
			}		
			else{
					$this->load->view('register');	
				}
	}
}
?>