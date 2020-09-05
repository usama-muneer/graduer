<?php
/*
    if($gig_id){
    $user_id = $this->session->userdata('user_id');
    $sql = 'SELECT * FROM gigs WHERE gig_status= "Active" AND gig_id ='. $gig_id;
    $gigdata = $this->db->query($sql)->result_array();
    if($gigdata){
      foreach($gigdata as $data){
        $gig_id               = $data ['gig_id'];
        $serviceCategory_name = $data ['serviceCategory_name'];
        $service_name         = $data ['service_name'];
        $gig_title            = $data ['gig_title'];
        $gig_description      = $data ['gig_description'];
        $gig_package_desc     = $data ['gig_package_desc'];
        $gig_price            = $data ['gig_price'];
        $gig_duration         = $data ['gig_duration'];
        $gig_picture          = $data ['gig_picture'];
        */

?>


<!--STEPPER-->
<br/>
<div class="container">
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step col-xs-3">
              <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
              <p><small>Overview</small></p>
          </div>
          <div class="stepwizard-step col-xs-3">
              <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
              <p><small>Pricing</small></p>
          </div>
          <div class="stepwizard-step col-xs-3">
              <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
              <p><small>Description</small></p>
          </div>
          <div class="stepwizard-step col-xs-3">
              <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
              <p><small>Gallery</small></p>
          </div>
          <div class="stepwizard-step col-xs-3">
              <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
              <p><small>Publish</small></p>
          </div>
          <br><br>
      </div>
  </div>
  <!-- Form code start  -->
  <?php echo form_open_multipart("gigc/editgig/{$gig_id}" , array('id' => 'img'));?>
  <!-- gig_title -->
  <!-- serviceCategory_name -->
  <!-- service_name -->
    <div class="panel panel-primary setup-content" id="step-1">
      <div class="panel-heading">
        <h3 class="panel-title">Overview</h3>
      </div>
      <div class="panel-body">
        <!-- gig title -->
        <div class="form-group">
          <label><b>Gig Title</b></label>
          <input name="gig_title" value="<?php echo $gig_title; ?>" readonly maxlength="80" type="text" required="required" class="form-control" />
          <p align="right"><span id="gigtitle" align="right">80</span> characters remaining</p>
        </div><hr/>

        <label class="control-label">Please choose the category and service most suitable for your Gig.</label>
        <div class="form-row">
          <!-- serviceCategory_name -->
          <div class="form-group col-md-6">
            <label><b>Category</b></label>
            <select name="serviceCategory_name" class="form-control" id="sel_category" required="required" readonly>
  				    <option value="<?php echo $serviceCategory_name; ?>"><?php echo $serviceCategory_name; ?></option>
            </select>
            <small>*Required</small>
          </div>

          <!-- service_name -->
          <div class="form-group col-md-6">
            <label><b>Service</b></label>
            <select name="service_name" class="form-control" id="sel_service" required="required" readonly>
              <option value="Chose any service" disabled>Choose Service...</option>
              <option><?php echo $service_name; ?></option>
  			     </select>
             <small>*Required</small>
          </div>
        </div> <br/>
      <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
      <br><br><br>
      </div>
    </div>

  <!-- gig_package_desc -->
  <!-- gig_duration -->
  <!-- gig_price -->
    <div class="panel panel-primary setup-content" id="step-2">
      <div class="panel-heading">
        <h3 class="panel-title">Pricing</h3>
      </div>
      <div class="panel-body">
        <!-- gig_package_desc -->
        <div class="form-group">
          <label class="control-label">Summarize what this gig offers buyers, and why you included these items in your gig</label><br/>
          <label>Package Description</label>
          <textarea name="gig_package_desc" class="form-control" rows="2" id="package_description" maxlength="100" required="required"><?php echo $gig_package_desc; ?></textarea>
          <p align="right"><span id="packagedescription" align="right">100</span> characters remaining</p>
          <hr/>
        </div>

        <!-- gig_duration -->
        <div class="form-group">
          <label class="control-label">Delivery time is your deadline for delivering an order. Be sure to set a delivery time that you can easily meet!</label><br/>
          <label>Delivery Time</label>
          <select name="gig_duration" class="form-control" id="sel_deltime" required="required">
            <option value="<?php echo $gig_duration; ?>"><?php echo $gig_duration; ?> Days</option>
            <option value="1">1 Day</option>
            <option value="2">2 Days</option>
            <option value="3">3 Days</option>
            <option value="4">4 Days</option>
            <option value="5">5 Days</option>
            <option value="6">6 Days</option>
            <option value="7">7 Days</option>
          </select>
        </div><hr/>

        <!-- gig_price -->
        <div class="form-group">
          <label class="control-label">Define your minimum price. Your price should be realistic to what you are offering.</label><br/>
          <label>Minimum Price</label>
          <div class="input-group mb-2 mr-sm-2">
  				  <div class="input-group-prepend">
    				  <div class="input-group-text">$</div>
  					</div>
  				  <input name="gig_price" value="<?php echo $gig_price; ?>" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Limit $5-$999" maxlength="3">
  				</div>
        </div> <br/>
        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
        <br><br><br>
      </div>
    </div>

  <!-- gig_description -->
    <div class="panel panel-primary setup-content" id="step-3">
      <div class="panel-heading">
        <h3 class="panel-title">Description</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label">Describe what you are offering. Be as detailed as possible so buyers will be able to understand if this meets their needs.</label><br/>
          <label>Briefly Describe Your Gig</label>
          <textarea name="gig_description" class="form-control" rows="10" id="ta_description" maxlength="1200" required="required"><?php echo $gig_description; ?></textarea>
  		    <p align="right"><span id="gigdescription" align="right">1200</span> characters remaining</p>
        </div> <br/>
        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
        <br><br><br>
      </div>
    </div>
    <style media="screen">
    .img-editgig{
      display: inline-block;
      position: relative;
      width: 350px;
      height: 200px;
      overflow: hidden;
    }
    </style>
  <!-- gig_picture -->
    <div class="panel panel-primary setup-content" id="step-4">
      <div class="panel-heading">
        <h3 class="panel-title">Gallery</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
            <label class="control-label">Upload photos that describe or are related to your Gig</label><br/>
            <img src="<?php echo base_url().$gig_picture;?>" class="img-fluid img-editgig" id="blah" alt="Image not found" /> <br><br>
            <input name="gig_picture" type="file" class="form-control-file" id="exampleFormControlFile1" onchange="readURL(this);">
        </div>
        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
        <br><br><br>
      </div>
    </div>

  <!-- SUBMIT BUTTON (PUBLISH) -->
    <div class="panel panel-primary setup-content" id="step-5">
        <div class="panel-heading">
             <h3 class="panel-title">SAVE</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label">Almost There...</label>
                <p>Let's publish your Gig and get some buyers rolling in.</p>
            </div>
            <br/>
            <button class="btn btn-success pull-right" type="submit">Save & Preview Gig</button>
        </div><br><br><br>
    </div>
  </form>
  <!-- Form code end  -->
</div>
<br><br><br><br><br>
<?php
/*remaining php code start
    }
  }
}
*/ //remaining php code end
?>

<script type="text/javascript">
	$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});
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
var maxLength1 = 80;
$('input').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength1-length;
  $('#gigtitle').text(length);
});

var maxLength2 = 35;
$('input').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength2-length;
  $('#packagetitle').text(length);
});

var maxLength3 = 100;
$('textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength3-length;
  $('#packagedescription').text(length);
});

var maxLength4 = 1200;
$('textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength4-length;
  $('#gigdescription').text(length);
});

</script>
