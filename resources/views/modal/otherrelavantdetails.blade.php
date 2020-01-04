       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{ URL::to('/dashboard/others/relevant')}}" method="POST">
              {{ csrf_field()}}
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Carrer Summury </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="career_summery" name="career_summery">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Special Qualification </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="special_qualification" name="special_qualification">
                </div>

                <div class="form-group col-md-12">
                    <label for="inputPassword4">Keyword </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="keyword" name="keyword">
                </div>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="othersdetails" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>