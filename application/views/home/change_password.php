<?php
  if(isset($error)){
    echo '<div class="bg-light text-center" style="height:70px;padding-top:20px;font-size:24px;">'. $error . '</div>';
  }
?>
<!-- LOGIN FORM CODE START -->
<div class="modal-dialog modal-dialog-centered" style="margin-top:-60px;">
    <div class="modal-content">
      <div class="modal-body text-center bg-light">
      		<h4 class="modal-title text-center" id="exampleModalLongTitle">Change Password Form</h4>
        	<hr>

        <div id="messages"> </div>
        <form class="col-12" method="post" action="<?php echo base_url();?>homec/changepassword" id="loginForm">
          <div class="form-group">
            <input type="text" readonly class="form-control" name="email" value="<?php echo $email; ?>" required>
          </div>
          <div class="form-group">
						<input type="password" name="newpassword" class="form-control" placeholder="Enter New Password" value="<?php echo set_value('newpassword'); ?>" required>
            <span class="text-danger" style="font-size:12px;"><?php echo form_error('confirmpassword') ?></span>
					</div>
					<div class="form-group">
						<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" value="<?php echo set_value('confirmpassword'); ?>" required>
            <!--<span class="text-danger"><?php //echo form_error("u_passwordlogin"); ?></span> -->
					</div>
					<button type="submit" id="submit" name="btn_f_join" class="btns btn btn-default form-control"> Change </button>
        </form>
      </div>
    </div>
  </div>
<!-- LOGIN FORM CODE END -->
