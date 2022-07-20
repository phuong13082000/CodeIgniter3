<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">List</h3>

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
							<th scope="col">Name</th>
							<th scope="col">Phone</th>
							<th scope="col">Address</th>
							<th scope="col">Status</th>
							<th scope="col">Manage</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($order as $key => $ord) {
							?>
							<tr>
								<th scope="row"><?php echo $key ?></th>
								<td><?php echo $ord->order_code ?></td>
								<td><?php echo $ord->name ?></td>
								<td><?php echo $ord->phone ?></td>
								<td><?php echo $ord->address ?></td>
								<td>
									<?php
									if ($ord->status == 1) {
										echo '<span class="text text-primary">Đang chờ xử lý</span>';
									} else if ($ord->status == 2) {
										echo '<span class="text text-success">Đã giao hàng</span>';
									} else {
										echo '<span class="text text-danger">Đã hủy</span>';
									}
									?>
								</td>
								<td>
									<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('order/delete/' . $ord->order_code) ?>" class="btn btn-danger">Delete</a>
									<a href="<?php echo base_url('order/view/' . $ord->order_code) ?>" class="btn btn-warning">View</a>
								</td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
