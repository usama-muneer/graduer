

<!-- Modal Sign In CODE START -->
<div class="modal hide fade" id="modalsignin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
      		<h4 class="modal-title text-center" id="exampleModalLongTitle">Login to QWP</h4>
	      	<div class="col-12 user-img">
				<img src="<?php echo base_url(); ?>assets/img/face.png" class="rounded-circle">
			</div>
			<div id="smlogin">
				<button type="submit" name="btnflogin" class="btnf btn btn-default form-control"><i class="fab fa-facebook-square"></i>Sign In with Facebook</button>
				<br />
        		<button type="submit" name="btnglogin" class="btng btn btn-default form-control"><i class="fab fa-google"></i>Sign In with Google</button>
        	</div>
        	<hr>
        <form class="col-12" method="post" action="<?php echo base_url();?>auth/userlogin">
        	<div class="form-group">
				<input type="text" name="u_usernamelogin" class="form-control" placeholder="Email / Username" value="<?php echo set_value('u_usernamelogin');?>" required>
				<span class="text-danger"><?php echo form_error("u_usernamelogin"); ?></span>
			</div>
			<div class="form-group">
				<input type="password" name="u_passwordlogin" class="form-control" placeholder="Password" value="<?php echo set_value('u_passwordlogin');?>" required>
				<span class="text-danger"><?php echo form_error("u_passwordlogin"); ?></span>
			</div>
			<button type="submit" name="btn_u_login" class="btns btn btn-default form-control"><i class="fas fa-sign-in-alt"></i> Sign In</button>
		</form>
		<div class="col-12 forgot">
				<a data-target="#modalforgot" data-toggle="modal" href="#modalforgot" data-dismiss="modal">Forgot Password?</a>
				<br />
				<a "<?php echo base_url(); ?>signup">New User? Join</a>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Sign In CODE END -->




<!-- Modal Forgot Password CODE START -->
<div class="modal hide fade" id="modalforgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
      		<h4 class="modal-title text-center" id="exampleModalLongTitle">Reset Password</h4>
	      	<div class="col-12 user-img">
				<img src="<?php echo base_url(); ?>assets/img/face.png" class="rounded-circle">
			</div>
			<p>Enter your email address that you used to register. We'll send you an email with your username and a link to reset your password.</p>
        <form class="col-12" method="post" action="<?php echo base_url(); ?>Homec/changePasswordSendEmail">
        	<div class="form-group">
				      <input type="Email" name="email" class="form-control" placeholder="Enter your Email" value="<?php echo set_value('email'); ?>" required>
              <span><?php echo form_error('check_email'); ?></span>
			    </div>
			<button type="submit" name="btnsubmitjoin" class="btns btn btn-default form-control"><i class="fas fa-key"></i> Reset Password</button>
		</form>
		<br/>
		<div class="col-12 forgot">
				<a href="<?php echo base_url() ?>login"> Try Signing In Again </a>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Forgot Password CODE END -->
