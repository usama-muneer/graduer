
<?php



 ?>
	<style media="screen">
	#img-top{
		display: inline-block;
		position: relative;
		width: 50px;
		height: 50px;
		overflow: hidden;
		border-radius: 50%;
	}
	.img-va-brequest{
		display: inline-block;
		position: relative;
		width: 80px;
		height: 80px;
		overflow: hidden;
		border-radius: 50%;
	}
	#img-viewgig{
	  display: inline-block;
	  position: relative;
	  width: 100px;
	  height: 50px;
	  overflow: hidden;
	}
	</style>
	<br><br><br><br>
<div class="tab-content container" id="nav-tabContent">
  <!-- SHOW ACTIVE BREQUEST CODE START  -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <table class="table">
      <thead class="thead-light">
				<tr>
          <th scope="col">User</th>
          <th scope="col">Description</th>
          <th scope="col">Duration</th>
          <th scope="col">Budget</th>
          <th scope="col" colspan="1" style="width:150px;" ali>Request Sent</th>
          <th scope="col" colspan="3" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $brequestsql = 'SELECT * FROM buyerrequest WHERE brequest_status= "Active" order by request_date desc' ;
          $brequestdata = $this->db->query($brequestsql)->result_array();
					if($brequestdata){
            foreach($brequestdata as $row){
              $description = $row['description'];
              $duration    = $row['duration'];
              $budget      = $row['budget'];
              $brequest_id = $row['brequest_id'];
              $buyer_id    = $row['buyer_id'];

							//Apply Buyer Request Condition Check
							$apr_sql = "SELECT * FROM applybuyerrequest WHERE brequest_id =" . $brequest_id . " AND freelancer_id = " . $this->session->userdata('user_id');
							$apr_data = $this->db->query($apr_sql)->result_array();
							if($apr_data){
								continue;
							}

							//fetch all numbers of request on a post
							$this->db->select('*, COUNT(*) as count');// no need select as you only want counts
			        $this->db->from('applybuyerrequest');
			        $this->db->where('brequest_id', $brequest_id);
							$offers = $this->db->count_all_results();
							//$apr_sql = "SELECT count(*) as 'offers' FROM applybuyerrequest WHERE brequest_id =" . $brequest_id;
							//$offers_count = $this->db->query($apr_sql)->result_array();
							//foreach ($offers_count as $row) {
								//$total_offers = $row[''];
							//}

							//fetch profile DATA
							$sql1 = 'select * from userprofile where user_id =' . $buyer_id ;
							$data = $this->db->query($sql1)->result_array();
							if($data){
								foreach($data as $row):
									$picture = 	$row['picture'];

          ?>
          <tr>
            <th scope="row"><img class="img-va-brequest" src="<?php echo base_url().$picture; ?>" alt="<?php echo $brequest_id; ?>"></th>
            <td><?php echo $description; ?></td>
            <td align="center"><?php echo $duration; ?></td>
            <td align="center">$<?php echo $budget; ?></td>
            <td align="center"><?php echo $offers; ?></td>
						<td>
							<a href="#modalOffer2<?php echo $brequest_id; ?>" class="btn btn-success" data-toggle="modal" data-target="#modalOffer2<?php echo $brequest_id; ?>">Send Offer</a>
						</td>
						<!-- modal offer 2 code start -->
						<div class="modal hide fade" id="modalOffer2<?php echo $brequest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLongTitle">Create A Custom Offer</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span></button>
						      </div>
						      <div class="modal-body">
						        <div class="container-fluid">

						        	<form action="<?php echo base_url("requestsendc/applybr") ?>" method="post">
							      		<div class="form-group">
													<input type="hidden" name="brequest_id" value="<?php echo $brequest_id ?>">
												  <label class="formheading">Select a gig to offer <?php echo $brequest_id ?></label>
												  <select class="form-control" id="exampleFormControlSelect1" name="gig_id" required="required">
													<option value=""> Select your gig</option>
														<?php
														$sql = 'SELECT * FROM gigs WHERE gig_status= "Active" AND user_id =' . $this->session->userdata('user_id');
														$gigdata = $this->db->query($sql)->result_array();
														if($gigdata){
															foreach ($gigdata as $data) {
														?>
												  	<option value="<?php echo $data['gig_id'] ?>"> <?php echo $data['gig_title'];  ?></option>
														<?php
														}
													}
														 ?>
													</select>

												</div>
												<hr/>

										<div class="form-group">
										    <label class="formheading">Describe your Offer</label>
										    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required="required" maxlength="1500"></textarea>
										    <p align="right"><span id="gigtitle" align="right">1500</span> characters remaining</p>
										</div> <hr/>

										<div class="form-group">
										  <label class="formheading">Total Offer Amount</label>
										  <input type="number" name="budget" class="form-control" placeholder="$5-$999" pattern="\d*" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required="required">
										</div> <hr/>

										<div class="form-group">
									        <label class="formheading">Delivery Time</label>
									        <select name="duration" class="form-control" id="sel_deltime" required="required">
									          <option value="1">1 Day</option>
									          <option value="2">2 Days</option>
									          <option value="3">3 Days</option>
									          <option value="4">4 Days</option>
									          <option value="5">5 Days</option>
									          <option value="6">6 Days</option>
									          <option value="7">7 Days</option>
									        </select>
									    </div>

											    <div class="modal-footer">
											      <button type="submit" class="btn btn-success">Submit Offer</button>
											    </div>
						  					</form>
						    			</div>
						  			</div>
								</div>
							</div>
						</div>
						<!-- modal offer 2 code end -->
          <?php
									endforeach;
								}
              }
            }
            else{
          ?>
          <td colspan="4"> <?php echo "<h5>No Data found</h5>"; } ?> </td>
          </tr>
      </tbody>
    </table>
  </div>
  <!-- SHOW ACTIVE BREQUEST CODE END  -->
</div>
</div>
<br><br><br><br><br><br>




<script type="text/javascript">
	var maxLength1 = 1500;
$('textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength1-length;
  $('#gigtitle').text(length);
});
</script>

<!-- modal offer 2 code start -->
