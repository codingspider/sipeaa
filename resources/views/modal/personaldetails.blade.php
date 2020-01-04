       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/personal/details')}}" method="POST">
            {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="first_name" name="first_name">
        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="last_name" name="last_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="father_name" name="father_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="mother_name" name="mother_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Gender</label>
                            <select class="mdb-select md-form form-control" id="gender" name="gender">
                                <option value="" disabled selected>Choose your Gender</option>
                                @foreach ($gender as $element)
                                   <option value="{{ $element->name }}">{{ $element->name }}</option>
                                @endforeach
                              

                            </select>
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nationality</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="nationality" id="nationality" name="mother_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">National ID No</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="nid" id="nid">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Maritial Status</label>
                            <select class="mdb-select md-form form-control" id="maritial" name="maritial">
                                <option value="" disabled selected>Choose your Status</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Married">Married</option>
                                <option value="Single">Single</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Religion</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="religion" id="religion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Passport Number</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="pa_number" id="pa_number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Passport Issue Date </label>
                            <input type="date" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="pid" id="pid">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mobile Number 1</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile1" id="mobile1" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile Number 2</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile2" id="mobile2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Alternate Email </label>
                            <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email2" id="email2">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                  </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>