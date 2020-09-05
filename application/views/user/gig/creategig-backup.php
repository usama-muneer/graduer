
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
        </div>
    </div>

    <form method="get" action="<?php echo base_url(); ?>gigc/creategig" role="form">
    <?php echo form_open_multipart('gigc/creategig' , array('id' => 'aimg'));?>
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Overview</h3>
            </div>

            <!-- DIV ATTRIBUTES:  title, category, service  -->
            <div class="panel-body">
              <!-- NAME: title  -->
              <div class="form-group">
                  <label class="control-label">This is your Gig title, so choose wisely.</label><br/>
                  <label>Gig Title</label>
                  <input maxlength="80" type="text" required="required" name="title" class="form-control" placeholder="I will do something I am really good at"/>
                  <p align="right"><span id="gigtitle" align="right">80</span> characters remaining</p>
              </div>
              <hr/>

              <label class="control-label">Please choose the category and service most suitable for your Gig.</label>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Category</label>
                  <select class="form-control" id="sel_category" required="required" name="category">
        					    <option>GRAPHICS & DESIGN</option>
        					    <option>DIGITAL MARKETING</option>
        					    <option>WRITING & TRANSLATION</option>
        					    <option>VIDEO & ANIMATION</option>
                      <option>MUSIC & AUDIO</option>
                      <option>PROGRAMMING & TECH</option>
                      <option>BUSINESS</option>
                      <option>FUN & LIFESTYLE</option>
          					</select>
          					<small>*Required</small>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Service</label>
                    <select class="form-control" id="sel_service" required="required" name="service">
        					    <option>1</option>
        					    <option>2</option>
        					    <option>3</option>
        					    <option>4</option>
          			 	  </select>
          					<small>*Required</small>
                  </div>
                </div>
              </div>
              <br/>
              <button class="btn btn-primary pull-right" type="button">Next</button>
              <br><br><br><br>
          </div>

        <!-- DIV ATTRIBUTES:  package_desc, duration, price  -->
        <div class="panel panel-primary setup-content" id="step-2">
          <div class="panel-heading">
               <h3 class="panel-title">Pricing</h3>
          </div>
          <div class="panel-body">
              <!-- NAME:  package_desc -->
              <div class="form-group">
                  <label class="control-label">Summarize what this package offers buyers, and why you included these items in your package</label><br/>
                  <label>Package Description</label>
                  <textarea class="form-control" name="package_desc" rows="2" id="package_description" maxlength="100" required="required" placeholder='For example: This "Full Logo" Design package includes a standard logo design with 4 revisions and the source file.'></textarea>
                  <p align="right"><span id="packagedescription" align="right">100</span> characters remaining</p>
                  <hr/>

              </div>
              <!-- NAME:  duration -->
              <div class="form-group">
                  <label class="control-label">Delivery time is your deadline for delivering an order. Be sure to set a delivery time that you can easily meet!</label><br/>
                  <label>Delivery Time</label>
                  <select class="form-control" id="sel_deltime" name="duration" required="required">
                      <option>1 Day</option>
                      <option>2 Days</option>
                      <option>3 Days</option>
                      <option>4 Days</option>
                      <option>4 Days</option>
                      <option>5 Days</option>
                      <option>6 Days</option>
                      <option>7 Days</option>
                  </select>
              </div>
              <hr/>
              <!-- NAME:  price -->
              <div class="form-group">
                <label class="control-label">Define your minimum price. Your price should be realistic to what you are offering.</label><br/>
                <label>Minimum Price</label>
                <div class="input-group mb-2 mr-sm-2">
          				<div class="input-group-prepend">
            				<div class="input-group-text">$</div>
         					</div>
          				<input type="number" name="price" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Limit $5-$999" maxlength="3">
        				</div>
              </div>
              <br/>
              <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
          </div>
          <br><br><br><br>
        </div>

        <!-- NAME:  description -->
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
              <h3 class="panel-title">Description</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Describe what you are offering. Be as detailed as possible so buyers will be able to understand if this meets their needs.</label><br/>
                    <label>Briefly Describe Your Gig</label>
                    <textarea class="form-control" name="description" rows="10" id="ta_description" maxlength="1200" minlength="120" required="required" placeholder="This is your chance to be creative. Explain your Gig in atleast 120 characters"></textarea>
  					<p align="right"><span id="gigdescription" align="right">1200</span> characters remaining</p>
                </div>
                <br/>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
            <br><br><br><br>
        </div>

        <!-- NAME:  picture -->
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Gallery</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Upload photos that describe or are related to your Gig</label><br/>
                    <input type="file" class="form-control-file input-create-gig" id="exampleFormControlFile1" onchange="readURL(this);">
                    <br/>
                    <img id="blah" name="picture" class="img-create-gig" src="http://placehold.it/250" alt="your image" /><br/><br/>
                    <small>*Required - Files must be in JPEG, JPG, PNG format. The quality of the photos you display will influence customers. Add memorable content to your gallery to set yourself apart from competitors.</small>
                </div>
                <br/>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                <br><br><br><br>
            </div>
        </div>

        <!-- NAME:  SUBMIT BUTTON -->
        <div class="panel panel-primary setup-content" id="step-5">
            <div class="panel-heading">
                 <h3 class="panel-title">Publish</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                  <label class="control-label">Almost There...</label>
                  <p>Let's publish your Gig and get some buyers rolling in.</p>
              </div>
              <br/>
              <input type="submit" name="" value="Submit">
              <button class="btn btn-success pull-right" type="submit">Publish Gig</button>
              <br><br><br><br>
            </div>
        </div>

    </form>
    </div>

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
