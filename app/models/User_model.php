<?php
class User_model extends CI_Model
{
	function fetch_all()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('users');
	}

	function insert_api($data)
	{
		$this->db->insert('users', $data);
	}

	function fetch_single_user($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	function update_api($user_id, $data)
	{
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
	}

	function delete_single_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete('users');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function login($user_name,$email,$password)
	{
		$this->db->where('user_name',$user_name);
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('users');

		if($query->num_rows()>0)
		{

			return true;	
		}else
		{
			return false;
		}

	}


}

?>
