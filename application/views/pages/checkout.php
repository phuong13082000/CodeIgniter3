<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="container">
			<div class="row">
				<div class="review-payment">
					<?php
					//thong bao
					if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
					<?php } else if ($this->session->flashdata('error')) { ?>
						<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
					<?php } ?>

					<h2>Thông tin thanh toán</h2>
				</div>
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<form onsubmit="return confirm('Xác nhận đặt hàng')" method="POST" action="<?php echo base_url('confirm-checkout') ?>">
							<lable>Name
								<input type="text" name="name" placeholder="Name"/>
								<?php echo form_error('name'); ?>
							</lable>
							<lable>Address
								<input type="text" name="address" placeholder="Address"/>
								<?php echo form_error('address'); ?>
							</lable>
							<lable>Phone
								<input type="text" name="phone" placeholder="Phone"/>
								<?php echo form_error('phone'); ?>
							</lable>
							<lable>Email
								<input type="email" name="email" placeholder="Email"/>
								<?php echo form_error('email'); ?>
							</lable>
							<lable>Hình thức thanh toán
								<select name="shipping_method">
									<option value="cod">COD</option>
									<option value="vnpay">VNPAY</option>
								</select>
							</lable>
							<button type="submit" class="btn btn-default">Xác nhận thanh toán</button>
						</form>
					</div><!--/login form-->
				</div>

			</div>
		</div>

		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>

		<div class="table-responsive cart_info">
			<?php
			if ($this->cart->contents()) {
				?>
				<table class="table table-condensed">
					<thead>
					<tr class="cart_menu">
						<td class="image">Image</td>
						<td class="description">Item</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
					</thead>
					<tbody>
					<?php
					$subtotal = 0;
					$total = 0;
					foreach ($this->cart->contents() as $item) {
						$subtotal = $item['qty'] * $item['price'];
						$total += $subtotal;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/product/' . $item['options']['image']) ?>"
												width="120" height="120"
												alt="<?php echo $item['name']; ?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $item['name']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</p>
							</td>
							<td class="cart_quantity">
								<form action="<?php echo base_url('update-cart-item') ?>" method="POST">
									<div class="cart_quantity_button">
										<input type="hidden" value="<?php echo $item['rowid'] ?>" name="rowid">
										<input class="cart_quantity_input" type="number" min="1" name="quantity"
											   value="<?php echo $item['qty']; ?>">&nbsp;
										<input type="submit" name="capnhat" class="cart_quantity_button" value="Update">
									</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url('delete-cart/' . $item['rowid']) ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
					}
					?>

					<tr>
						<td colspan="4">&nbsp;</td>
						<td colspan="2">
							<table class="table table-condensed total-result">
								<tr>
									<td>Cart Sub Total</td>
									<td><?php echo number_format($total, 0, ',', '.'); ?> VND</td>
								</tr>
								<tr>
									<td>Exo Tax</td>
									<td>0 VND</td>
								</tr>
								<tr class="shipping-cost">
									<td>Shipping Cost</td>
									<td>0 VND</td>
								</tr>
								<tr>
									<td>Total</td>
									<td><span><?php echo number_format($total, 0, ',', '.'); ?> VND</span></td>
								</tr>
							</table>
						</td>
					</tr>

					</tbody>
				</table>
				<?php
			} else {
				echo '<span class="text text-danger">Add Product!</span>';
			}
			?>
		</div>

	</div>
</section> <!--/#cart_items-->
