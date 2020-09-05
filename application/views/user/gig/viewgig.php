
<style media="screen">
#img-viewgig{
  display: inline-block;
  position: relative;
  width: 100px;
  height: 50px;
  overflow: hidden;
}
</style>
<br>
<div class="container">
  <h2>Gigs</h2>
  <p>Manage your gigs easily, you can always View your gigs, Edit them and also Pause / Delete them as per your requirement.</p>

<div class="d-flex flex-row-reverse">
  <div class="p-2">
    <a class="btn btn-success" style="color:white" href="<?php echo base_url(); ?>userc/creategig">Create New Gig</a><br/>
  </div>
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Active</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Paused</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Pending Approval</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <!--  ACTIVE GIGS CODE START  -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">GIG</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

          if(isset($gig_data)){
            $val = 1;
              foreach($gig_data as $row){
                $picture = $row['gig_picture'];
                $title = $row['gig_title'];
                $id = $row['gig_id'];
          ?>

          <tr>
            <th scope="row"><?php echo $val; ?></th>
            <td><img src="<?php echo base_url().$row['gig_picture'];?>" class="img-fluid" id="img-viewgig" alt="Image not found" /></td>
            <td><?php echo $title; ?></td>
            <td>
              <?php echo anchor("gigc/viewigig/{$id}", 'View', ['class'=>'btn btn-success']); ?>
              <?php echo anchor("userc/editgig/{$id}", 'Edit', ['class'=>'btn btn-info']); ?>
              <?php echo anchor("gigc/pausegig/{$id}", 'Pause', ['class'=>'btn btn-warning']); ?>
              <?php echo anchor("gigc/deletegig/{$id}", 'Delete', ['class'=>'btn btn-danger']); ?>
            </td>
              <?php
            $val++;
                }
              }
              else{
                ?>
            <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
          </tr>
      </tbody>
    </table>
  </div>
  <!--  ACTIVE GIGS CODE END  -->

  <!--  PAUSED GIGS CODE START  -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">GIG</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $user_id = $this->session->userdata('user_id');
          $sql = 'SELECT * FROM gigs WHERE gig_status= "Pause" AND user_id ='. $user_id ;
          $data = $this->db->query($sql)->result_array();
          if($data){
              foreach($data as $row){
                $picture = $row['gig_picture'];
                $title = $row['gig_title'];
                $id = $row['gig_id'];
          ?>
          <tr>
            <th scope="row"><?php echo $id ?></th>
            <td><img src="<?php echo base_url().$row['gig_picture'];?>" class="img-fluid" id="img-viewgig" alt="Image not found" /></td>
            <td><?php echo $title; ?></td>
            <td>
              <?php echo anchor("gigc/resumegig/{$id}", 'Resume', ['class'=>'btn btn-success']); ?>
              <?php echo anchor("gigc/deletegig/{$id}", 'Delete', ['class'=>'btn btn-danger']); ?>
            </td>
            <?php
              }
            }
            else{
              ?>
          <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
          </tr>
      </tbody>
    </table>
  </div>
  <!--  PAUSED GIGS CODE END  -->

  <!--  PENDING GIGS CODE START  -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">GIG</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php
        $user_id = $this->session->userdata('user_id');
        $sql = 'SELECT * FROM gigs WHERE gig_status= "Pending" AND user_id ='. $user_id ;
        $data = $this->db->query($sql)->result_array();
        if($data){
            foreach($data as $row){
              $picture = $row['gig_picture'];
              $title = $row['gig_title'];
              $id = $row['gig_id'];
        ?>
        <tr>
          <th scope="row"><?php echo $id ?></th>
          <td><img src="<?php echo base_url().$row['gig_picture'];?>" class="img-fluid" id="img-viewgig" alt="Image not found" /></td>
          <td><?php echo $title; ?></td>
          <td>
            <?php echo anchor("gigc/deletegig/{$id}", 'Delete', ['class'=>'btn btn-danger']); ?>
          </td>
          <?php
            }
          }
          else{
            ?>
        <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--  PENDING GIGS CODE END  -->
</div>
</div>
<br><br><br><br><br><br>
