<div class="container-fluid pt-4 px-4">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="bg-secondary rounded h-100 p-4">
				<h3 style="text-align: center" class="mb-4">Create</h3>
				<div style="text-align: right">
					<a href="<?php echo base_url('product/list') ?>" class="btn btn-outline-primary">List</a>
				</div>
				<?php
				//thong bao
				if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
				<?php } else if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
				<?php } ?>

				<form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-floating mb-3 col-6">
							<input type="text" name="title" class="form-control" id="slug"
								   placeholder="Title" onkeyup="ChangeToSlug();">
							<label for="slug" class="form-label">Title</label>
							<?php echo form_error('title') ?>
						</div>

						<div class="form-floating mb-3 col-6">
							<input type="text" name="slug_product" class="form-control" id="convert_slug"
								   placeholder="Slug">
							<label for="convert_slug" class="form-label">Slug</label>
							<?php echo form_error('slug_product') ?>
						</div>
					</div>

					<div class="row">
						<div class="form-floating mb-3 col-6">
							<input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
							<label for="exampleInputPassword1">Price</label>
							<?php echo form_error('price') ?>
						</div>

						<div class="form-floating mb-3 col-6">
							<input type="number" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Quantity">
							<label for="exampleInputPassword1">Quantity</label>
							<?php echo form_error('quantity') ?>
						</div>
					</div>

					<div class="row">
						<div class="mb-4 col-6">
							<lable for="exampleFormControlSelect1">Brand</lable>
							<select class="form-select mb-3" name="brand_id" id="exampleFormControlSelect1">
								<?php
								foreach ($brand as $key => $bra) {
									?>
									<option value="<?php echo $bra->id ?>">
										<?php echo $bra->title ?>
									</option>
									<?php
								}
								?>
							</select>
						</div>

						<div class="mb-4 col-6">
							<lable for="exampleFormControlSelect1">Category</lable>
							<select class="form-select mb-3" name="category_id" id="exampleFormControlSelect1">
								<?php
								foreach ($category as $key => $cate) {
									?>
									<option value="<?php echo $cate->id ?>">
										<?php echo $cate->title ?>
									</option>
									<?php
								}
								?>
							</select>
						</div>

					</div>

					<div class="mb-3">
						<label for="desc_product" class="form-label">Description</label>
						<input type="text" name="description" class="form-control" id="desc_product" placeholder="Description">
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
