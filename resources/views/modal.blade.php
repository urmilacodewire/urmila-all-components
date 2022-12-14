 <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Rank Report</h5>
                      </div>
                      <form action="{{ route('rankExport') }}">
                      <div class="modal-body">
                       <label>From</label>
                        <input type="date" name="from_date" class="form-control" placeholder=""> 
                        <br>
                        <label>To</label>
                        <input type="date" name="to_date" class="form-control" placeholder=""> 
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            
            <!-- end Modal -->