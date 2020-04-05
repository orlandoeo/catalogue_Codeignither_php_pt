<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->library('form_validation', 'pagination');
		$this->load->helper('url');
	}

	function index()
	{
		$data = $this->category_model->fetch_all();
		echo json_encode($data->result_array());
		
			
	}

	function insert_category()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'=>$this->input->post('name'),
				);

			$this->category_model->insert_api($data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>true,
				'name_error'=>form_error('name'),
				);
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id_category'))
		{
			$data = $this->category_model->fetch_single_category($this->input->post('id_category'));

			foreach($data as $row)
			{
				$output['name']=$row['name'];
			}
			echo json_encode($output);
		}
	}

	function update_category()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'name'=>$this->input->post('name')
				);

			$this->category_model->update_api($this->input->post('id_category'), $data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>ture,
				'name_error'=>form_error('name')
				);
		}
		echo json_encode($array);
	}

	function delete_category()
	{
		if($this->input->post('id_category'))
		{
			if($this->category_model->delete_single_category($this->input->post('id_category')))
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
