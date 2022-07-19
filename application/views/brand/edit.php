<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">Edit</h3>
				<div style="text-align: right">
					<a href="<?php echo base_url('brand/create') ?>" class="btn btn-outline-success">Add</a>
					<a href="<?php echo base_url('brand/list') ?>" class="btn btn-outline-success">List</a>
				</div>
				<?php
				//thong bao
				if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
				<?php } else if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
				<?php } ?>

				<form action="<?php echo base_url('brand/update/' . $brand->id) ?>" method="POST" enctype="multipart/form-data">
					<div class="form-floating mb-3">
						<input type="text" name="title" value="<?php echo $brand->title ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						<label for="exampleInputEmail1">Title</label>
						<?php echo form_error('title') ?>
					</div>

					<div class="form-floating mb-3">
						<input type="text" name="slug_brand" value="<?php echo $brand->slug_brand ?> " class="form-control" id="exampleInputPassword1">
						<label for="exampleInputPassword1">Slug</label>
						<?php echo form_error('slug_brand') ?>
					</div>

					<div class="mb-3">
						<label for="desc_brand">Description</label>
						<input type="text" name="description" value="<?php echo $brand->description ?>" class="form-control" id="desc_brand">
						<?php echo form_error('description') ?>
					</div>

					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label>
						<input type="file" name="image" class="form-control bg-dark" id="formFile">
						<img src="<?php echo base_url('uploads/brand/' . $brand->image) ?>" width="150" height="150" alt="">
						<small><?php if (isset($error)) {
								echo $error;
							} ?></small>
					</div>

					<div class="mb-4">
						<lable for="floatingSelect">Status</lable>
						<select class="form-select mb-3" name="status" id="floatingSelect">
							<?php if ($brand->status == 1) { ?>
								<option selected value="1">Active</option>
								<option value="0">Inactive</option>
							<?php } else { ?>
								<option value="1">Active</option>
								<option selected value="0">Inactive</option>
							<?php } ?>
						</select>
					</div>

					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
