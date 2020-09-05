
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Profile | QWP</title>
  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- JQUERY JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- POPPER JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- BOOTSTRAP JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- FONT AWESOME JS -->
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <!-- EXTERNAL STYLESHEET -->
  <link href="<?php echo base_url(); ?>assets/css/createprofile_style.css" rel="stylesheet">
  <!-- FAVICON -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/qwpnotextwhite.png" type="image/gif" size="16x16">
  <style media="screen">
  img{
    display: inline-block;
    position: relative;
    width: 225px;
    height: 225px;
    overflow: hidden;
    border-radius: 50%;
  }
  input[type=file]{
   padding:10px;
  }
  .heading{
      font-weight: bold;
  }
  #createprofile-form{
    margin-left: 100px;
    margin-right: 10  0px;
  }

  </style>
</head>
<body>

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
  <div class="jumbotron" align="center">
    <h1>Welcome to Graduer</h1>
    <h3>It's time to setup your profile.</h3><br/>
  </div>
<div class="container">

  <?php echo form_open_multipart('createuserprofile' , array('id' => 'img'));?>
    <div class="form-group">
      <div align="center">
        <img align="center" id="blah" src="http://placehold.it/225" class="rounded-circle" alt="avatar" >
      </div>
      <input type="file" name="pic" tabindex="2" class="form-control-file" id="" onchange="readURL(this);" required><br><br>
      <label class="heading">Upload your profile picture</label><br/>
    </div>
    <hr/>

    <div class="form-group">
      <label for="inputAddress" class="heading" style="font-size:22px;">Tell us more about yourself, users are also interested in learning more about you in person</label>
      <br/>
      <label><b>Description</b></label>
      <textarea name="description" class="form-control" rows="4" id="desc" minlength="20" maxlength="600" placeholder="Between 150-600 characters"></textarea>
      <p align="right"><span id="profiledescription" align="right">600</span> characters remaining</p>
    </div>
    <hr/>
    <!-- Gender code start -->
    <div class="form-group">
      <label for="inputAddress" class="heading">Select your gender</label>
      <br/>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="form-check form-check-inline">
          <input name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male" required>
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
      </div>
    </div> <hr/>
    <!-- Gender code start -->

    <!-- Country code start -->
    <!-- div class="form-group">
        <label for="inputAddress" class="heading">Select the country you belong from</label>
        <br/>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-8">
          <select name="country" type="text" class="form-control" id="country" placeholder="" required>
              <option value="">Select your country:</option>
            <?php
            /** FETCH COUNTRY INFO
            $sql = 'select * from schoolCountries order by country_name';
            $data = $this->db->query($sql)->result_array();
            if($data){
                foreach($data as $country){
                  echo '<option value="' . $country['country_name'] . '">' . $country['country_name'] . '</option>';
                }
            } */
            ?>
          </select>
        </div>
      </div>
    </div -->
    <!-- Country code end -->
    <hr/>

    <!-- div class="form-group">
      <label class="heading">Add Languages</label>
      <br/>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Language 1</label>
      <div class="col-sm-3">
        <input name="language1" type="text" class="form-control" id="txtlanguage1" placeholder="">
      </div>
      <label class="col-sm-1 col-form-label">Proficiency </label>
      <div class="col-sm-3">
        <select name="llevel1" id="selectprof1" class="form-control">
          <option selected disabled>Choose...</option>
          <option value="Basic">Basic</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
      </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Language 2</label>
      <div class="col-sm-3">
        <input name="language2" type="text" class="form-control" id="txtlanguage2" placeholder="">
      </div>
      <label class="col-sm-1 col-form-label">Proficiency</label>
      <div class="col-sm-3">
        <select name="llevel2" id="selectprof2" class="form-control">
          <option selected disabled>Choose...</option>
          <option value="Basic">Basic</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
      </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Language 3</label>
      <div class="col-sm-3">
        <input name="language3" type="text" class="form-control" id="txtlanguage3" placeholder="">
      </div>
      <label class="col-sm-1 col-form-label">Proficiency</label>
      <div class="col-sm-3">
        <select name="llevel3" id="selectprof3" class="form-control">
          <option selected disabled>Choose...</option>
          <option value="Basic">Basic</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
      </select>
      </div>
    </div>
    </div>
    <hr/ -->

    <!-- School code start -->
    <div class="form-group">
        <label for="inputAddress" class="heading">Add your school</label>
        <br/>
        <div class="form-group">
          <select name="school_country" type="text" class="form-control" id="school_country" placeholder="" >
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
          <select name="school_state" type="text" class="form-control" id="school_state" placeholder="" >
          </select>
        </div>

        <div class="form-group">
          <select name="school_city" type="text" class="form-control" id="school_city" placeholder="" >
          </select>
        </div>

        <div class="form-group">
          <select name="school_name" type="text" class="form-control" id="school_namee" placeholder="" >
          </select>
        </div>
    </div>
    <!-- School code end -->
    <hr>

    <div class="form-group">
        <select name="year" type="text" class="form-control" id="year" placeholder="">
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

    <button class="btn btn-primary btn-success form-control" style="width:300px; float:right;">Create</button>
</form>
</div><br><br><br><br><br>
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

  var maxLength = 600;
  $('#desc').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength-length;
    $('#profiledescription').text(length);
  });
</script>
</body>
</html>
