<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlogin_style.css">


<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="<?php echo base_url(); ?>assets/img/face.png">
            </div>
            <form method="post" action="<?php echo base_url('aloginc/login'); ?>" class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="admin_name" placeholder="Enter Username/Email" required>
                    <span class="text-danger"><?php echo set_value('Username'); ?></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="admin_password" placeholder="Enter Password" required>
                    <span class="text-danger"><?php echo set_value('Password'); ?></span>
                </div>
                <button type="submit" class="btn" id="adminsignin" name="btn_adminsignin"><i class="fas fa-sign-in-alt"></i>Sign In</button>
            </form>
        </div>
    </div>
