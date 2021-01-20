
<div class="modal fade" id="manualSelectModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class='fas fa-edit text-warning'></i> Manual Select <span class="orderID"></span> </h5>
        <button type="button" class="manual_select close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <div class="col-lg-3">
          <div class="input-group mb-1">
            <select id="countryBaseMS" class="countryBaseMS custom-select custom-select-sm mb-1 mr-sm-1">
              <option value="" selected>select</option>
            </select> 
          </div>
          <div class="input-group mb-1">  
            <select id="countryStateBaseMS" class="countryStateBaseMS custom-select custom-select-sm mb-1 mr-sm-1">
              <option value="" selected>select</option>
            </select> 
          </div>  
          <div class="form-group mb-1 text-center postal_loading">
            <select id="manaulAddressSuburb" class="addressSuburb custom-select custom-select-sm mb-1 mr-sm-1 ">
            </select> 
          </div>
        </div> 
        <div class="col-lg-12">
          <div class="input-group mb-1">
            <p class="small"> Assign PO Directly or select from the list <br>
              type the store id or store name, or select straight from the dropdown.</p>
          </div>  
        </div>

          <div class="table-responsive">  
            <table id="manualSelectTable" style="height:100px;" class="table table-bordered table-sm">
              <thead>
                <tr class="table-info">
                  <th class="small text-center align-middle" scope="col"> Store Name </th>
                  <th class="small text-center align-middle" scope="col"> PostalCode </th>
                  <th class="small text-center align-middle" scope="col"> Suburb </th>
                  <th class="small text-center align-middle" scope="col"> In Store Catchment Area </th>
                  <th class="small text-center align-middle" scope="col"> Distance</th>
                  <th class="small text-center align-middle" scope="col"> Last 30 Days</th>
                  <th class="small text-center align-middle" scope="col"> Total Orders</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <button type="button" id="manualSelectXBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
