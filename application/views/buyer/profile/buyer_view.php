
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

//AJAX CODE FOR GET DYNAMIC SERVICES START
$(document).ready(function(){
  $('#school_country').on('change',function(){
      var country_name = $(this).val();
      if(country_name){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>Aschool/ajaxGetStateName',
            data:'country_name='+country_name,
            success:function(html){
                $('#school_state').html(html);
            }
          });
      }
      else{
          $('#school_state').html('<option value="">Select country first</option>');
      }
  });

  $('#school_state').on('change',function(){
      var state_name = $(this).val();
      if(state_name){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>Aschool/ajaxGetCityName',
            data:'state_name='+state_name,
            success:function(html){
                $('#school_city').html(html);
            }
          });
      }
      else{
          $('#school_city').html('<option value="">Select state first</option>');
      }
  });

  $('#school_city').on('change',function(){
      var city_name = $(this).val();
      var state_name = $('#school_state').val();
      var country_name = $('#school_country').val();
      if(school_city){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>Aschool/ajaxGetSchoolName',
            data:{city_name:city_name, state_name:state_name, country_name:country_name },
            success:function(html){
                $('#school_namee').html(html);
            }
          });
      }
      else{
          $('#school_namee').html('<option value="">Select state first</option>');
      }
  });
});
//AJAX CODE FOR GET DYNAMIC SERVICES END
</script>


<?php
	//fetch profile DATA
	$user_id = $this->session->userdata('buyer_id');
	$sql1 = 'select * from userprofile where user_id =' . $user_id ;
	$data = $this->db->query($sql1)->result_array();
	if($data){
		foreach($data as $row):
		  $id = $row['user_id'];
		  $country_name = $row['country'];
		  $gender = $row['gender'];
		  $description = $row['description'];
		  $qualification = $row['qualification'];
			$date = $row['join_date'];
		  $picture = base_url('images/resized/').$row['picture'];
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
	// fetch user data
	$sql2 = 'select * from users where user_id =' . $user_id ;
	$data2 = $this->db->query($sql2)->result_array();
	if($data2){
		foreach($data2 as $row):
		  $username = $row['username'];
		  $email = $row['email'];
			$join_since = date('Y',strtotime($date));
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}

?>

<style media="screen">
#blah{
	display: inline-block;
	position: relative;
	width: 130px;
	height: 130px;
	overflow: hidden;
	border-radius: 50%;
}
#img-gig{
	display: inline-block;
  position: relative;
  width: 250px;
  height: 200px;
  overflow: hidden;
}
</style>

<script type="text/javascript">
/*
$(document).ready(function(){
	$('#pic').on('change',function(){
			var pic = $(this).val();
			if(pic){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>BProfilec/ajaxUpdatePic',
						data:'pic='+pic,
						success:function(html){
								$('#blah').html(html);
						}
					});
			}
			else{
					$('#service').html('<option value="">Select category first</option>');
			}
	});
});
*/
</script>

