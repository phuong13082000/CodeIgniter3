<?php

class OrderModel extends CI_Model
{
	public function selectOrder()
	{
		$query = $this->db->select('orders.*, shipping.*')
			->from('orders')
			->join('shipping', 'orders.shipping_id=shipping.id')
			->get();
		return $query->result();
	}

	public function selectOrderDetails($order_code)
	{
		$query = $this->db->select('order_details.quantity as qty, order_details.order_code, order_details.product_id, product.*')
			->from('order_details')
			->join('product', 'order_details.product_id=product.id')
			->where('order_code', $order_code)
			->get();
		return $query->result();
	}
}
