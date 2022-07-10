<?php

class LoginModel extends CI_Model
{
	public function checkLogin($email, $password)
	{
		$query = $this->db->where('password', $password)->get('user');
		return $query->result();
	}
}


