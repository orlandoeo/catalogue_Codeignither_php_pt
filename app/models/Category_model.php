<?php
class Category_model extends CI_Model
{

	function fetch_all()
	{
		$this->db->order_by('id_category', 'DESC');
		return $this->db->get('category');
	}

	function insert_api($data)
	{
		$this->db->insert('category', $data);
	}

	function fetch_single_Category($category_id)
	{
		$this->db->where('id_category', $category_id);
		$query = $this->db->get('category');
		return $query->result_array();
	}

	function update_api($category_id, $data)
	{
		$this->db->where('id_category', $category_id);
		$this->db->update('category', $data);
	}

	function delete_single_category($category_id)
	{
		$this->db->where('id_category', $category_id);
		$this->db->delete('category');
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
		$number = $this->db->query("SELECT count('name') as number FROM category")->row()->number;
		return intval($number);

	}

	function get_pagination($number_per_page)
	{
		return $this->db->get("category",$number_per_page, $this->uri->segment(3));
	}

	
}

?>
