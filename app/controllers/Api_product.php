<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data = $this->product_model->fetch_all();
		echo json_encode($data->result_array());
	}

	function insert_product()
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('weight','Weight','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('category','Category','required');
		if($this->form_validation->run())
		{
			$data = array(
				'product_name'=>$this->input->post('product_name'),
				'description'=>$this->input->post('description'),
				'weight'=>$this->input->post('weight'),
				'price'=>$this->input->post('price'),
				'category'=>$this->input->post('category')
			);

			$this->product_model->insert_api($data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>true,
				'product_name_error'=>form_error('product_name'),
				'description_error'=>form_error('description'),
				'weight_error'=>form_error('weight'),
				'price_error'=>form_error('price'),
				'category_error'=>form_error('category')
			);
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id_product'))
		{
			$data = $this->product_model->fetch_single_product($this->input->post('id_product'));

			foreach($data as $row)
			{
				$output['product_name']=$row['product_name'];
				$output['description']=$row['description'];
				$output['weight']=$row['weight'];
				$output['price']=$row['price'];
				$output['category']=$row['category'];
			}
			echo json_encode($output);
		}
	}

	function update_product()
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('weight','Weight','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('category','Category','required');
		if($this->form_validation->run())
		{	
			$data = array(
				'product_name'=>$this->input->post('product_name'),
				'description'=>$this->input->post('description'),
				'weight'=>$this->input->post('weight'),
				'price'=>$this->input->post('price'),
				'category'=>$this->input->post('category')
			);

			$this->product_model->update_api($this->input->post('id_product'), $data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>ture,
				'product_name_error'=>form_error('product_name'),
				'description_error'=>form_error('description'),
				'weight_error'=>form_error('weight'),
				'price_error'=>form_error('price'),
				'category_error'=>form_error('category')
			);
		}
		echo json_encode($array);
	}

	function delete_product()
	{
		if($this->input->post('id_product'))
		{
			if($this->product_model->delete_single_product($this->input->post('id_product')))
			{
				$array = array(

					'success'=>true
				);
			}
			else
			{
				$array = array(
					'error'=>true
				);
			}
			echo json_encode($array);
		}
	}
}
?>
