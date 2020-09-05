<!-- CREATE PROFILE PAGE  -->

<!--  javascript code start -->
<script type="text/javascript">

/*
(function ( $ ) {

  $.fn.imagePicker = function( options ) {

      // Define plugin options
      var settings = $.extend({
          // Input name attribute
          name: "",
          // Classes for styling the input
          class: "form-control btn btn-default btn-block",
          // Icon which displays in center of input
          icon: "glyphicon glyphicon-plus"
      }, options );

      // Create an input inside each matched element
      return this.each(function() {
          $(this).html(create_btn(this, settings));
      });

  };

  // Private function for creating the input element
  function create_btn(that, settings) {
      // The input icon element
      var picker_btn_icon = $('<i class="'+settings.icon+'"></i>');

      // The actual file input which stays hidden
      var picker_btn_input = $('<input type="file" name="'+settings.name+'" />');

      // The actual element displayed
      var picker_btn = $('<div class="'+settings.class+' img-upload-btn"></div>')
          .append(picker_btn_icon)
          .append(picker_btn_input);

      // File load listener
      picker_btn_input.change(function() {
          if ($(this).prop('files')[0]) {
              // Use FileReader to get file
              var reader = new FileReader();

              // Create a preview once image has loaded
              reader.onload = function(e) {
                  var preview = create_preview(that, e.target.result, settings);
                  $(that).html(preview);
              }

              // Load image
              reader.readAsDataURL(picker_btn_input.prop('files')[0]);
          }
      });

      return picker_btn
  };

  // Private function for creating a preview element
  function create_preview(that, src, settings) {

          // The preview image
          var picker_preview_image = $('<img src="'+src+'" class="img-responsive img-rounded" />');

          // The remove image button
          var picker_preview_remove = $('<button class="btn btn-link"><small>Remove</small></button>');

          // The preview element
          var picker_preview = $('<div class="text-center"></div>')
              .append(picker_preview_image)
              .append(picker_preview_remove);

          // Remove image listener
          picker_preview_remove.click(function() {
              var btn = create_btn(that, settings);
              $(that).html(btn);
          });

          return picker_preview;
  };

  }( jQuery ));

$(document).ready(function() {
  $('.img-picker').imagePicker({name: 'images'});
})

*/
</script>
<!--  javascript code end -->

