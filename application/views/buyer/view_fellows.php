
<style media="screen">

  .pfont{
    font-size: 13px;
    color: gray;
  }

  #blah{
  	display: inline-block;
  	position: relative;
  	width: 130px;
  	height: 130px;
  	overflow: hidden;
  	border-radius: 50%;
  }

</style>

<script type="text/javascript">
  $(document).ready(function(){
    function load_gig_data(page){
      .ajax({
        url: "<?php echo base_url(); ?>brequestc/pagination"+page,
        method: "GET",
        dataType: "json",
        success:function(data){
          $('#gig_table').html(data.gig_table);
          $('#pagination_link').html(data.pagination_link)
        }
      });
    }
    //load_gig_data(1);
  });
</script>

<br>
<!-- SHOW GIG DYNAMICALLY CODE START  -->
<!--
<div class="" align="right" id="pagination_link"></div>
<div class="table-responsive" id="gig_table"></div>-->

<div class="container">
  <?php
  if(isset($school_data)){
      ?>
    <h3 class='text-center'><?php  print_r($school_data[0]['school_name'] . ", " . $school_data[0]['city'] . ", " . $school_data[0]['state'] . ", " . $school_data[0]['country']); ?></h3>
  <?php
  }
  ?>
</div>
<br>
<div class="contact-detail col-sm-12 border" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <br>
    <div class="row">
      <?php
        if(isset($school_data)){
          foreach ($school_data as $row_data) {
            $uuser_id = $row_data['user_id'];
            $query = "SELECT u.user_id, p.picture, p.gender, u.username, p.join_date  FROM userprofile as p, users as u WHERE u.user_id = '" . $uuser_id . "' AND p.user_id = '" . $uuser_id . "'";
            $rows = $this->db->query($query)->result_array();
            foreach ($rows as $row){
              echo '<div class="col-md-3 padding card-deck">
                      <div class="card">
                        <a href="'. base_url() .'" class="rounded text-center"><img src="'.base_url().$row['picture'] .'" class="img-fluid img-viewgig" alt="profile" id="blah" /></a>
                        <div class="card-footer">
                        <p class="card-text text-muted"><small class="text-muted">Name: <a href="'.base_url() .'" class="text-dark text-muted" <span style="padding-left:67px;">'. $row['username'] .'</a></small></p>

                          <p><span class="text-center text-muted"> <small>Gender: <span style="padding-left:59px;">'. $row['gender'] .'</span></small></span></p>
                          <span class="text-center text-muted"> <small>Member Since: <span style="padding-left:25px;">'. $row['join_date'] .'</span></small></span>
                        </div>
                      </div>
                    </div>';
            }
          }
        }
        else{
          echo '<div class="container jumbotron" style="margin-top:-70px;height:50px;">
                  <h5 class = "text-center">No user found</h5>
                </div>';
        }
      ?>

    </div>
</div>
<!-- SHOW GIG DYNAMICALLY CODE END  -->
</div>
</div>
<br><br><br><br><br><br>
