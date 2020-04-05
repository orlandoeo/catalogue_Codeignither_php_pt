<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data = $this->user_model->fetch_all();
		echo json_encode($data->result_array());
	}

	function insert()
	{
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run())
		{
			$data = array(
				'user_name'=>$this->input->post('user_name'),
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password')
			);

			$this->user_model->insert_api($data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>true,
				'user_name_error'=>form_error('user_name'),
				'email_error'=>form_error('email'),
				'password_error'=>form_error('password')
			);
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id'))
		{
			$data = $this->user_model->fetch_single_user($this->input->post('id'));

			foreach($data as $row)
			{
				$output['user_name']=$row['user_name'];
				$output['email']=$row['email'];
				$output['password']=$row['password'];
			}
			echo json_encode($output);
		}
	}

	function update()
	{
		$this->form_validation->set_rules('user_name', 'First Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run())
		{	
			$data = array(
				'user_name'=>$this->input->post('user_name'),
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password')
			);

			$this->user_model->update_api($this->input->post('id'), $data);

			$array = array(
				'success'=>true
			);
		}
		else
		{
			$array = array(
				'error'=>ture,
				'user_name_error'=>form_error('user_name'),
				'email_error'=>form_error('email'),
				'password_error'=>form_error('password')
			);
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			if($this->user_model->delete_single_user($this->input->post('id')))
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