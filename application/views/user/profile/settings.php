
<br><br>
<!-- PAGE CONTENT START -->
<div class="padding10">
<div class="container padding10 border rounded">
  <h3>Settings</h3>
  <hr/>
  <form method="post" action="<?php echo base_url(); ?>profilec/changepassword">
    <h5>Change Password</h5>

    <div class="form-group row padding10">
      <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
      <div class="col-sm-4">
        <input type="password" name="currentpassword" class="form-control" id="inputPassword" placeholder="type your current password">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
      <div class="col-sm-4">
        <input type="password" name="newpassword" class="form-control" id="inputPassword" placeholder="type your new password">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Retype New Password</label>
      <div class="col-sm-4">
        <input type="password" name="newpasswordconfirm" class="form-control" id="inputPassword" placeholder="retype your new password">
      </div>
    </div>
    <div class="padding10">
      <button class="btn btn-success">Change Password</button>
    </div>
  </form> <hr/>

  <h5>Go Offline</h5>
  <div class="padding10">
     <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Go Offline For</label>
      <div class="col-sm-4">
        <select class="form-control" id="exampleFormControlSelect1">
          <option value="1 hour">1 Hour</option>
          <option value="1 day">1 Day</option>
          <option value="1 week">1 Week</option>
          <option value="1 month">1 Month</option>
          <option value="1 year">1 Year</option>
        </select>
      </div>
    </div>
  </div>
  <div>
      <button class="btn btn-warning">Go Offline</button>
  </div><hr/>

  <h5>Deactive Account</h5>
  <div class="padding10">
    <p class="formheading">What happens when you deactivate your account?</p>
    <ul>
      <li>Your profile and Gigs won't be shown on QWP anymore.</li>
      <li>Active orders will be cancelled.</li>
      <li>You won't be able to re-activate your Gigs.</li>
    </ul>
  </div>
  <div>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeactivate">Deactivate Account</button>
  </div> <hr/>

</div>
</div>
<!-- PAGE CONTENT END -->


<!-- DEACTIVATE CONFIRMATION -->
<div class="modal fade" id="modalDeactivate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Warning: You won't be able to log in again
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url(); ?>profilec/deactivate_profile" class="btn btn-danger">Deactivate</a>
      </div>
    </div>
  </div>
</div>
