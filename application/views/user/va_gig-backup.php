
<style media="screen">
  .img-viewgig{
    display: inline-block;
    position: relative;
    width: 350px;
    height: 200px;
    overflow: hidden;
  }

  .pfont{
    font-size: 13px;
    color: gray;
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

<br><br><br>
<!-- SHOW GIG DYNAMICALLY CODE START  -->
<!--
<div class="" align="right" id="pagination_link"></div>
<div class="table-responsive" id="gig_table"></div>-->

<?php if(isset($service)){
  echo '<div class="container jumbotron" style="margin-top: -50px;">
          <h5 class = "text-center">'. $service .'</h5>
        </div>';

} ?>
<div class="container">
  <div class="row">
<div class="col-sm-2 border bg-light" style="padding-top:57px;height:300px;">
  <div class="card" >
    <div class="card-body text-center">
      <p>Create Your Own gig</p>
    </div>
    <div class="card-footer">
    <p class="text-center"><a class="btn btn-success" href="<?php echo base_url(); ?>userc/creategig" style="font-weight:bolder;">CREATE</a> </p>
  </div>
  </div>
</div>


<div class="contact-detail col-sm-10 border" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding-left:70px;">
    <div class="row">

      <?php
      if(isset($serviceCategory_id)){
        $sql = 'SELECT * FROM gigs WHERE gig_status= "Active" AND serviceCategory_name=' . $serviceCategory_id;
      }
      elseif(isset($service_name)){
        $sql = "SELECT * FROM gigs WHERE gig_status= 'Active' AND service_name= '" . $service_name . "'";
      }
      else{
        $sql = 'SELECT * FROM gigs WHERE gig_status= "Active"';
      }
        $gigdata = $this->db->query($sql)->result_array();
        if($gigdata){
          foreach($gigdata as $data){
            $sql1 = 'SELECT username FROM users WHERE user_id =' . $data['user_id'];
            $userdata = $this->db->query($sql1)->result_array();
            foreach($userdata as $udata){
        ?>
        <div class="col-md-4 padding card-deck">
        <div class="card">
          <img src="<?php echo base_url().$data['gig_picture']; ?>" class="img-fluid img-viewgig border" alt="Image not found" />
          <div class="card-body text-center">
            <h5 class="" style="font-size:12px;"><?php echo $data['gig_title']; ?></h5>
          </div>
          <div class="card-footer">
          <span class="text-info"><small><b><?php echo $udata['username']; ?></b></small></span>
          <span class="text-center float-right"><small>Starting from $<?php echo $data['gig_price']; ?></small></span>
        </div>
        </div>
      </div>
      <?php
            }
          }
        }
      ?>

    </div>
</div>
<!-- SHOW GIG DYNAMICALLY CODE END  -->
</div>
</div>

<?php






  /*
  if($data){
      foreach($data as $row){

        $serviceCategory_name = $row['serviceCategory_name'];
        $service_name = $row['service_name'];
        $title = $row['gig_title'];
        $picture = $row['gig_picture'];
        $id = $row['gig_id'];
  ?>


//View all gigs Dynamically CODE START
<div class="container-fluid padding">
  <div class="row padding">

  	<div class="col-md-3">
  		<div class="card">
  			<a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>assets/img/logo_design.png"></a>
  			<div class="card-body text-center">
  				<h5><a href="#">Logo Design</a></h5>
  				<p id="card_text">Build Your Brand</p>
  			</div>
  		</div>
  	</div>
  </div>
</div>
//View all gigs Dynamically CODE END

<?php
    }
  }
  */
?>
