



<!-- Update Buyer Modal Start-->
<div class="modal fade" id="modalUpdateBuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Buyer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="#">
              <div class="form-group">
                <label for="updatebuyerstatus" class="formheading">Update Status</label>
                <select class="form-control" id="updatebuyerstatus" required="required">
                  <option value="">- Select -</option>
                  <option value="active">Active</option>
                  <option value="deactivated">Deactivated</option>
                  <option value="temporarily blocked">Temporarily Blocked</option>
                  <option value="blocked">Blocked</option>
                </select>
              </div> <hr/>
              <div class="float-right">
                  <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Update Buyer Modal End-->

<!-- View Gig Modal Start -->
<div class="modal fade" id="modalViewGig" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Gig</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" style="font-size: 12px;">
            <form>
                <div class="row">
                    <div class="col-md-7">
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label formheading">ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="1">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label formheading">Category</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Graphics & Design">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label formheading">Service</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Presentation Design">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label formheading">Seller</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="fasttrack_tech">
                        </div>
                      </div>
                  </div>

                  <div class="col-md-5 gigimage">
                    <img src="Signin3.jpg" alt="gig image">
                </div>

              </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label formheading">Price</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="$20">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label formheading">Duration</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="1 Day">
                        </div>
                      </div>
                    </div>
                </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label formheading">Title</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="I will design professional powerpoint presentations">
                </div>
              </div>

              <div class="form-group row">
                <label for="gigdescription" class="col-sm-3 col-form-label formheading">Pkg Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control-plaintext" id="gigdescription">Description</textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="gigdescription" class="col-sm-3 col-form-label formheading">Gig Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control-plaintext" id="gigdescription">Description</textarea>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- View Gig Modal End -->

<!-- Manage Gig Modal Start -->
<div class="modal fade" id="modalManageGig" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Manage Gig</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <div class="container">
            <form method="post" action="#">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Gig Status</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="">- Select -</option>
                  <option value="active">Active</option>
                  <option value="deactivated">Deactivated</option>
                </select>
              </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger">Delete Gig</button>
        <button type="button" class="btn btn-info">Update Status</button>
    </div>
  </div>
</div>
</div>
<!-- Manage Gig Modal End -->

<!-- Delete Gig Modal Start -->
<div class="modal fade" id="modalDeleteGig" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Gig</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body text-center">
        <label class="formheading">Confirm delete?</label>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger">Delete Gig</button>
    </div>
  </div>
</div>
</div>
<!-- Delete Gig Modal End -->

<!-- View Order Modal Start -->
<div class="modal fade" id="modalViewOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" style="font-size: 14px;">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticOrderID" class="col-sm-5 col-form-label formheading">Order ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticOrderID" value="24">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticGigID" class="col-sm-5 col-form-label formheading">Gig ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticGigID" value="29">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticBuyerID" class="col-sm-5 col-form-label formheading">Buyer ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticBuyerID" value="2">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticFLID" class="col-sm-5 col-form-label formheading">Freelancer ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticFLID" value="9">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticSDate" class="col-sm-5 col-form-label formheading">Start Date</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticSDate" value="2018-07-29 13:44:12">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticCDate" class="col-sm-5 col-form-label formheading">Complete Date</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticCDate" value="2018-07-30 13:44:12">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticDuration" class="col-sm-5 col-form-label formheading">Duration</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticDuration" value="1 Day/s">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticPrice" class="col-sm-5 col-form-label formheading">Price</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticPrice" value="$15">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticStatus" class="col-sm-5 col-form-label formheading">Status</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticStatus" value="Active">
                        </div>
                      </div>
                </div>
            </div>

      </div>
    </div>
  </div>
</div>
</div>
<!-- View Order Modal End -->

<!-- Manage Order Modal Start -->
<div class="modal fade" id="modalManageOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Manage Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Order Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" required>
                          <option value="">- Select -</option>
                          <option value="active">Active</option>
                          <option value="completed">Completed</option>
                          <option value="cancelled">Cancelled</option>
                        </select>
                    </div> <hr/>
                    <div class="float-right">
                        <button type="submit" class="btn btn-success">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- Manage Order Modal End -->

<!-- View Request Modal Start-->
<div class="modal fade" id="modalViewRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Buyer Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" style="font-size: 14px;">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticOrderID" class="col-sm-5 col-form-label formheading">Request ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticOrderID" value="1">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticGigID" class="col-sm-5 col-form-label formheading">Buyer ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticGigID" value="2">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticBuyerID" class="col-sm-5 col-form-label formheading">Category ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticBuyerID" value="3">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticFLID" class="col-sm-5 col-form-label formheading">Service ID</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticFLID" value="4">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticSDate" class="col-sm-5 col-form-label formheading">Request Date</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticSDate" value="2018-07-29 13:44:12">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticCDate" class="col-sm-5 col-form-label formheading">Budget</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticCDate" value="$100">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticDuration" class="col-sm-5 col-form-label formheading">Duration</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticDuration" value="1 Day/s">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="staticPrice" class="col-sm-5 col-form-label formheading">Status</label>
                        <div class="col-sm-7">
                          <input type="text" readonly class="form-control-plaintext" id="staticPrice" value="Active">
                        </div>
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="staticStatus" class="col-sm-2 col-form-label formheading">Description</label>
                        <div class="col-sm-10">
                          <textarea readonly class="form-control-plaintext" rows="4">Description</textarea>
                        </div>
                      </div>
                </div>
            </div>

      </div>
    </div>
  </div>
  </div>
</div>
<!-- View Request Modal End-->

<!-- Manage Request Modal Start-->
<div class="modal fade" id="modalManageRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Manage Buyer Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="#">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Request Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" required>
                      <option value="">- Select -</option>
                      <option value="active">Active</option>
                      <option value="deleted">Deleted</option>
                    </select>
                </div> <hr/>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">Update Status</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Manage Request Modal End-->

<!-- Delete Request Modal Start -->
<div class="modal fade" id="modalDeleteRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Buyer Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form method="post" action="#">
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
<!-- Delete Request Modal End -->
