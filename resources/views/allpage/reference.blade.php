<form action="{{ URL::to('/dashboard/others/information/reference/edit') }}" method="POST">
            {{ csrf_field() }}
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_name" name="ref_name" value="{{$refer->ref_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Organization </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_organization" name="ref_organization" value="{{$refer->ref_organization}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Designation </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_designation" name="ref_designation" value="{{$refer->ref_designation}}">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Mobile </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_mobile" name="ref_mobile" value="{{$refer->ref_mobile}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_email" name="ref_email" value="{{$refer->ref_email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="sel1">Address </label>
                            <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="re_address" name="re_address" value="{{$refer->re_address}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Relation </label>
                        <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="ref_relation" name="ref_relation" value="{{$refer->ref_relation}}">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$refer->id}}">
            <div class="form-row">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
                 <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/refer/delete/'. $refer->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
            </div>
            </form>
        <hr>