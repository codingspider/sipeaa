
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                  
                        <form action="{{ URL::to('/dashboard/academic/details')}}" method="POST">
            {{ csrf_field() }}
            @php
              $data = DB::table('education_levels_cats')->get(); 
            @endphp
          <div class="table-responsive">
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="inputEmail4">Level of Education</label>
                                  <select class="form-control" id="education_level" name="education_level">
                                     <option value="nothing select">Select</option>
                                    @foreach ($data as $element)
                                        <option value="{{ $element->education_level }}">{{ $element->education_level }}</option>
                                    @endforeach
                                    
 
                                  </select>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="inputPassword4">Result </label>
                                  <select class="form-control" id="result" name="result">
                                      <option value="nothing select">Select</option>
                                      @foreach ($data as $element)
                                        <option value="{{ $element->result }}">{{ $element->result }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="inputEmail4">Exam/Degree Title</label>
                                  <input type="text" class="form-control" id="exam_degree" name="exam_degree">
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
                                  <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="major_group" id="major_group" >
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="inputPassword4">Duration (Years)</label>
                                  <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="duration" id="duration">
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="inputEmail4">Board </label>
                                  <select class="form-control" id="education_board" name="education_board">
                                      <option value="" selected>Select One</option>
                                      @foreach ($data as $element)
                                        <option value="{{ $element->board }}">{{ $element->board }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="inputPassword4">Institute Name </label>
                                  <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="institute" id="institute" placeholder="Institute">
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="inputPassword4">Achievement</label>
                                  <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="achievement" id="achievement">
                              </div>
                          </div>

              <input type="submit" name="submit" class="btn btn-info" value="Submit" />
          </div>

                    </form>
                  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
