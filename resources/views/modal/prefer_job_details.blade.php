       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ URL::to('/dashboard/preferred/categories')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="inputEmail4">Functional </label>
                   @php $categories = DB::table('categories')->get(); @endphp
                    <select class="mdb-select md-form form-control" name="job_categories">
                        <option value="" disabled selected>Choose your job categories</option>
                        @foreach ($categories as $element)
                        <option value="{{ $element->category_name }}">{{$element->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prefferred Job Location </label>
                    <input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" id="job_location" name="job_location">
                </div>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" id="addressdetails" class="btn btn-success pull-right">Submit</button>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>