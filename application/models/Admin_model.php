<?php
class Admin_model extends CI_Model
{
	public function getUser($username, $password)
	{
		
		$q = $this->db->where(['email'=>$username, 'password'=>$password])
					  ->get('admin');
					  // echo "<pre>";
					  // print_r($q->row()->id);
		if($q->num_rows()){
			return $q->row()->id;
		}
		else{
			return false;
		}
	}

	public function userRegister($data)
	{
		return $this->db->insert('user', $data);
	}

// $limit, $offset
	public function customer_details()
	{
		$customer_data = $this->db->select('*')
								  ->from('user')
								  ->order_by('regDate', 'DESC')
								  // ->limit($limit, $offset)
								  ->get();
		return $customer_data->result();
	}

	public function subDetails($userName)
	{
		$subDetails = $this->db->select('*')
								->from('user')
								->where(['user_name'=>$userName])
								->get();
		return $subDetails->result();
	}

	public function add_customerDetails($array)
	{
		return $this->db->insert('subscriber', $array);
	}
// $limit, $offset
	public function running_details()
	{
		$customer_data = $this->db->select('*')
				 ->from('subscriber')				
				 ->where('status!=','Inactive')
				 // ->order_by('pay_date', 'ASEC')
				 // ->limit($limit, $offset)
				 ->get();
		return $customer_data->result();
	}
	// public function running_detailscount()
	// {
	// 	$customer_data = $this->db->select('*')
	// 							  ->from('subscriber')
	// 							  // ->order_by('pay_date', 'ASEC')				
	// 							  ->get();
	// 								return $customer_data->result();
	// }
// $limit, $offset
	public function unpaid_task()
	{
		$unpaid = $this->db->select('*')
								->where(['pay_status'=>'Unpaid'])
								// ->limit($limit, $offset)
								->get('subscriber');
									return $unpaid->result();
	}

	public function delete_task($id)
	{
		return $this->db->delete('subscriber',['id'=>$id]);		
	}

	public function num_rows()
	{
		$customer_data = $this->db->select('*')
				 ->from('client')
				 ->order_by('join_date', 'DESC')
				 ->get();
		return $customer_data->num_rows();
	}

	public function edit_task($id,$post)
	{
		return $this->db->where(['id'=>$id])
				->update('subscriber',$post);
		// echo $id;
		// print_r($post);
	}

	public function edit_customer($id,$post)
	{
		return $this->db->where(['user_id'=>$id])
				->update('user',$post);
		// echo $id;
		// print_r($post);
	}

	public function edit_subscriber($id, $user_name, $phone, $user_email, $address)
	{
		return $this->db->where(['user_id'=>$id])
						->update('subscriber',['subscriberName'=>$user_name, 'subscriberPhone'=>$phone, 'subscriberEmail'=>$user_email, 'subscriberAddress'=>$address]);
	}

	public function delete_customer($id)
	{
		return $this->db->delete('user',['user_id'=>$id]);		
	}

	public function deleteCustomerWithAllServices($id)
	{
		return $this->db->delete('subscriber',['user_id'=>$id]);
	}

// $limit, $offset
	public function currentMonthDetail()
	{
		$monthDetails = $this->db->select('*')
								->order_by('subscriptionDate', 'DESC')
								// ->limit($limit, $offset)
								->get('subscriber');
									return $monthDetails->result();
	}

	public function month_count()
	{
		$month_count = $this->db->select('*')
								->order_by('join_date', 'DESC')								
								->get('client');
									return $month_count->result();
	}

	public function showCustomer($first_date, $second_date)
	{
		$data = $this->db->select('*')
						->where('join_date >=', $first_date)
						->where('join_date <=', $second_date)						
				  		->get('client');
				  		
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
				  
		
	}

	public function upcomingRenewals()
	{
		$upcomingRenewals = $this->db->select("*")
									 ->where(['status'=>'Active'])
									 ->order_by('renewalsDate', 'ASEC')
									 ->limit(10)
									 ->get('subscriber');
		return $upcomingRenewals->result();
	}
	public function showCustomerData($userId)
	{
		$showCustomerData = $this->db->select("*")									 
									 ->where(['user_id'=>$userId])
									 ->get('subscriber');
		return $showCustomerData->result();
	}

	public function inactiveData()
	{
		$inactiveData = $this->db->select('*')
								 ->where(['status'=>'Inactive'])
								 ->get('subscriber');
		return $inactiveData->result();
	}

	// Fetch services Details
	public function showservice()
	{
		$service = $this->db->select('*')
							->get('services');
		return $service->result();
	}

	// Add Services
	public function addService($data)
	{
		return $this->db->insert('services', $data);
	}

	// edit Service
	public function editService($id, $data)
	{
		return $this->db->where(['serviceId'=>$id])
				->update('services',$data);
	}

	// Delete Service
	public function deleteService($id)
	{
		return $this->db->delete('services', ['serviceId'=>$id]);
	}

	// fetch subscribe service Id if delete service then alert
	public function subscribeService()
	{
		$serviceid = $this->db->select('*')
							->get('subscriber');
		return $serviceid->result();
	}

	// fetch Customer Service Click by Customer Name
	public function fetchCusSerivce($user_id)
	{
		$showCustomerData = $this->db->select("*")									 
									 ->where(['user_id'=>$user_id])
									 ->get('subscriber');
		return $showCustomerData->result();
	}
}