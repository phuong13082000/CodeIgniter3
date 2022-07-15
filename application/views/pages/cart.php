<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
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
						<td colspan="5">
							<h3>Total: </h3>
							<p class="cart_total_price"><?php echo number_format($total, 0, ',', '.'); ?> VND</p>
						</td>
						<td>
							<a href="<?php echo base_url('delete-all-cart') ?>" class="btn btn-primary">Delete all</a>
							<a href="<?php echo base_url('order-cart') ?>" class="btn btn-primary">Pay</a>
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

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your
				delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$59</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>$61</span></li>
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
