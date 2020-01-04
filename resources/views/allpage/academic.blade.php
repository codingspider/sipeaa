
 <form action="{{ URL::to('/dashboard/academic/details/edit')}}" method="POST">
      {{ csrf_field() }}
    <div class="card-body">
      <div class="form-row">
        @php
          $educations = DB::table('education_levels_cats')->get(); 
        @endphp
            <div class="form-group col-md-6">
                <label for="inputEmail4">Level of Education</label>
                <select class="form-control" id="education_level" name="education_level">
             @foreach ($educations as $item)
              <option value="{{ $item->education_level }}" {{ ( $item->education_level == $education->education_level) ? 'selected' : '' }}> {{ $item->education_level }} </option>
              @endforeach    
                        </select>
                    </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Result </label>
                            <select class="form-control" id="result" name="result">
                               @foreach ($educations as $item)
              <option value="{{ $item->result }}" {{ ( $item->result == $education->result) ? 'selected' : '' }}> {{ $item->result }} </option> 
              @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Exam/Degree Title</label>
                            <input type="text" class="form-control" id="exam_degree" value="{{ $education->exam_degree}}" name="exam_degree">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Year of Passing </label>
                            <select class="form-control" id="year" name="year">
                                <?php 
                                  for($i = 1950 ; $i < date('Y'); $i++){
                                  echo "<option>$i</option>";
                                  }
                                  ?>
                             </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Concentration/ Major/Group </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $education->major_group}}" name="major_group" id="major_group" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Duration (Years)</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $education->duration}}" name="duration" id="duration">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Board </label>
                            <select class="form-control" id="education_board" name="education_board">
                                @foreach ($educations as $item)
              <option value="{{ $item->board }}" {{ ( $item->board == $education->board) ? 'selected' : '' }}> {{ $item->board }} </option> 
              @endforeach    
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Institute Name </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $education->Institute}}" name="institute" id="institute" placeholder="Institute">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Achievement</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $education->achievement}}" name="achievement" id="achievement">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $education->id }}">
                <div class="form-row">
                  @if ($personaldetails->id != NULL)
                  <input class="btn btn-success" type="submit" name="submit" value="Update"> </input> 
                  <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/academicdetails/delete'. $otherrelavant->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
                 </div>
              @endif
    </div>
  </form>
  <hr>
