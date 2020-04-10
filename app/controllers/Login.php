<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		if(isset($_POST['password']))
		{
		if($this->user_model->login($_POST['user_name'],$_POST['email'],$_POST['password']))
		{
			redirect('product_api');
		}else{
			redirect('login');
		}
		}
		$this->load->view('estructure/adminLoginView');

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



}
?>
