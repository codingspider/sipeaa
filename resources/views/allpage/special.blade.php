      <form action="{{ URL::to('/dashboard/others/information/details/edit') }}" method="POST">
            {{ csrf_field() }}
           <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Skill </label>
                <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="skill" value="{{ $special->skill }}" id="skill">
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
            <input type="hidden" name="id" value="{{ $special->id }}">
        </div>
            <div class="form-row">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>

                <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/special/delete/'. $special->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
            </form>
            <hr>