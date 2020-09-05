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
  <div class="jumbotron" align="center">
    <h1>Welcome to QuickWorkPro</h1>
    <h3>It's time to setup your profile to let the world know who you are</h3><br/>
  </div>
<div class="container">

  <?php echo form_open_multipart('profilec/createuserprofile' , array('id' => 'img'));?>
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
      <textarea name="description" class="form-control" rows="4" id="desc" minlength="20" maxlength="600" required="required" placeholder="Between 150-600 characters"></textarea>
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
    <div class="form-group">
        <label for="inputAddress" class="heading">Select the country you belong from</label>
        <br/>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-8">
          <?php
            //FETCH COUNTRY INFO
            $sql = 'select * from countries order by country_name';
            $data = $this->db->query($sql)->result_array();
            if($data):
          ?>
          <select name="country" class="form-control" id="selectcountry" required="required">
            <?php
            foreach($data as $country):
              echo '<option value="' . $country['country_code'] . '">' . $country['country_name'] . '</option>';
            endforeach;
          endif;
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- Country code end -->
    <hr/>
    <!-- Skills code start -->
    <div class="form-group">
        <br>
      <label for="inputAddress" class="heading">Let the world know about your skills</label>
      <br/>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skill 1</label>
        <div class="col-sm-3">
          <input name="skill1" type="text" class="form-control" id="txtskill1" placeholder="">
        </div>
        <label class="col-sm-1 col-form-label">Level</label>
        <div class="col-sm-3">
          <select name="slevel1" id="selectlevel1" class="form-control">
            <option selected disabled>Choose...</option>
            <option value="Basic">Basic</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Expert">Expert</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skill 2</label>
        <div class="col-sm-3">
          <input name="skill2" type="text" class="form-control" id="txtskill2" placeholder="">
        </div>
        <label class="col-sm-1 col-form-label">Level</label>
        <div class="col-sm-3">
          <select name="slevel2" id="selectlevel2" class="form-control">
          <option selected>Choose...</option>
          <option selected disabled>Choose...</option>
          <option value="Basic">Basic</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
        </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Skill 3</label>
        <div class="col-sm-3">
          <input name="skill3" type="text" class="form-control" id="txtskill3" placeholder="">
        </div>
        <label class="col-sm-1 col-form-label">Level</label>
        <div class="col-sm-3">
          <select name="slevel3" id="selectlevel3" class="form-control">
            <option selected disabled>Choose...</option>
            <option value="Basic">Basic</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Expert">Expert</option>
        </select>
        </div>
      </div>
    </div>
    <!-- Skills code end -->
    <hr/>

    <div class="form-group">
      <label class="heading">Let the world know about the languages you understand</label>
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
    </div><hr/>

    <div class="form-group">
      <label class="heading">Enter your recent most qualification</label>
      <br/>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Degree Title</label>
      <div class="col-sm-3">
        <input name="degreetitle" type="text" class="form-control" id="txtdegreetitle" placeholder="">
      </div>
      <label class="col-sm-1 col-form-label">Year</label>
      <div class="col-sm-3">
        <input name="passingyear" type="number" class="form-control" id="txtdegreeyear">
      </div>
    </div>
    </div> <br/>

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
