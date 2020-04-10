<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_api extends CI_Controller {

	function index()
	{
		$this->load->view('user_view');
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/catalogue/api/delete";

				$form_data = array(
					'id'=>$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}

			if($data_action == "Edit")
			{
				$api_url = "http://localhost/catalogue/api/update";

				$form_data = array(
					'user_name'=>$this->input->post('user_name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
					'id'=>$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/catalogue/api/fetch_single";

				$form_data = array(
					'id'=>$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}

			if($data_action == "Insert")
			{
				$api_url = "http://localhost/catalogue/api/insert";
			

				$form_data = array(
					'user_name'=>$this->input->post('user_name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}
			if($data_action == "fetch_all")
			{
				$api_url = "http://localhost/catalogue/api";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '
						<tr>
							<td>'.$row->id.'</td>
							<td>'.$row->user_name.'</td>
							<td>'.$row->email.'</td>
							<td>'.$row->password.'</td>
							<td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
							<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="4" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
		}
	}
	
}

?>
