       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/career/application/details')}}" method="POST">
            {{ csrf_field() }}
              <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="text-left" for="inputEmail4">Present Salary</label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_sallary" name="present_sallary">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-left" for="inputPassword4">Expected Salary </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="exp_sallary" name="exp_sallary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="text-left" for="inputEmail4">Looking for (Job Level) </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="looking_for" name="looking_for">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-left" for="inputPassword4">Available for ( Job Nature ) </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_nature" name="job_nature">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" id="careerdetails" class="btn btn-success pull-right">Submit</button>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>