<!-- PROFILE START -->
<!-- PROFILE MAIN SECTION START -->
	<div class="container main-section pt-20">
		<div class="row">
			<!-- PROFILE MAIN HEADER SECTION START -->
			<div class="col-lg-3 col-sm-12 col-12 text-center detail-part">
				<div class="row image-part m-0">
					<div class="col-lg-12 col-sm-12 col-12 user-img">
						<div class="">
							<img align="center" id="blah" class="img-editprofile" src="<?php echo $picture; ?>"class="border" alt="Profile" id="blah">
						</div><br>
					</div>
					<div class="col-lg-12 col-sm-12 col-12 user-name">
						<h2><?php echo $username; ?></h2>
						<!--	<p>Top Rated Seller</p>  -->
					</div>
					<div class="col-lg-12 col-sm-12 col-12 user-detail text-left p-2">
            <p>Gender: <span style="padding-left:47px;"><?php echo $gender; ?></span></p>
						<p>Member Since: <span style="padding-left:6px;"><?php echo $join_since; ?></span></p>
					</div>
					<div class="col-lg-12 col-sm-12 col-12 user-name">
						<small></small>
					</div>
					<div class="col-lg-12 col-sm-12 col-12 information-button">
						<a class="btn btn-success w-75" href="<?php echo base_url(); ?>edit_profile">Edit</a>
					</div>
					<br><br><br>
				</div>
			</div>
			<!-- PROFILE MAIN SECTION END -->

			<!-- PROFILE DETAIL SECTION START -->
			<div class="col-lg-9 detail-part">
				<div class="">
					<div class="row description">
						<div class="col-lg-12 col-12 bg-white rounded-top tab-head">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About Me</a>
						  </li>
						</ul>
						</div>



						<div class="col-lg-12 bg-white">
							<!-- DYNAMIC DATA - Description- Language- Skill - Education - GIGs View Code end   -->
							<div class="tab-content" id="myTabContent">
								<!-- DYNAMIC DATA - Description- Language- Skill - Education View Code end   -->
							  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							    <div class="row">
							        <div class="col-md-12">
							            <a href="#modalAddSchool" class="btn btn-success float-right" data-toggle="modal" data-target="#modalAddSchool">Add School</a>
							        </div>
                                    <div class="col-lg-12 about-detail">
									    <table class="table table-striped">
                                          <thead class="thead-inverse">
                                              <tr>
                                                  <th scope="col">School Name</th>
                                                  <th scope="col">Year</th>
                                                  <th scope="col" class="">Actions</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <!-- display categories data and modal code start   -->
                                            <?php
                                            //FETCH SCHOOL INFO
                                            	$sql4 = 'select * from userschools where user_id =' . $user_id ;
                                            	$data4 = $this->db->query($sql4)->result_array();
                                            	if($data4){
                                            		foreach($data4 as $row):
                                            			$userschool_id= $row['school_id'];
                                            			$year = $row['year'];
                                            			$school_country= $row['country'];
                                            		    $school_state= $row['state'];
                                            			$school_city= $row['city'];
                                            			$school_name= $row['school_name'];
                                            			$user_id = $row['user_id'];
                                            			$query5 = "SELECT DISTINCT school_id FROM schools WHERE school_name = '" . $school_name . "' AND city = '" . $school_city . "' AND state = '" . $school_state . "' AND country = '" . $school_country . "'";
                                                	    $data5 = $this->db->query($query5)->result_array();
                                                	    $fellows_btn = '';
                                                        if($data5){
                                                          foreach ($data5 as $row) {
                                                          	$school_id = $row['school_id'];
                                                        	$link = base_url('fellows/') .$school_id;
                                                        	$fellows_btn = '<a href="' . $link . '"class="btn btn-info float-right">View</span></a>';
                                                          }
                                                        }

                                              echo '<tr>
                                                      <td>' . $school_name .'</td>
                                                      <td>' . $year .'</td>
                                                      <td class="float-left">
                                                        '.$fellows_btn.'
                                                        <a href="#modalDeleteCategory' . $userschool_id . '" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteCategory'. $userschool_id . '">Delete</span></a>
                                                      </td>
                                                  </tr>
                                                  <!-- Delete Category Modal Start-->
                                                  <div class="modal fade" id="modalDeleteCategory'.$userschool_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Delete School</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="container col-md-12">
                                                              <form method="post" action="'. base_url('delete_userschool') .'">
                                                                <input type="hidden" name="userschool_id" class="form-control" value="' . $userschool_id . '" readonly>
                                                                <div class="form-group">
                                                                  <input type="hidden" readonly class="form-control-plaintext" id="txtUpdCatId" value="">
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
                                                  <!-- Delete Category Modal End-->';
                                            		  endforeach;
                                            		  }
                                            	else{
                                            		$not = "No data found.";
                                            	}
                                            ?>
                                            <!-- display categories data and modal code end   -->
                                          </tbody>
                                      </table>
									</div>

										<!--  Description View Code start   -->
							        <div class="col-lg-12 about-detail">
							            <h5 class="text-primary mb-1">Bio</h5>
							            <p> &nbsp;&nbsp;&nbsp;&ensp;<?php echo $description; ?></p>
							        </div>
										<!--  Description View Code end   -->

										<!--  Language View Code start   -->
							       <!-- div class="col-lg-12 about-detail">
											<table class="table">
												<thead>
													<tr>
														<td><h5 class="text-primary mb-1">Language</h5></td>
														<td><h5 class="text-primary mb-1">Level</h5></td>
													</tr>
												</thead>
													<?php
													$langsql = 'select * from languages where user_id =' . $this->session->userdata('buyer_id');
													$lang = $this->db->query($langsql)->result_array();
													if($lang){
														foreach ($lang as $row) {
													?>
													<div class="container">
														<div class="row">
															<tr>
																<td class="col-sm-8"><?php echo $row['language']; ?></td>
																<td class="col-sm-4"><?php echo $row['level']; ?></td>
															</tr>
														</div>
													</div>
													<?php
															}
														}
														else{
															?>
																<tr>
																	<td colspan="4">No Data found</td>
																</tr>
													 <?php
														}
													 ?>
											  </table>
							        </div -->
										<!--  Language View Code end   -->
							  	</div>
							  </div>
								<!-- DYNAMIC DATA - Description- Language- Skill - Education View Code end   -->
						  </div>
							<!-- DYNAMIC DATA - Description- Language- Skill - Education - GIGs View Code end   -->
					  </div>
				  </div>
			  </div>
			</div>
		</div>
	</div>
	<br><br><br>
  <!-- PROFILE DETAIL SECTION END -->
