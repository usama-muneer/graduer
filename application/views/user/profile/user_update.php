<?php
	//fetch profile DATA
	$user_id = $this->session->userdata('user_id');
	$sql1 = 'select * from userprofile where user_id =' . $user_id ;
	$data = $this->db->query($sql1)->result_array();
	if($data){
		foreach($data as $row):
		  $id = $row['user_id'];
		  $country = $row['country'];
		  $gender = $row['gender'];
		  $description = $row['description'];
		  $qualification = $row['qualification'];
		  $picture = base_url().$row['picture'];
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
		  endforeach;
		  }
	else{
		$not = "No data found.";
	}
?>
<style media="screen">
.img-editprofile{
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

<br><br><br>
<div class="container">

<?php echo form_open_multipart('profilec/updatepic' , array('id' => 'img'));?>
	<div class="form-group">
		<div align="center">
			<img align="center" id="blah" class="img-editprofile" src="<?php echo $picture; ?>" class="rounded-circle" alt="avatar" >
		</div>
		<div align="center">
			<input type="file" name="pic" tabindex="2" class="form-control-file" id="" onchange="readURL(this);">
		</div>
		<button type="submit" class="btn btn-success" name="button">Upload</button>
	</div>
</form>
<?php echo form_open_multipart('profilec/edituserprofile' , array('id' => 'img'));?>
	<hr/>
	<div class="form-group">
		<label for="inputAddress" class="heading" style="font-size:17px;">Tell us more about yourself, users are also interested in learning more about you in person</label>
		<br/>
		<label><b>Description</b></label>
		<textarea name="description" class="form-control" rows="4" id="desc" minlength="150" maxlength="600" value=""><?php echo $description; ?></textarea>
		<p align="right"><span id="profiledescription" align="right">600</span> characters remaining</p>
	</div>
	<hr/>

	<div class="form-group">
		<br>
	<label for="inputAddress" class="heading">Let the world know about your skills</label>
	<br/>

	<!-- Skills code start -->
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<td><b>Skill</b></td>
					<td><b>Level</b></td>
				</tr>
			</thead>

				<?php
				$skillsql = 'select * from skills where user_id =' . $this->session->userdata('user_id');
				$skill = $this->db->query($skillsql)->result_array();
				if($skill){
					foreach ($skill as $row) {
				?>
					<tr>
						<td><input type="text" class="form-control" name="skill[]" value="<?php echo $row['skill']; ?>"></td>
						<td>
							<select class="form-control" name="level[]">
								<option value=""><?php echo $row['level']; ?></option>
								<option value="">Basic</option>
								<option value="">Intermediate</option>
								<option value="">Advance</option>
							</select>
						</td>
					</tr>
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
	</div>
	<!-- Skills code end -->

	<hr/>

	<!-- LANGUAGE code start -->
	<div class="container">
	  <table class="table">
	    <thead>
	      <tr>
	        <td><b>Skill</b></td>
	        <td><b>Level</b></td>
	      </tr>
	    </thead>

	      <?php
	      $langsql = 'select * from languages where user_id =' . $this->session->userdata('user_id');
	      $lang = $this->db->query($langsql)->result_array();
	      if($lang){
	        foreach ($lang as $row) {
	      ?>
	        <tr>
	          <td><input type="text" class="form-control" name="lang[]" value="<?php echo $row['language']; ?>"></td>
	          <td>
	            <select class="form-control" name="level[]">
	              <option value=""><?php echo $row['level']; ?></option>
	              <option value="">Basic</option>
	              <option value="">Intermediate</option>
	              <option value="">Advance</option>
	            </select>
	          </td>
	        </tr>
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
	</div>
	<!-- LANGUAGE code end -->

	<hr/>

	<div class="form-group">
		<label class="heading">Enter your recent most qualification</label>
		<br/>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Degree</label>
		<div class="col-sm-10">
			<input name="degreetitle" class="form-control" value="<?php echo $qualification; ?>" type="text" class="form-control" />
		</div>
	</div>
	</div> <br/>

	<button class="btn btn-primary btn-success form-control" style="width:300px; float:right;">Update</button>
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
