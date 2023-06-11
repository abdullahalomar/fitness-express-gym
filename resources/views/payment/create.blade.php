<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mx-auto" id="exampleModalToggleLabel">Payment Details</h5>
          <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal" aria-label="Close"></button>
          
        </div>
        <div class="modal-body">
          <form action="" method="post">
            @csrf
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">

              <div class="col mb-3">
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" aria-label="Amount">
              </div>
              <div class="col mb-3">
                <label class="visually-hidden" for="autoSizingSelect">Reason</label>
                <select class="form-select" name="type" id="type" id="autoSizingSelect">
                  <option selected>Choose...</option>
                  <option value="1">Admission</option>
                  <option value="2">Monthly</option>
                </select>
              </div>
              <div class="col mb-3">
                <input type="number" name="member_id" id="member_id" class="form-control" placeholder="Member id" aria-label="Member id">
              </div>
              <div class="col mb-3">
                <input type="date" name="date" id="date" class="form-control" placeholder="Date" aria-label="Date">
              </div>
              <div class="">
                <input type="hidden" value="{{ $member->id }}" name="id" id="id" class="form-control" placeholder="Id" aria-label="Id">
              </div>
            </div>
            <div class="d-grid gap-2 mb-1">
              <button class="btn btn-outline-success" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Pay Now</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  
  