<!-- PROFILE END -->
<script type="text/javascript">
function readURL(input) {
	if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
					$('#blah')
							.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
}
</script>
<!-- Add Category Modal Start-->
<div class="modal fade" id="modalAddSchool" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="<?php echo base_url(); ?>add_school">
              <div class="form-group">
                <select name="country" type="text" class="form-control" id="school_country" placeholder="" required>
                  <option value="">Select Country</option>
                  <?php
                  $sql1 = 'select * from schoolCountries ORDER BY country_name';
                  $data = $this->db->query($sql1)->result_array();
                  if($data){
                    foreach($data as $row){
                  ?>
                      <option value="<?php echo $row['country_name'];?>"><?php echo $row['country_name']; ?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <select name="state" type="text" class="form-control" id="school_state" placeholder="" required>
                </select>
              </div>

              <div class="form-group">
                <select name="city" type="text" class="form-control" id="school_city" placeholder="" required>
                </select>
              </div>

              <div class="form-group">
                <select name="school_name" type="text" class="form-control" id="school_namee" placeholder="" required>
                </select>
              </div><hr/>

              <div class="form-group">
                <select name="year" type="text" class="form-control" id="year" placeholder="" required>
                    <option value="">Select year of attendance</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
              </div><hr/>

              <div class="float-right">
                  <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add Category Modal End-->

<!-- Add State Modal Start-->
<div class="modal fade" id="modalAddState" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="<?php echo base_url(); ?>Aschool/insert_state">
              <div class="form-group">
                <label for="exampleFormControlInput1" class="formheading">State Name</label>
                <input name="state_name" type="text" class="form-control" id="school_country" placeholder="">
              </div>
              <div class="float-right">
                  <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add Category Modal End-->

<!-- Add State Modal Start-->
<div class="modal fade" id="modalAddCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="<?php echo base_url(); ?>Aschool/insert_city">
              <div class="form-group">
                <label for="exampleFormControlInput1" class="formheading">State Name</label>
                <select name="state_name" type="text" class="form-control" id="state_name" placeholder="">
                  <?php
                    //fetch profile DATA
                    $sql1 = 'select * from states ORDER BY state_name';
                    $data = $this->db->query($sql1)->result_array();
                    if($data){
                      foreach($data as $row){
                    ?>
                        <option value="<?php echo $row['state_name'];?>"><?php echo $row['state_name']; ?></option>
                    <?php
                        }
                      }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <br>
                <label for="exampleFormControlInput1" class="formheading">City Name</label>
                <input name="city_name" type="text" class="form-control" id="city_name" placeholder="">
              </div>
              <div class="float-right">
                  <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add Category Modal End-->
