

<form action="{{ URL::to('/prefer/jobs/details/edit')}}" method="POST">
          <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Functional </label>
                        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                         @php $categories = DB::table('categories')->get(); @endphp
                        <select class="mdb-select md-form form-control" id="job_categories" name="job_categories">
                        <option value="" disabled selected>Choose your job categories</option>
                             @foreach ($categories as $item)
                        <option value="{{ $item->category_name }}" {{ ( $item->category_name == $prefer_job->job_categories) ? 'selected' : '' }}> {{ $item->category_name }} </option>
                        @endforeach    
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Prefferred Job Location </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_location" name="job_location" value="{{ $prefer_job->job_location }}">
                    </div>
                </div>
          <input type="hidden" name="id" id="id" value="{{ $prefer_job->id }}">
          <div class="form-group">
          <input class="btn btn-success" type="submit" name="submit" value="Update"></input>
            <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/prefer/job/details/delete/'. $prefer_job->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
          </div>
</form>
        <br>

  <hr>
