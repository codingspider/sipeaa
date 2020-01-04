       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/address/details')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Present Address </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_add" name="present_add">
                </div>
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Permanent Address </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="permanent_add" name="permanent_add">
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