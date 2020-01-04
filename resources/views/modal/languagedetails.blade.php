       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/others/information/language') }}" method="POST">
            {{ csrf_field() }}
                 <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Language</label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="language" name="language" placeholder="Language">
                  </div>
                  <div class="form-group col-md-6">
                      <div class="form-group">
                          <label for="sel1">Reading </label>
                          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="reading" name="reading" placeholder="Reading">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Writing </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="writing" name="writing" placeholder="Writing">
                  </div>
                  <div class="form-group col-md-6">
                      <div class="form-group">
                          <label for="sel1">Speaking </label>
                          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="speaking" name="speaking" placeholder="Speaking">
                      </div> 
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