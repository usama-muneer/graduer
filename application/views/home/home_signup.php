


<!--- PHP CODE SHOW USER INSERTED CODE START
<div class="container-fluid"> -->
	<?php
	if(isset($registered)){
			echo  '<p class="text-success jumbotron text-center"><b>You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</b></p>';
		}
	 ?>
<!--</div>
PHP CODE SHOW USER INSERTED CODE END -->
<!--- JOIN AS BUYER CODE START -->

<div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
		<div class="modal-body text-center">
				<h4 class="modal-title text-center" id="exampleModalLongTitle">Join Graduer</h4>
				<div class="col-12 user-img">
			<img src="<?php echo base_url(); ?>assets/img/face.png" class="rounded-circle">
		</div>
				<hr>
			<form class="col-12" method="post" action="<?php echo base_url();?>registerc/form_validation">
				<div class="form-group">
					<input type="text" name="f_usernamejoin" class="form-control" placeholder="Choose a Username" value="<?php echo set_value('f_usernamejoin'); ?>" required>
					<span class="text-danger"><?php echo form_error("f_usernamejoin"); ?></span>
				</div>
				<div class="form-group">
					<input type="Email" name="f_emailjoin" class="form-control" placeholder="Enter your Email" value="<?php echo set_value('f_emailjoin'); ?>" required>
					<span class="text-danger"><?php echo form_error("f_emailjoin"); ?></span>
				</div>
				<div class="form-group">
					<input type="password" name="f_passwordjoin" class="form-control" placeholder="Choose a Password" value="<?php echo set_value('f_passwordjoin'); ?>" required>
					<span class="text-danger"><?php echo form_error("f_passwordjoin"); ?></span>
				</div>
				<div class="form-group">
					<input type="password" name="f_confirmpasswordjoin" class="form-control" placeholder="Reenter the Password" value="<?php echo set_value('f_confirmpasswordjoin'); ?>" required>
					<span class="text-danger"><?php echo form_error("f_confirmpasswordjoin"); ?></span>
				</div>
				<button type="submit" name="btn_f_join" class="btns btn btn-default form-control"><i class="fas fa-user-plus"></i> Sign Up</button>
	</form>
	<div class="col-12 forgot">
			Already a User?<a href="<?php echo base_url(); ?>login"> Sign In</a>
		</div>
		</div>
	</div>
</div>
