
<!-- LOGIN FORM CODE START -->
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
      		<h4 class="modal-title text-center" id="exampleModalLongTitle">Login</h4>
	      	<div class="col-12 user-img">
				<img src="<?php echo base_url(); ?>assets/img/face.png" class="rounded-circle">
			</div>
        	<hr>

        <div id="messages"> </div>
        <form class="col-12" method="post" action="<?php echo base_url();?>loginc/login" id="loginForm">
          <p><b class="text-success"><?php if($this->session->flashdata('success')){ echo $this->session->flashdata('success');} ?></b></p>
          <p><b class="text-danger"><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error');} ?></b></p>
					<div class="form-group">
						<input type="text" name="u_usernamelogin" class="form-control" placeholder="Enter your Username" value="<?php echo set_value('u_usernamelogin'); ?>" required>
            <!-- <span class="text-danger"><?php //echo form_error("u_usernamelogin"); ?></span>
            <span class="text-danger"><?php //echo form_error("validate_username"); ?></span> -->
					</div>
					<div class="form-group">
						<input type="password" name="u_passwordlogin" class="form-control" placeholder="Enter your Password" value="<?php echo set_value('u_passwordlogin'); ?>" required>
            <!--<span class="text-danger"><?php //echo form_error("u_passwordlogin"); ?></span> -->
					</div>
					<button type="submit" id="submit" name="btn_f_join" class="btns btn btn-default form-control"><i class="fas fa-sign-in-alt"></i> Login </button>

        </form>
				<div class="col-12 forgot">
					<a data-target="#modalforgot" data-toggle="modal" href="#modalforgot" data-dismiss="modal">Forgot Password?</a>
				</div>
				<div class="col-12 forgot">
					New User?<a href="<?php echo base_url(); ?>signup"> Join</a>
				</div>
      </div>
    </div>
  </div>
<!-- LOGIN FORM CODE END -->
