
 <form action="{{ URL::to('/dashboard/employment/details/edit') }}" method="POST">
            {{ csrf_field() }}
          <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company Name </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_name" value="{{$employment->com_name}}" placeholder="Company Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Responsibilities</label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="responsibilities" value="{{$employment->responsibilities}}" id="responsibilities" placeholder="Responsibilities">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Company business </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_business" value="{{$employment->com_business}}" id="com_business" placeholder="Company business">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Company Location </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="com_loaction" value="{{$employment->com_loaction}}" id="com_loaction" placeholder="Company Location">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Designation </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="designation" value="{{$employment->designation}}" id="designation" placeholder=Designation>
                </div>
                <input type="hidden" name="id" value="{{$employment->id}}">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Employment Period </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="emp_period" value="{{$employment->emp_period}}" id="emp_period" placeholder="Period">
                </div>
            </div>
            <div class="form-row">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
                 <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/employment/delete/'. $employment->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
            </form>
  <hr><br>

