<?php
$config = [
			'add_customerData_rules'=> [
			[
				'field' => strip_tags('subscriberName'),
				'lable' => 'User Name',
				'rules' => 'required'
			]
			// [
			// 	'field' => strip_tags('cl_email'),
			// 	'lable' => 'Email',
			// 	'rules' => 'required|valid_email|is_unique[client.cl_email]'
			// ],
			// [
			// 	'field' => strip_tags('cl_phone'),
			// 	'lable' => 'Phone Number',
			// 	'rules' => 'required|numeric|max_length[10]'
			// ]
		],
	];
?>