<div class="container">
	<h3>Login Admin</h3>
	<?php
	//thong bao
	if ($this->session->flashdata('success')) {
		?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
		<?php
	} else if ($this->session->flashdata('error')) {
		?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
		<?php
	}
	?>
	<form action="<?php echo base_url('login-user') ?>" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1"
				   name="email">
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1"
				   name="password">
			<?php echo form_error('password'); ?>
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>
