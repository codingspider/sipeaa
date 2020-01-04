       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/academic/training/summary')}}" method="POST">
            {{ csrf_field() }}
          <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Training Title </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_title" id="training_title2" placeholder="Training Title">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Country</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_country" id="training_country2"placeholder="Training Country">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Topics Covered </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_topics" id="training_topics" placeholder="Topics">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Year </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_year" id="training_year" placeholder="Training Year">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Training Institute </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst" id="training_inst" placeholder="Training Institute">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Duration </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period" id="training_period" placeholder="Duration">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"> Training Location </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate" id="training_locate" placeholder="Training Location">
                </div>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>