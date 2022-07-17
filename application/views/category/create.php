<div class="container">
	<div class="card">
		<div class="card-header">Create</div>
		<div class="card-body">
			<a href="<?php echo base_url('category/list') ?>" class="btn btn-success">List</a>
			<?php
			//thong bao
			if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } else if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>

			<form action="<?php echo base_url('category/store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo form_error('title') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Slug</label>
					<input type="text" name="slug_category" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('slug_category') ?>
				</div>

				<div class="form-group">
					<label for="desc_category">Description</label>
					<input type="text" name="description" class="form-control" id="desc_category">
					<?php echo form_error('description') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
					<small><?php if (isset($error)) { echo $error; } ?></small>
				</div>

				<div class="form-group">
					<lable for="exampleFormControlSelect1">Status</lable>
					<select class="form-control" name="status" id="exampleFormControlSelect1">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
