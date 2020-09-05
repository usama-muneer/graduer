<?php
  if(isset($gig_data)){
      foreach($gig_data as $data){
        $gig_id                = $data ['gig_id'];
        $serviceCategory_name  = $data ['serviceCategory_name'];
        $service_name          = $data ['service_name'];
        $gig_title             = $data ['gig_title'];
        $gig_description       = $data ['gig_description'];
        $gig_package_desc      = $data ['gig_package_desc'];
        $gig_price             = $data ['gig_price'];
        $gig_duration          = $data ['gig_duration'];
        $gig_picture           = $data ['gig_picture'];
        $user_id               = $data ['user_id'];
  ?>

<style>

.checked {
  color: orange;
}
.details{
border: 1px solid lightgrey;
}
.gigdescription{
border: 1px solid lightgrey;
}
#img-viewgig{
  display: inline-block;
  position: relative;
  width: 530px;
  height: 380px;
  overflow: hidden;
}
</style>

<!--  VIEW GIG START -->
<br/>
<div class="container padding">
<div class="row padding">
	<div class="col-md-6 col-sm-12 col-12">
		<img src="<?php echo base_url().$data['gig_picture'];?>" class="img-fluid" id="img-viewgig" alt="Image not found" />
	</div>
	<div class="details col-md-6 col-sm-12 col-12 rounded">
		<h4><?php echo $gig_title; ?></h4>
		<hr/>
		<a href="#"><?php  echo $serviceCategory_name; ?></a> / <a href="#"><?php echo $service_name; ?></a>
		<hr/>
		<div class="row">
		<div class="col-md-3 text-center">
		<h3>$<?php echo $gig_price; ?> </h3>
		</div>
		<div class="col-md-3 text-center">
		<?php echo anchor("userc/editgig/{$gig_id}", 'Edit', ['class'=>'btn btn-success']); ?>
		</div>
		</div>
		<hr/>
		<h5>Package Description</h5>
		<p><?php echo $gig_package_desc; ?></p>
	</div>
</div>
</div>
<!-- GIG DESCRIPTION -->
<br/>
<div class="container">
	<div class="container">
	<div class="gigdescription col-12 col-md-12 rounded">
		<h5>Gig Description</h5>
		<p><?php echo $gig_description; ?></p>
	</div>
</div>
</div> <br/><br><br>

<?php
  }
}
else{
redirect(base_url() . "userc/viewgig");
}
 ?>
