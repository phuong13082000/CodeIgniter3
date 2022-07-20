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

	public function getAllProduct()
	{
		$query = $this->db->get_where('product', ['status' => 1]);
		return $query->result();
	}

	public function getCategoryProduct($id)
	{
		$query = $this->db->select('category.title as tendanhmuc, product.*, brand.title as tenthuonghieu')
			->from('category')
			->join('product', 'product.category_id=category.id')
			->join('brand', 'brand.id=product.brand_id')
			->where('product.category_id', $id)
			->where('product.status', 1)
			->get();
		return $query->result();
	}

	public function getBrandProduct($id)
	{
		$query = $this->db->select('category.title as tendanhmuc, product.*, brand.title as tenthuonghieu')
			->from('category')
			->join('product', 'product.category_id=category.id')
			->join('brand', 'brand.id=product.brand_id')
			->where('product.brand_id', $id)
			->where('product.status', 1)
			->get();
		return $query->result();
	}

	public function getCategoryTitle($id)
	{
		$this->db->select('category.*');
		$this->db->from('category');
		$this->db->limit(1);
		$this->db->where('category.id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $title = $result->title;
	}

	public function getBrandTitle($id)
	{
		$this->db->select('brand.*');
		$this->db->from('brand');
		$this->db->limit(1);
		$this->db->where('brand.id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $title = $result->title;
	}

	public function getProductTitle($id)
	{
		$this->db->select('product.*');
		$this->db->from('product');
		$this->db->limit(1);
		$this->db->where('product.id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $title = $result->title;
	}

	public function getProductDetails($id)
	{
		$query = $this->db->select('category.title as tendanhmuc, product.*, brand.title as tenthuonghieu')
			->from('category')
			->join('product', 'product.category_id=category.id')
			->join('brand', 'brand.id=product.brand_id')
			->where('product.id', $id)
			->where('product.status', 1)
			->get();
		return $query->result();
	}

	public function selectProductCartById($product_id)
	{
		$query = $this->db->select('category.title as tendanhmuc, product.*, brand.title as tenthuonghieu')
			->from('category')
			->join('product', 'product.category_id=category.id')
			->join('brand', 'brand.id=product.brand_id')
			->where('product.id', $product_id)
			->where('product.status', 1)
			->get();
		return $query->result();
	}
}


