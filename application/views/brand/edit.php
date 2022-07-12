<div class="container">
	<div class="card">
		<div class="card-header">Edit</div>
		<div class="card-body">
			<a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Add</a>
			<a href="<?php echo base_url('brand/list') ?>" class="btn btn-success">List</a>
			<?php
			//thong bao
			if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } else if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>

			<form action="<?php echo base_url('brand/update/'.$brand->id) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" value="<?php echo $brand->title ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo form_error('title') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Slug</label>
					<input type="text" name="slug_brand" value="<?php echo $brand->slug_brand ?> "class="form-control" id="exampleInputPassword1">
					<?php echo form_error('slug_brand') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input type="text" name="description" value="<?php echo $brand->description ?>" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('description') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
					<img src="<?php echo base_url('uploads/brand/' . $brand->image) ?>" width="150" height="150" alt="">
					<small><?php if (isset($error)) { echo $error; } ?></small>
				</div>

				<div class="form-group">
					<lable for="exampleFormControlSelect1">Status</lable>
					<select class="form-control" name="status" id="exampleFormControlSelect1">
						<?php if ($brand->status == 1){ ?>
						<option selected value="1">Active</option>
						<option value="0">Inactive</option>
						<?php }else{ ?>
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
