
<div class="modal fade" id="editOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width:95%!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class='fas fa-edit text-warning'></i> Edit Order <span class="orderID"></span> </h5>
        <button type="button" class="editOrderClose close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="por-tab" data-toggle="tab" href="#por" role="tab" aria-controls="por" aria-selected="true">P.O.R's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="customer-details" aria-selected="false">Customer Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Purchase Orders</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="por" role="tabpanel" aria-labelledby="por-tab">.
            <?php include("edit-order-por.php"); ?>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="editOrderClose btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include("edit-orders-manual-select-modal.php"); ?>
<?php include("edit-orders-add-new-store-modal.php"); ?>