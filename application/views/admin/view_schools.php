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
  
  $('#city_country').on('change',function(){
      var country_name = $(this).val();
      if(country_name){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>Aschool/ajaxGetStateName',
            data:'country_name='+country_name,
            success:function(html){
                $('#city_state').html(html);
            }
          });
      }
      else{
          $('#city_state').html('<option value="">Select country first</option>');
      }
  });
});
//AJAX CODE FOR GET DYNAMIC SERVICES END
</script>

<div class="container padding10">
  <h2>Schools</h2> <hr/>
  <div class="container row">
      <button class="btn btn-success col-md-2" data-toggle="modal" data-target="#modalAddCountry">Add Country</button>
      <span class="col-md-1"></span>
      <button class="btn btn-success col-md-2" data-toggle="modal" data-target="#modalAddState">Add Region</button>
      <span class="col-md-1"></span>
      <button class="btn btn-success col-md-2" data-toggle="modal" data-target="#modalAddCity">Add City</button>
      <span class="col-md-1"></span>
      <button class="btn btn-success col-md-2" data-toggle="modal" data-target="#modalAddCategory">Add School</button>
      <span class="col-md-1"></span>
  </div>

  <div class="col-lg-12 col-md-12 padding15">
      <div class="table-responsive w-100 d-block d-md-table">
          <table class="table table-striped">
              <thead class="thead-inverse">
                  <tr>
                      <th>Country</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>School Name</th>
                      <th colspan="2" class="text-center">Actions</th>
                      <th></th>
                  </tr>
              </thead>

              <tbody>
                <!-- display categories data and modal code start   -->
                <?php
                  if(isset($data)){
                    foreach ($data as $school_row) {
                      echo '<tr>
                              <td>' . $school_row['country'] .'</td>
                              <td>' . $school_row['state'] .'</td>
                              <td>' . $school_row['city'] .'</td>
                              <td>' . $school_row['school_name'] .'</td>
                              <td>
                                <a href="#modalDeleteCategory' . $school_row['school_id'] . '" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteCategory'. $school_row['school_id'] . '">Delete</a>
                              </td>
                          </tr>
                          
                              

                          <!-- Delete Category Modal Start-->
                          <div class="modal fade" id="modalDeleteCategory'.$school_row['school_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Delete School</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                      <form method="post" action="'. base_url('Aschool/delete_school') .'">
                                        <input type="hidden" name="category_id" class="form-control" value="' . $school_row['school_id'] . '" readonly>
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
                    }
                  }
                ?>
                <!-- display categories data and modal code end   -->
              </tbody>
          </table>
      </div>
  </div>
</div>

<!--   MODEL CODE   -->

<!-- Add School Modal Start-->
<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <form method="post" action="<?php echo base_url(); ?>Aschool/insert_school">
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
                <input name="school_name" type="text" class="form-control" id="school_name" placeholder="Enter Schoole Name:" required>
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
<!-- Add School Modal End-->

<!-- Add Country Modal Start-->
<div class="modal fade" id="modalAddCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="<?php echo base_url(); ?>Aschool/insert_schoolcountry">
              <div class="form-group">
                <label for="exampleFormControlInput1" class="formheading">Country Name</label>
                <input name="country_name" type="text" class="form-control" id="country_name" placeholder="" required>
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
<!-- Add Country Modal End-->

<!-- Add State Modal Start-->
<div class="modal fade" id="modalAddState" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Region</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="<?php echo base_url(); ?>Aschool/insert_state">
              <div class="form-group">
                <select name="country_name" type="text" class="form-control" id="country_name" placeholder="" required>
                  <option value="">Select Country</option>
                  <?php
                    //fetch profile DATA
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
                <input name="state_name" type="text" class="form-control" id="state_name" placeholder="Enter Region Name:" required>
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
<!-- Add State Modal End-->

<!-- Add City Modal Start-->
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
                <select name="country_name" type="text" class="form-control" id="city_country" placeholder="" required>
                  <option value="">Select Country</option>
                  <?php
                    //fetch profile DATA
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
                <select name="state_name" type="text" class="form-control" id="city_state" placeholder="" required>
                </select>
              </div>
              <div class="form-group">
                <input name="city_name" type="text" class="form-control" id="city_name" placeholder="Enter City Name:" required>
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
<!-- Add City Modal End-->




<!--td>
                                <a href="#modalUpdateCategory' . $school_row['school_id'] . '" class="btn btn-success" data-toggle="modal" data-target="#modalUpdateCategory'. $school_row['school_id'] . '">Update</a>
                              </td-->
                          <!-- Update Category Modal Start-->
                          <!-- div class="modal fade" id="modalUpdateCategory'.$school_row['school_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Update Service Category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                      <form method="post" action="'. base_url('Aschool/update_school') .'">
                                        <input type="hidden" name="school_id" class="form-control" value="' . $school_row['school_id'] . '" readonly>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1" class="formheading">Country Name</label>
                                          <input name="country" type="text" class="form-control" id="txtUpdCatName" value="' . $school_row['country'] . '">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1" class="formheading">Region Name</label>
                                          <input name="state" type="text" class="form-control" id="txtUpdCatName" value="' . $school_row['state'] . '">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1" class="formheading">City Name</label>
                                          <input name="city" type="text" class="form-control" id="txtUpdCatName" value="' . $school_row['city'] . '">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1" class="formheading">School Name</label>
                                          <input name="school_name" type="text" class="form-control" id="txtUpdCatName" value="' . $school_row['school_name'] . '">
                                        </div> <hr/>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div -->
                          <!-- Update Category Modal End-->