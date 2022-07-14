<?php

class IndexModel extends CI_Model
{
	public function getCategoryHome()
	{
		$query = $this->db->get_where('category', ['status' => 1]);
		return $query->result();
	}

	public function getBrandHome()
	{
		$query = $this->db->get_where('brand', ['status' => 1]);
		return $query->result();
	}
}


