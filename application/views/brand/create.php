<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">Create</h3>
				<div style="text-align: right">
					<a href="<?php echo base_url('brand/list') ?>" class="btn btn-outline-primary">List</a>
				</div>
				<?php
				//thong bao
				if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
				<?php } else if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
				<?php } ?>

				<form action="<?php echo base_url('brand/store') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-floating mb-3">
						<input type="text" name="title" class="form-control" id="slug"
							   placeholder="Title" onkeyup="ChangeToSlug();">
						<label for="slug" class="form-label">Title</label>
						<?php echo form_error('title') ?>
					</div>

					<div class="form-floating mb-3">
						<input type="text" name="slug_brand" class="form-control" id="convert_slug"
							   placeholder="Slug">
						<label for="convert_slug" class="form-label">Slug</label>
						<?php echo form_error('slug_brand') ?>
					</div>

					<div class="mb-3">
						<label for="desc_brand" class="form-label">Description</label>
						<input type="text" name="description" class="form-control" id="desc_brand" placeholder="Description">
						<?php echo form_error('description') ?>
					</div>

					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label>
						<input type="file" name="image" class="form-control bg-dark" id="formFile">
						<small><?php if (isset($error)) {
								echo $error;
							} ?></small>
					</div>

					<div class="mb-4">
						<lable for="floatingSelect">Status</lable>
						<select class="form-select mb-3" name="status" id="floatingSelect"
								aria-label="Floating label select example">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>

					<button type="submit" class="btn btn-outline-primary w-100 m-2">Add</button>
				</form>
			</div>
		</div>
	</div>
