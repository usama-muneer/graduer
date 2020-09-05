<div class="container padding10">
    <h2>Users</h2> <hr/>

    <div class="col-lg-12 col-md-12 padding15">
        <div class="table-responsive w-100 d-block d-md-table">
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($user_data)){
                      foreach ($user_data as $user_row) {
                  ?>
                    <tr>
                        <td><?php echo $user_row['user_id']; ?></td>
                        <td><?php echo $user_row['username']; ?></td>
                        <td><?php echo $user_row['email'] ?></td>
                        <td><?php echo $user_row['status']; ?></td>
                        <td>
                            <a href="#modalUpdateBuyer<?php echo $user_row['user_id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#modalUpdateBuyer<?php echo $user_row['user_id']; ?> ">Update</a>
                            <a href="#modalDeleteUser<?php echo $user_row['user_id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteUser<?php echo $user_row['user_id']; ?>">Delete</a>
                        </td>
                    </tr>

                    <!-- Update Freelancer Modal Start -->
                    <div class="modal fade" id="modalUpdateBuyer<?php echo $user_row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Freelancer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                                <form method="post" action="<?php echo base_url(); ?>Auserc/update_user">
                                  <input type="hidden" name="user_id" value="<?php echo $user_row['user_id']; ?>" readonly>
                                  <div class="form-group">
                                    <label for="updateflstatus" class="formheading">Update Status</label>
                                    <select name="status" class="form-control" id="updateflstatus" required="required">
                                      <option value="<?php echo $user_row['status']; ?>"><?php echo $user_row['status']; ?></option>
                                      <?php if($user_row['status'] == 1){$secVal = 0;} else {$secVal = 1;} ?>
                                      <option value="<?php echo $secVal; ?>"><?php echo $secVal; ?></option>
                                    </select>
                                  </div> <hr/>
                                  <div class="float-right">
                                      <button type="submit" class="btn btn-success">Update</button>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Update Freelancer Modal End -->
                    
                     <!-- Delete Category Modal Start-->
                      <div class="modal fade" id="modalDeleteUser<?php echo $user_row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                  <form method="post" action="<?php echo base_url('Auserc/delete_user'); ?>">
                                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_row['user_id']; ?>" readonly>
                                    <div class="form-group">
                                      <input type="hidden" readonly class="form-control-plaintext" id="txtUpdCatId" value="This will delete complete user record from database.">
                                    </div>
                                    <div class="form-group text-center">
                                      <label for="exampleFormControlInput1" class="formheading">Confirm Delete?</label>
                                    </div> <hr/>
                                    <div class="float-right">
                                      <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                  </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Delete Category Modal End-->
                    <?php
                  }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
