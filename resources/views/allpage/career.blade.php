
 <form  method="POST" action="{{ URL::to('dashboard/career/application/details/edit')}}">
  {{ csrf_field() }}
    <div class="col-md-10">
       <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Present Salary</label>
                        <input type="text" value="{{ $value->present_sallary}}" onblur="careeDetails()" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_sallary" name="present_sallary">
                    </div>
                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Expected Salary </label>
                        <input type="text" value="{{ $value->exp_sallary}}" onblur="careeDetails()" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="exp_sallary" name="exp_sallary">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Looking for (Job Level) </label>
                        <input type="text" value="{{ $value->looking_for}}" onblur="careeDetails()" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="looking_for" name="looking_for">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Available for ( Job Nature ) </label>
                        <input type="text" value="{{ $value->job_nature}}" onblur="careeDetails()" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_nature" name="job_nature">
                    </div>

                    <input type="hidden" name="id" value="{{ $value->id }}">
                </div>
                <div class="form-row">
                   <input class="btn btn-success" type="submit" name="submit" value="Update"></input>
            <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/career/details/delete/'. $value->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
                </div>
          </div>
  </form>
  <hr>


