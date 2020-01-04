
 <form action="{{ URL::to('/dashboard/certificatte1/details2/edit')}}" method="POST">
            {{ csrf_field() }}
             <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Certificate</label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{$certi->certificate }}" name="certificate" id="certificate">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Certificate Location </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{$certi->certificate_location }}" name="certificate_location2" id="certificate_location2">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Certificate Institiute </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{$certi->certificate_location_inst }}" name="certificate_location_inst" id="certificate_location_inst">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Certificate Period </label>
                      <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{$certi->certificate_period }}" name="certificate_period" id="certificate_period">
                  </div>
              </div>
              <input type="hidden" value="{{$certi->id }}" name="id">
            <div class="form-row">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
               <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/certificate/delete/'. $certi->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
            </form>
  <hr>

