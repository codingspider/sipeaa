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
                    <label for="inputEmail4">Company Name </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_name[]" id="com_name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Responsibilities</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="responsibilities[]" id="responsibilities" placeholder="Duration">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company business </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_business[]" id="com_business">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Company Location </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_loaction[]" id="com_loaction">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Designation </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="designation[]" id="designation">
                </div>
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Employment Period </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="emp_period[]" id="emp_period" placeholder="Duration">
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