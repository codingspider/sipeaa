       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/certificatte1/details2')}}" method="POST">
            {{ csrf_field() }}
             <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Certificate</label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate" id="certificate">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Certificate Location </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate_location2" id="certificate_location2">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Certificate Institiute </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate_location_inst" id="certificate_location_inst">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Certificate Period </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="certificate_period" id="certificate_period">
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