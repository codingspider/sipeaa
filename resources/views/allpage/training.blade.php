
 <form action="{{ URL::to('/dashboard/academic/training/summary/edit')}}" method="POST">
            {{ csrf_field() }}
          <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Training Title </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_title" id="training_title2" value="{{ $training->training_title}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Country</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_country" id="training_country2" value="{{ $training->training_country}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Topics Covered </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_topics" id="training_topics" value="{{ $training->training_topics}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Year </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_year" id="training_year" value="{{ $training->training_year}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Training Institute </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_inst" id="training_inst" value="{{ $training->training_inst}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Training Duration </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_period" id="training_period" value="{{ $training->training_period }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"> Training Location </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="training_locate" id="training_locate" value="{{ $training->training_locate}}">
                    <br>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/training/delete'. $training->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
                </div>

            </div>
            <input type="hidden" name="id" value="{{ $training->id }}">
          
            </form>
  <hr><br>

