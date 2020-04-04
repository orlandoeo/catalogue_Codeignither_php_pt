<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_api extends CI_Controller {

	function index()
	{
		$this->load->view('product_view');
	}

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if($data_action == "Delete")
			{
				$api_url = "http://localhost/catalogue/api_product/delete_product";

				$form_data = array(
					'id_product'=>$this->input->post('product_id')
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
				$api_url = "http://localhost/catalogue/api_product/update_product";

				$form_data = array(
					'id_product'=>$this->input->post('product_id'),
					'product_name'=>$this->input->post('product_name'),
					'description'=>$this->input->post('description'),
					'weight'=>$this->input->post('weight'),
					'price'=>$this->input->post('price'),
					'category'=>$this->input->post('category')
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
				$api_url = "http://localhost/catalogue/api_product/fetch_single";

				$form_data = array(
					'id_product'=>$this->input->post('product_id')
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
				$api_url = "http://localhost/catalogue/api_product/insert_product";
			

				$form_data = array(
					'product_name'=>$this->input->post('product_name'),
					'description'=>$this->input->post('description'),
					'weight'=>$this->input->post('weight'),
					'price'=>$this->input->post('price'),
					'category'=>$this->input->post('category')
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
				$api_url = "http://localhost/catalogue/api_product";

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
							<td>'.$row->id_product.'</td>
							<td>'.$row->product_name.'</td>
							<td>'.$row->description.'</td>
							<td>'.$row->weight.'</td>
							<td>'.$row->price.'</td>
							<td>'.$row->category.'</td>
							<td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id_product.'">Edit</button></td>
							<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id_product.'">Delete</button></td>
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
