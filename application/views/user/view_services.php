

<br><br><br>
<div class="container col-sm-12" align="center" style="padding-left:120px">
    <div class="row">
<!--- Services Card Deck 4col-->

    <?php if(isset($service)){
      echo '<div class="container jumbotron" style="margin-top: -50px;">
              <h5 class = "text-center">'. $service .'</h5>
            </div>';

    } ?>
    <?php
    if(isset($service_data)){
      foreach ($service_data as $service_row) {
        $service_id           = $service_row['service_id'];
        $serviceCategory_name = $service_row['serviceCategory_name'];
        $service_name         = $service_row['service_name'];
        $service_picture      = base_url().$service_row['picture'];
        ?>
        <div class="col-md-3 padding card-deck">
          <div class="card">
            <a href="<?php echo base_url('userc/va_gig/'. $service_id); ?>"><img src="<?php echo $service_picture; ?>" class="img-fluid img-viewgig" alt="Image not found" /></a>
            <div class="card-body text-center">
              <p><b><?php echo $service_name ?></b></p>
            </div>
            <div class="card-footer bg-info">
              <a href="<?php echo base_url('userc/va_gig/'. $service_id); ?>" class="btn btn-info">View Gigs</a>
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div>
</div>
<br><br>
