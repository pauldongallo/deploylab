<div class="col-md-6">
  <div class="modal fade" id="addNewStioreModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <i class='fas fa-edit text-warning'></i> Add New Store </h5>
          <button type="button" class="manual_select close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <div class="modal-body">
          <div class="table-responsive">  
            <form id="addNewStore" method="post">

              <input type="hidden" id="countRegisteredUser" />

              <table class="table table-sm" style="width:100%" >
                <tbody>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Delivery Country </strong> </td>
                    <td width="5px" class="small text-center"> : </td>
                    <td style="width:40%" class="small"> 
                      <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text small" for="inputGroupSelect01">Options</label>
                        </div>
                        <select id="getAllCountry" class="custom-select" id="inputGroupSelect01"></select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Store Name </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="storeName" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Store Email </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="storeEmail">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Owner First Name </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="ownerFirstName" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Owner Last Name</strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="ownerLastName" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Store Phone </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="storePhone" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Store Fax</strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="storeFax" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Store Mobile </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm" id="storeMobile" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Address Country </strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="input-group input-group-sm mb-3 address-country">
                        <div class="input-group-prepend">
                          <label class="input-group-text small" for="inputGroupSelect01">Options</label>
                        </div>
                          <select id="addNewStoreAddressCountry" class="custom-select ">
                            <option value="">---select---</option>
                          </select>
                  
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"><strong> Address Line 1 </strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" id="addressLine1" class="form-control form-control-sm" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Address Line 2 </strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" id="addressLine2" class="form-control form-control-sm">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Address Line 3 </strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" id="addressLine3" class="form-control form-control-sm" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Town / City *</strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group">
                        <input type="text" id="townCity" class="form-control form-control-sm" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Address State </strong></td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="input-group input-group-sm mb-3 address-state">
                        <div class="input-group-prepend">
                          <label class="input-group-text small">Options</label>
                        </div>
                        <select id="addNewStorecountryState" class="custom-select" id="inputGroupSelect01">
                           <option value="">---select---</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:30%" class="small text-info"> <strong> Address Suburb </strong> </td>
                    <td style="width:10%" class="small text-center"> : </td>
                    <td style="width:300%" class="small"> 
                      <div class="form-group text-center postal_loading">
                         <select id="addressSuburb" class="addressSuburb custom-select">
                           <option value="">---select---</option>
                        </select> 
                      </div>                    
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <!-- modal-body -->
        <div class="modal-footer">
          <button type="button" id="submitNewStoreButton" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#showRegisteredUserModal">Add</button>
          <button type="button" id="manualSelectXBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="showRegisteredUserModal" tabindex="-1" role="dialog" aria-labelledby="showRegisteredUserModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="registeredUser modal-title" id="exampleModalLongTitle"> Sucessfully Created User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body dataLoading">
        <table id="showRegisteredUser" class="table table-bordered table-sm " >
          <tbody></tbody>
        </table>
      </div>
      <div class="modal-footer bg-success text-white">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      <!--   <button type="button" class="btn btn-primary">Ok</button> -->
      </div>
    </div>
  </div>
</div>