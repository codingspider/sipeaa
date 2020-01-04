       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/others/information/details') }}" method="POST">
            {{ csrf_field() }}
           <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Skill </label>
                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="skill" id="skill">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">How did you learn the skill ? </label>
                <br>
                <label class="checkbox-inline">
                    <input type="checkbox" value="Job" name="how_did_you_learn[]">Job</label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="Educational" name="how_did_you_learn[]">Educational </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="Professional Training" name="how_did_you_learn[]">Professional Training </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="NTVQF" name="how_did_you_learn[]">NTVQF</label>
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