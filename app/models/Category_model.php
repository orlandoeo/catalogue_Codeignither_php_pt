<?php
class Category_model extends CI_Model
{
	function getCategory()
    {
		$sql = $this->db->get('category');
		return $sql->result();
       
    } 
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
	
}

?>
