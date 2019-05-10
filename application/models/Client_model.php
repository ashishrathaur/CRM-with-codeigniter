<?php
class Client_model extends CI_Model
{
	public function getClient($username, $password)
	{
		$this->load->database();
		$q = $this->db->where(['user_email'=>$username, 'password'=>$password])
					  ->get('user');
					  return $q->row();
					  // echo "<pre>";
					  // print_r($q->row()->id);
		// if($q->num_rows()){
		// 	return $q->row()->user_id;
		// }
		// else{
		// 	return false;
		// }
	}

// $limit, $offset
	public function running_details()
	{
		$userId = $this->session->userdata('user_id');
		$customer_data = $this->db->select('*')
				 ->from('subscriber')				 
				 ->where('status!=','Inactive')
				 ->where('user_id', $userId)
				 ->order_by('subscriptionDate', 'ASEC')
				 // ->limit($limit, $offset)
				 ->get();
		return $customer_data->result();
	}
	// public function running_detailscount()
	// {
	// 	$userId = $this->session->userdata('user_id');
	// 	$customer_data = $this->db->select('*')
	// 							  ->from('subscriber')
	// 							  ->where('user_id', $userId)
	// 							  ->order_by('pay_date', 'ASEC')				
	// 							  ->get();
	// 								return $customer_data->result();
	// }
// $limit, $offset
	public function unpaid_task()
	{
		$userId = $this->session->userdata('user_id');
		$unpaid = $this->db->select('*')
								->where(['pay_status'=>'Unpaid'])
								->where('user_id', $userId)
								// ->limit($limit, $offset)
								->get('subscriber');
									return $unpaid->result();
	}

	// public function unpaid_task_count()
	// {
	// 	$userId = $this->session->userdata('user_id');
	// 	$unpaid_data = $this->db->select('*')
	// 							->where(['pay_status'=>'Unpaid'])
	// 							->where('user_id', $userId)
	// 							->get('client');
	// 								return $unpaid_data->result();
	// }

// $limit, $offset
	public function currentMonthDetail()
	{
		$userId = $this->session->userdata('user_id');
		$monthDetails = $this->db->select('*')
								->where('user_id', $userId)
								->order_by('subscriptionDate', 'DESC')
								// ->limit($limit, $offset)
								->get('subscriber');
									return $monthDetails->result();
	}

	// public function month_count()
	// {
	// 	$userId = $this->session->userdata('user_id');
	// 	$month_count = $this->db->select('*')
	// 							->where('user_id', $userId)
	// 							->order_by('join_date', 'DESC')								
	// 							->get('client');
	// 								return $month_count->result();
	// }
// fetch my product show to user dashboard.
	public function product()
	{
		$getProduct = $this->db->select('*')
							   ->get('products');
		return $getProduct->result();
	}

// fetch user data goes to welcome.php
	public function getUserData()
	{
		$userId = $this->session->userdata('user_id');
		$userData = $this->db->select('*')
							 ->where('user_id', $userId)
							 ->get('user');
		return $userData->result();
	}
}