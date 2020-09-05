<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>



<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-body text-center">
				<div class="alert alert-danger" role="alert">
          <a class="close" data-dismiss="modal">x</a>
					<span class="text-danger"><?php echo '<h5><b>Error: </b></h5>' . form_error("b_usernamejoin"); ?></span>
					<span class="text-danger"><?php echo form_error("b_emailjoin"); ?></span>
					<span class="text-danger"><?php echo form_error("b_confirmpasswordjoin"); ?></span>
					<span class="text-danger"><?php echo form_error("b_passwordjoin"); ?></span>
          <span class="text-danger"><?php echo form_error("f_usernamejoin"); ?></span>
					<span class="text-danger"><?php echo form_error("f_emailjoin"); ?></span>
					<span class="text-danger"><?php echo form_error("f_confirmpasswordjoin"); ?></span>
					<span class="text-danger"><?php echo form_error("f_passwordjoin"); ?></span>
				</div>

      </div>
    </div>
  </div>
</div>
