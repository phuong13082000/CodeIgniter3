<div class="container">
	<div class="card">
		<div class="card-header">List</div>
		<div class="card-body">
			<a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Add</a>
			<?php
			//thong bao
			if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } else if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>

			<table class="table">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Slug</th>
					<th scope="col">Description</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Brand</th>
					<th scope="col">Category</th>
					<th scope="col">Image</th>
					<th scope="col">Status</th>
					<th scope="col">Manage</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($product as $key => $prod) {
					?>
					<tr>
						<th scope="row"><?php echo $key ?></th>
						<td><?php echo $prod->title ?></td>
						<td><?php echo $prod->slug_product ?></td>
						<td><?php echo $prod->description ?></td>
						<td><?php echo number_format($prod->price,0,',','.')?> VND</td>
						<td><?php echo $prod->quantity ?></td>
						<td><?php echo $prod->tenthuonghieu ?></td>
						<td><?php echo $prod->tendanhmuc ?></td>
						<td><img src="<?php echo base_url('uploads/product/' . $prod->image) ?>" width="150" height="150" alt=""></td>
						<td><?php if ($prod->status == 1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
						<td>
							<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('product/delete/'.$prod->id) ?>" class="btn btn-danger">Delete</a>
							<a href="<?php echo base_url('product/edit/'.$prod->id) ?>" class="btn btn-warning">Edit</a>
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
