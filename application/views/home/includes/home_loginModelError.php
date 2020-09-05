<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>


<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-body text-center bg-light">
        <label></label>
        <a class="close" data-dismiss="modal">x</a>
				<div class="alert alert-danger" role="alert">
          <span><b>Error</b></span><br>
					<span class="text-danger"><?php echo 'Invalid username/password' ?></span>

				</div>
      </div>
    </div>
  </div>
</div>
