
 <form method="POST" action="{{ URL::to('/dashboard/addressdetails/details/edit')}}">
  {{ csrf_field() }}
  <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4">Present Address </label>
          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="present_add" value="{{ $element->present_add}}" name="present_add">
      </div>
      <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
      <div class="form-group col-md-6">
          <label for="inputPassword4">Permanent Address </label>
          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="permanent_add" value="{{ $element->permanent_add}}" name="permanent_add">
      </div>
       <input type="hidden" name="id"  id="id" value="{{$element->id}}">

      </div>
           <div class="form-row">
            @if ($element->id != NULL)
            <input class="btn btn-success" type="submit" name="submit" value="Update"></input>
            <button class="delete btn-danger" onclick="window.location.href = '{{ URL::to('/dashboard/address/details/delete/'. $element->id )}}'" type="button" style="margin-left:16px;" >Delete Record</button>
        @endif
        </div>
      </form>
      <hr>


  