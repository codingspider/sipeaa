       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/others/information/reference') }}" method="POST">
            {{ csrf_field() }}
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_name" name="ref_name" placeholder="Enter your best skill">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Organization </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_organization" name="ref_organization" placeholder="Enter your best skill">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Designation </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_designation" name="ref_designation" placeholder="Enter your best ref_designation">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Mobile </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_mobile" name="ref_mobile" placeholder="Enter your best ref_mobile">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_email" name="ref_email" placeholder="Enter your best ref_email">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Address </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="re_address" name="re_address" placeholder="Enter your best re_address">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Relation </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_relation" name="ref_relation" placeholder="Enter your best ref_relation">
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