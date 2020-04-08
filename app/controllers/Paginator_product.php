<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginator_product extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Product_model");
	}


	public function index()
	{
		$this->load->library('pagination');	
		
		$config['base_url']=base_url()."Paginator_product/index/";
		$config['total_rows']=$this->Product_model->num_category();
		$config['per_page']=3;
		$config['uri_segment']=3;
		$config['num_links']=2;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = base_url()."Paginator_product/index/";
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		//echo $this->pagination->create_links();
		$result = $this->Product_model->get_pagination($config['per_page']);
		$data1['consulta']=$result;
		$this->load->view('Pagination_product_view',$data1);
	
		
	}

}
?>

