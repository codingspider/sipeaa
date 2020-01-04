

                    <form  id="adminNotes" method="POST"  action="{{ URL::to('/dashboard/personal/details/edit')}}">
                        {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="first_name" value="{{ $personaldetails->first_name}}" name="first_name">
        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="last_name" value="{{ $personaldetails->last_name}}" name="last_name">
                        </div>
                    </div>
                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="father_name" value="{{ $personaldetails->father_name}}" name="father_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mother Name</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="mother_name" value="{{ $personaldetails->mother_name}}" name="mother_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ $personaldetails->dob}}" id="dob">
                        </div>
                        @php
                            $gender = DB::table('genders')->get(); 
                        @endphp
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Gender</label>
                            <select class="form-control" name="gender">
   
                          <option>Select your gender</option>
                            
                        @foreach ($gender as $item)
                        <option value="{{ $item->name }}" {{ ( $item->name == $personaldetails->gender) ? 'selected' : '' }}> {{ $item->name }} </option>
                        @endforeach    
                        </select>
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nationality</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $personaldetails->nationality}}" name="nationality" id="nationality" name="mother_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">National ID No</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $personaldetails->nid}}" name="nid" id="nid">
                        </div>
                    </div>
                    @php
                        $maritial =DB::table('maritals')->get();
                    @endphp
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Maritial Status</label>
                        <select class="mdb-select md-form form-control" id="maritial" name="maritial">
                                <option value="" disabled selected>Choose your Status</option>
                                 @foreach ($maritial as $item)
                        <option value="{{ $item->name }}" {{ ( $item->name == $personaldetails->maritial) ? 'selected' : '' }}> {{ $item->name }} </option>
                        @endforeach    
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Religion</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $personaldetails->religion}}" name="religion" id="religion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Passport Number</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="{{ $personaldetails->pa_number}}" name="pa_number" id="pa_number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Passport Issue Date </label>
                            <input type="date" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="pid" value="{{ $personaldetails->pid}}" id="pid">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mobile Number 1</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile1" value="{{ $personaldetails->mobile1}}" id="mobile1" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile Number 2</label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="mobile2" value="{{ $personaldetails->mobile2}}" id="mobile2">
                        </div>
                    </div>
                    <input type="hidden" name="id"  id="id" value="{{$personaldetails->id}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email" value="{{ $personaldetails->email}}" id="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Alternate Email </label>
                            <input type="email" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="email2" value="{{ $personaldetails->email2}}" id="email2">
                        </div>
                    </div>
                    <div class="form-row">
                        @if ($personaldetails->id != NULL)
                        <button class="btn btn-success" style="margin:5px " type="submit" name="submit" value="Update">Update</button>

                        <button class="delete btn-danger" style="margin:5px" onclick="javascript:window.location.href='{{ URL::to('/dashboard/personaldetails/delete',$personaldetails->id )}}'">Delete Record</button>
                    @endif
                    </div>
                 </form> 

                