<form action="{{ URL::to('/dashboard/others/information/language') }}" method="POST">
            {{ csrf_field() }}
                 <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Language</label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="language" name="language" value="{{ $language->language }}" >
                  </div>
                  <div class="form-group col-md-6">
                      <div class="form-group">
                          <label for="sel1">Reading </label>
                          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="reading" name="reading" value="{{ $language->reading }}" >
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Writing </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="writing" name="writing" value="{{ $language->writing }}" >
                  </div>
                  <div class="form-group col-md-6">
                      <div class="form-group">
                          <label for="sel1">Speaking </label>
                          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="speaking" name="speaking" value="{{ $language->speaking }}" >
                      </div> 
                  </div>
              </div>
            <div class="form-row">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
                <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/language/delete/'. $language->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
            </form>
            <hr>