<!--  style code start -->
<style media="screen">
/*
.img-upload-btn {
  position: relative;
  overflow: hidden;
  background-image: url('<?php echo base_url(); ?>assets/img/profile-avatar.jpg');
  height: 110px;
  width: 110px;
  border-radius: 50%;
  background-repeat: no-repeat;
}

.img-upload-btn input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}

.img-upload-btn i {
  position: absolute;
  height: 16px;
  width: 16px;
  top: 50%;
  left: 50%;
  margin-top: -8px;
  margin-left: -8px;
}

.btn-radio {
  position: relative;
  overflow: hidden;
}

.btn-radio input[type=radio] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
*/
</style>
<!--  style code end -->


  <?php
  echo '<h1 align="center">' . $this->session->userdata('user_id') . '</h1>';
  ?>

  <!-- PROFILE Registration Form Section CODE START -->
  <div class="container">
    <?php echo form_open_multipart('userc/createuserprofile' , array('id' => 'img'));?>
      <h1 align="center">Personal Information</h1>
      <br />
      <br />
      <label for="inputImage" class="col-sm-4"><strong>Choose Profile Picture<span class="text-danger"> *</span></strong></label>
      <input type="file" name="pic" class="form-control" >
      <label for=""><strong>Description<span class="text-danger"> *</span></strong></label>
      <p><textarea class="form-control" name="p_description" value=""></textarea></p>
      <p style="font-size:10px; text-align:right">description must be between 150-600 Characters.</p>

      <label for=""><strong>Select Your Country<span class="text-danger"> *</span></strong></label>
      <select class="form-control" name="p_country">
        <option value="AFG">Afghanistan</option>
        <option value="ALA">Åland Islands</option>
        <option value="ALB">Albania</option>
        <option value="DZA">Algeria</option>
        <option value="ASM">American Samoa</option>
        <option value="AND">Andorra</option>
        <option value="AGO">Angola</option>
        <option value="AIA">Anguilla</option>
        <option value="ATA">Antarctica</option>
        <option value="ATG">Antigua and Barbuda</option>
        <option value="ARG">Argentina</option>
        <option value="ARM">Armenia</option>
        <option value="ABW">Aruba</option>
        <option value="AUS">Australia</option>
        <option value="AUT">Austria</option>
        <option value="AZE">Azerbaijan</option>
        <option value="BHS">Bahamas</option>
        <option value="BHR">Bahrain</option>
        <option value="BGD">Bangladesh</option>
        <option value="BRB">Barbados</option>
        <option value="BLR">Belarus</option>
        <option value="BEL">Belgium</option>
        <option value="BLZ">Belize</option>
        <option value="BEN">Benin</option>
        <option value="BMU">Bermuda</option>
        <option value="BTN">Bhutan</option>
        <option value="BOL">Bolivia, Plurinational State of</option>
        <option value="BES">Bonaire, Sint Eustatius and Saba</option>
        <option value="BIH">Bosnia and Herzegovina</option>
        <option value="BWA">Botswana</option>
        <option value="BVT">Bouvet Island</option>
        <option value="BRA">Brazil</option>
        <option value="IOT">British Indian Ocean Territory</option>
        <option value="BRN">Brunei Darussalam</option>
        <option value="BGR">Bulgaria</option>
        <option value="BFA">Burkina Faso</option>
        <option value="BDI">Burundi</option>
        <option value="KHM">Cambodia</option>
        <option value="CMR">Cameroon</option>
        <option value="CAN">Canada</option>
        <option value="CPV">Cape Verde</option>
        <option value="CYM">Cayman Islands</option>
        <option value="CAF">Central African Republic</option>
        <option value="TCD">Chad</option>
        <option value="CHL">Chile</option>
        <option value="CHN">China</option>
        <option value="CXR">Christmas Island</option>
        <option value="CCK">Cocos (Keeling) Islands</option>
        <option value="COL">Colombia</option>
        <option value="COM">Comoros</option>
        <option value="COG">Congo</option>
        <option value="COD">Congo, the Democratic Republic of the</option>
        <option value="COK">Cook Islands</option>
        <option value="CRI">Costa Rica</option>
        <option value="CIV">Côte d'Ivoire</option>
        <option value="HRV">Croatia</option>
        <option value="CUB">Cuba</option>
        <option value="CUW">Curaçao</option>
        <option value="CYP">Cyprus</option>
        <option value="CZE">Czech Republic</option>
        <option value="DNK">Denmark</option>
        <option value="DJI">Djibouti</option>
        <option value="DMA">Dominica</option>
        <option value="DOM">Dominican Republic</option>
        <option value="ECU">Ecuador</option>
        <option value="EGY">Egypt</option>
        <option value="SLV">El Salvador</option>
        <option value="GNQ">Equatorial Guinea</option>
        <option value="ERI">Eritrea</option>
        <option value="EST">Estonia</option>
        <option value="ETH">Ethiopia</option>
        <option value="FLK">Falkland Islands (Malvinas)</option>
        <option value="FRO">Faroe Islands</option>
        <option value="FJI">Fiji</option>
        <option value="FIN">Finland</option>
        <option value="FRA">France</option>
        <option value="GUF">French Guiana</option>
        <option value="PYF">French Polynesia</option>
        <option value="ATF">French Southern Territories</option>
        <option value="GAB">Gabon</option>
        <option value="GMB">Gambia</option>
        <option value="GEO">Georgia</option>
        <option value="DEU">Germany</option>
        <option value="GHA">Ghana</option>
        <option value="GIB">Gibraltar</option>
        <option value="GRC">Greece</option>
        <option value="GRL">Greenland</option>
        <option value="GRD">Grenada</option>
        <option value="GLP">Guadeloupe</option>
        <option value="GUM">Guam</option>
        <option value="GTM">Guatemala</option>
        <option value="GGY">Guernsey</option>
        <option value="GIN">Guinea</option>
        <option value="GNB">Guinea-Bissau</option>
        <option value="GUY">Guyana</option>
        <option value="HTI">Haiti</option>
        <option value="HMD">Heard Island and McDonald Islands</option>
        <option value="VAT">Holy See (Vatican City State)</option>
        <option value="HND">Honduras</option>
        <option value="HKG">Hong Kong</option>
        <option value="HUN">Hungary</option>
        <option value="ISL">Iceland</option>
        <option value="IND">India</option>
        <option value="IDN">Indonesia</option>
        <option value="IRN">Iran, Islamic Republic of</option>
        <option value="IRQ">Iraq</option>
        <option value="IRL">Ireland</option>
        <option value="IMN">Isle of Man</option>
        <option value="ISR">Israel</option>
        <option value="ITA">Italy</option>
        <option value="JAM">Jamaica</option>
        <option value="JPN">Japan</option>
        <option value="JEY">Jersey</option>
        <option value="JOR">Jordan</option>
        <option value="KAZ">Kazakhstan</option>
        <option value="KEN">Kenya</option>
        <option value="KIR">Kiribati</option>
        <option value="PRK">Korea, Democratic People's Republic of</option>
        <option value="KOR">Korea, Republic of</option>
        <option value="KWT">Kuwait</option>
        <option value="KGZ">Kyrgyzstan</option>
        <option value="LAO">Lao People's Democratic Republic</option>
        <option value="LVA">Latvia</option>
        <option value="LBN">Lebanon</option>
        <option value="LSO">Lesotho</option>
        <option value="LBR">Liberia</option>
        <option value="LBY">Libya</option>
        <option value="LIE">Liechtenstein</option>
        <option value="LTU">Lithuania</option>
        <option value="LUX">Luxembourg</option>
        <option value="MAC">Macao</option>
        <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
        <option value="MDG">Madagascar</option>
        <option value="MWI">Malawi</option>
        <option value="MYS">Malaysia</option>
        <option value="MDV">Maldives</option>
        <option value="MLI">Mali</option>
        <option value="MLT">Malta</option>
        <option value="MHL">Marshall Islands</option>
        <option value="MTQ">Martinique</option>
        <option value="MRT">Mauritania</option>
        <option value="MUS">Mauritius</option>
        <option value="MYT">Mayotte</option>
        <option value="MEX">Mexico</option>
        <option value="FSM">Micronesia, Federated States of</option>
        <option value="MDA">Moldova, Republic of</option>
        <option value="MCO">Monaco</option>
        <option value="MNG">Mongolia</option>
        <option value="MNE">Montenegro</option>
        <option value="MSR">Montserrat</option>
        <option value="MAR">Morocco</option>
        <option value="MOZ">Mozambique</option>
        <option value="MMR">Myanmar</option>
        <option value="NAM">Namibia</option>
        <option value="NRU">Nauru</option>
        <option value="NPL">Nepal</option>
        <option value="NLD">Netherlands</option>
        <option value="NCL">New Caledonia</option>
        <option value="NZL">New Zealand</option>
        <option value="NIC">Nicaragua</option>
        <option value="NER">Niger</option>
        <option value="NGA">Nigeria</option>
        <option value="NIU">Niue</option>
        <option value="NFK">Norfolk Island</option>
        <option value="MNP">Northern Mariana Islands</option>
        <option value="NOR">Norway</option>
        <option value="OMN">Oman</option>
        <option value="PAK">Pakistan</option>
        <option value="PLW">Palau</option>
        <option value="PSE">Palestinian Territory, Occupied</option>
        <option value="PAN">Panama</option>
        <option value="PNG">Papua New Guinea</option>
        <option value="PRY">Paraguay</option>
        <option value="PER">Peru</option>
        <option value="PHL">Philippines</option>
        <option value="PCN">Pitcairn</option>
        <option value="POL">Poland</option>
        <option value="PRT">Portugal</option>
        <option value="PRI">Puerto Rico</option>
        <option value="QAT">Qatar</option>
        <option value="REU">Réunion</option>
        <option value="ROU">Romania</option>
        <option value="RUS">Russian Federation</option>
        <option value="RWA">Rwanda</option>
        <option value="BLM">Saint Barthélemy</option>
        <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
        <option value="KNA">Saint Kitts and Nevis</option>
        <option value="LCA">Saint Lucia</option>
        <option value="MAF">Saint Martin (French part)</option>
        <option value="SPM">Saint Pierre and Miquelon</option>
        <option value="VCT">Saint Vincent and the Grenadines</option>
        <option value="WSM">Samoa</option>
        <option value="SMR">San Marino</option>
        <option value="STP">Sao Tome and Principe</option>
        <option value="SAU">Saudi Arabia</option>
        <option value="SEN">Senegal</option>
        <option value="SRB">Serbia</option>
        <option value="SYC">Seychelles</option>
        <option value="SLE">Sierra Leone</option>
        <option value="SGP">Singapore</option>
        <option value="SXM">Sint Maarten (Dutch part)</option>
        <option value="SVK">Slovakia</option>
        <option value="SVN">Slovenia</option>
        <option value="SLB">Solomon Islands</option>
        <option value="SOM">Somalia</option>
        <option value="ZAF">South Africa</option>
        <option value="SGS">South Georgia and the South Sandwich Islands</option>
        <option value="SSD">South Sudan</option>
        <option value="ESP">Spain</option>
        <option value="LKA">Sri Lanka</option>
        <option value="SDN">Sudan</option>
        <option value="SUR">Suriname</option>
        <option value="SJM">Svalbard and Jan Mayen</option>
        <option value="SWZ">Swaziland</option>
        <option value="SWE">Sweden</option>
        <option value="CHE">Switzerland</option>
        <option value="SYR">Syrian Arab Republic</option>
        <option value="TWN">Taiwan, Province of China</option>
        <option value="TJK">Tajikistan</option>
        <option value="TZA">Tanzania, United Republic of</option>
        <option value="THA">Thailand</option>
        <option value="TLS">Timor-Leste</option>
        <option value="TGO">Togo</option>
        <option value="TKL">Tokelau</option>
        <option value="TON">Tonga</option>
        <option value="TTO">Trinidad and Tobago</option>
        <option value="TUN">Tunisia</option>
        <option value="TUR">Turkey</option>
        <option value="TKM">Turkmenistan</option>
        <option value="TCA">Turks and Caicos Islands</option>
        <option value="TUV">Tuvalu</option>
        <option value="UGA">Uganda</option>
        <option value="UKR">Ukraine</option>
        <option value="ARE">United Arab Emirates</option>
        <option value="GBR">United Kingdom</option>
        <option value="USA">United States</option>
        <option value="UMI">United States Minor Outlying Islands</option>
        <option value="URY">Uruguay</option>
        <option value="UZB">Uzbekistan</option>
        <option value="VUT">Vanuatu</option>
        <option value="VEN">Venezuela, Bolivarian Republic of</option>
        <option value="VNM">Viet Nam</option>
        <option value="VGB">Virgin Islands, British</option>
        <option value="VIR">Virgin Islands, U.S.</option>
        <option value="WLF">Wallis and Futuna</option>
        <option value="ESH">Western Sahara</option>
        <option value="YEM">Yemen</option>
        <option value="ZMB">Zambia</option>
        <option value="ZWE">Zimbabwe</option>
      </select>

      <label for=""><strong>Gender<span class="text-danger"> *</span></strong></label>
      <select class="form-control" name="p_gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
        <option value="o">Other</option>
      </select>

      <input class="btn btn-success col-sm-5" type="submit" value="Submit">

    </form>
  </div>
  <!-- PROFILE Registration Form Section CODE END -->

    <!--JAVASCRIPT CODE FOR NEXT BUTTON -->
    <script>
    /*
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    */
    </script>

