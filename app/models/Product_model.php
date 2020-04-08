<?php
class Product_model extends CI_Model
{
	function fetch_all()
	{
		$this->db->order_by('id_product', 'DESC');
		return $this->db->get('product');
	}

	function insert_api($data)
	{
		$this->db->insert('product', $data);
	}

	function fetch_single_product($product_id)
	{
		$this->db->where('id_product', $product_id);
		$query = $this->db->get('product');
		return $query->result_array();
	}

	function update_api($product_id, $data)
	{
		$this->db->where('id_product', $product_id);
		$this->db->update('product', $data);
	}

	function delete_single_product($product_id)
	{
		$this->db->where('id_product', $product_id);
		$this->db->delete('product');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//------------------------------------------------

	
	function num_category()
	{
		$number = $this->db->query("SELECT count('name_product') as number FROM product")->row()->number;
		return intval($number);

	}

	function get_pagination($number_per_page)
	{
		return $this->db->get("product",$number_per_page, $this->uri->segment(3));
	}

}

?>
