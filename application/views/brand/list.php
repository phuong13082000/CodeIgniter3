<div class="container">
	<div class="card">
		<div class="card-header">List</div>
		<div class="card-body">
			<a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Add</a>
			<table class="table">
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
						<td><img src="<?php echo base_url('uploads/brand/' . $bra->image) ?>" width="150" height="150" alt=""></td>
						<td><?php if ($bra->status == 1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
						<td>
							<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('brand/delete/'.$bra->id) ?>" class="btn btn-danger">Delete</a>
							<a href="<?php echo base_url('brand/edit/'.$bra->id) ?>"" class="btn btn-warning">Edit</a>
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