<?php
//@include('includes/footer.php')
?>

<script type="text/javascript">
/*
// Add multiple languages --JAVASCRIPT START
$(document).ready(function(){
  var i=1;
  $('#add_lang').click(function(){
       i++;
       $('#dynamic_field_lang').append('<tr id="row'+i+'"><td><input type="text" name="lang[]" placeholder="Language" class="form-control name_list" /></td><td><input type="text" name="langLevel[]" placeholder="Level" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_lang"><i class="fas fa-minus"></i></button></td></tr>');
  });
  $(document).on('click', '.btn_remove_lang', function(){
       var button_id = $(this).attr("id");
       $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
       $.ajax({
            url:"profileForm.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                 alert(data);
                 $('#add_name')[0].reset();
            }
       });
  });
});
// LANGUAGE CODE END

// Add multiple SKILLS --JAVASCRIPT START
$(document).ready(function(){
  var i=1;
  $('#add_skills').click(function(){
       $('#dynamic_field_skills').append('<tr id="row'+i+'"><td><input type="text" name="skills[]" placeholder="Enter Your Skills" class="form-control name_list" /></td><td><button type="button" name="remove_skills" id="'+i+'" class="btn btn-danger btn_remove_skills"><i class="fas fa-minus"></i></button></td></tr>');
       i++;
  });
  $(document).on('click', '.btn_remove_skills', function(){
       var button_id = $(this).attr("id");
       $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
       $.ajax({
            url:"profileForm.php",
            method:"POST",
            data:$('#add_skills').serialize(),
            success:function(data)
            {
                 alert(data);
                 $('#add_skills')[0].reset();
            }
       });
  });
});
// SKILLS CODE END
*/
</script>
