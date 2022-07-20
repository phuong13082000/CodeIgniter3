<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">View</h3>

				<?php
				//thong bao
				if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
				<?php } else if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
				<?php } ?>

				<div class="table-responsive">
					<table class="table" style="text-align: center">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Order Code</th>
							<th scope="col">Product Name</th>
							<th scope="col">Product Image</th>
							<th scope="col">Product Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">SubTotal</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($order_details as $key => $ord) {
							?>
							<tr>
								<th scope="row"><?php echo $key ?></th>
								<td><?php echo $ord->order_code ?></td>
								<td><?php echo $ord->title ?></td>
								<td>
									<img src="<?php echo base_url('uploads/product/' . $ord->image) ?>" width="150" height="150" alt="">
								</td>
								<td><?php echo number_format($ord->price, 0, ',', '.'); ?> VND</td>
								<td><?php echo $ord->qty ?></td>
								<td><?php echo number_format($ord->qty * $ord->price, 0, ',', '.'); ?> VND</td>

							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan="7">
								<select class="xulydonhang form-select mb-3">
									<?php
									if ($ord->order_status == 1) {
										?>
										<option selected id="<?php echo $ord->order_code ?>" value="0">Xử lý đơn hàng
										</option>
										<option id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đã được xử lý - Đang giao hàng
										</option>
										<option id="<?php echo $ord->order_code ?>" value="3">Hủy đơn</option>
										<?php
									} else if ($ord->order_status == 2) {
										?>
										<option id="<?php echo $ord->order_code ?>" value="0">Xử lý đơn hàng</option>
										<option selected id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đã được xử lý - Đang giao hàng
										</option>
										<option id="<?php echo $ord->order_code ?>" value="3">Hủy đơn</option>
										<?php
									} else {
										?>
										<option id="<?php echo $ord->order_code ?>" value="0">Xử lý đơn hàng</option>
										<option id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đã được xử lý - Đang giao hàng
										</option>
										<option selected id="<?php echo $ord->order_code ?>" value="3">Hủy đơn</option>
										<?php
									}
									?>
								</select>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
