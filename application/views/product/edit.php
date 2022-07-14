<div class="container">
	<div class="card">
		<div class="card-header">Edit</div>
		<div class="card-body">
			<a href="<?php echo base_url('product/list') ?>" class="btn btn-success">List</a>
			<a href="<?php echo base_url('product/create') ?>" class="btn btn-success">Add</a>
			<?php
			//thong bao
			if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } else if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>

			<form action="<?php echo base_url('product/update/' . $product->id) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" value="<?php echo $product->title ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo form_error('title') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Slug</label>
					<input type="text" name="slug_product" value="<?php echo $product->slug_product ?>" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('slug_product') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input type="text" name="description" value="<?php echo $product->description ?>" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('description') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Price</label>
					<input type="number" name="price" value="<?php echo $product->price ?>" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('price') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Quantity</label>
					<input type="text" name="quantity" value="<?php echo $product->quantity ?>" class="form-control" id="exampleInputPassword1">
					<?php echo form_error('quantity') ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
					<img src="<?php echo base_url('uploads/product/' . $product->image) ?>" width="150" height="150" alt="">
					<small><?php if (isset($error)) {
							echo $error;
						} ?></small>
				</div>

				<div class="form-group">
					<lable for="exampleFormControlSelect1">Brand</lable>
					<select class="form-control" name="brand_id" id="exampleFormControlSelect1">
						<?php
						foreach ($brand as $key => $bra) {
							?>
							<option <?php echo $bra->id == $product->brand_id ? 'selected' : '' ?> value="<?php echo $bra->id ?>">
								<?php echo $bra->title ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<lable for="exampleFormControlSelect1">Category</lable>
					<select class="form-control" name="category_id" id="exampleFormControlSelect1">
						<?php
						foreach ($category as $key => $cate) {
							?>
							<option <?php echo $cate->id == $product->brand_id ? 'selected' : '' ?> value="<?php echo $cate->id ?>">
								<?php echo $cate->title ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<lable for="exampleFormControlSelect1">Status</lable>
					<select class="form-control" name="status" id="exampleFormControlSelect1">
						<?php if ($product->status == 1) { ?>
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
