<!-- Modal -->
<div class="modal fade" id="findOrdersModal" tabindex="-1" role="dialog" aria-labelledby="findOrdersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="findOrdersModalLabel"> Previous Orders </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="findOrdersTable" class="table table-light">
            <thead class="thead-dark">
              <tr>
                <th scope="col"> Order ID </th>
                <th scope="col"> State And Suburb </th>
                <th scope="col"> Order Number </th>
                <th scope="col"> Status </th>
                <th scope="col"> Amount </th>
                <th scope="col"> Promo Code </th>
                <th scope="col"> Prefeer </th>
                <th scope="col"> Date Created </th>
                <th scope="col"> Delivery Date </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>