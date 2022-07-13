<?php

class ProductModel extends CI_Model
{
	public function insertProduct($data)
	{
		return $this->db->insert('product', $data);
	}

	public function selectAllProduct()
	{
		$query = $this->db->select('category.title as tendanhmuc, product.*, brand.title as tenthuonghieu')
			->from('category')
			->join('product', 'product.category_id=category.id')
			->join('brand', 'brand.id=product.brand_id')
			->where('product.status', 1)->get();
		return $query->result();
	}

	public function selectProductById($id)
	{
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query->row();
	}

	public function updateProduct($id, $data)
	{
		return $this->db->update('product', $data, ['id' => $id]);
	}

	public function deleteProduct($id)
	{
		return $this->db->delete('product', ['id' => $id]);
	}

}


