<?php

class BrandModel extends CI_Model
{
	public function insertBrand($data)
	{
		return $this->db->insert('brand', $data);
	}

	public function selectBrand()
	{
		$query = $this->db->get('brand');
		return $query->result();
	}
}


