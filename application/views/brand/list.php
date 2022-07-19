<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">List</h3>
				<div style="text-align: right">
					<a href="<?php echo base_url('brand/create') ?>" class="btn btn-outline-primary">Add</a>
				</div>
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
							<th scope="col">Title</th>
							<th scope="col">Slug</th>
							<th scope="col">Description</th>
							<th scope="col">Image</th>
							<th scope="col">Status</th>
							<th scope="col">Manage</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($brand as $key => $bra) {
							?>
							<tr>
								<th scope="row"><?php echo $key ?></th>
								<td><?php echo $bra->title ?></td>
								<td><?php echo $bra->slug_brand ?></td>
								<td><?php echo $bra->description ?></td>
								<td>
									<img src="<?php echo base_url('uploads/brand/' . $bra->image) ?>" width="150" height="150" alt="">
								</td>
								<td><?php if ($bra->status == 1) {
										echo 'Active';
									} else {
										echo 'InActive';
									} ?></td>
								<td>
									<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('brand/delete/' . $bra->id) ?>" class="btn btn-danger">Delete</a>
									<a href="<?php echo base_url('brand/edit/' . $bra->id) ?>"" class="btn
									btn-warning">Edit</a>
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
