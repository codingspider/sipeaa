@extends('crudbooster::admin_template')
@section('content')

@section('content')

<p class="alert-success text-center">
        <?php
            
        $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        } 
            ?>


<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">
                  @php
                      $users =DB::table('users')->where('user_type', 'member')->get()
                  @endphp

                    <!-- Default form register -->
<form action="{{ URL::to('/training/post/success') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <h3 class="text-center">Post A Training </h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Title *</label>
     <input  type="text" class="form-control" style="border:1px solid #818182" name="course_title" required="">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">choose category *</label>
    <select name="training_cat" style="border:1px solid #818182" class="form-control" required="">
      <option>Select.....</option>
            @foreach($data as $value)
      <option value="{{ $value->id}}">{{ $value->name}} </option>
      @endforeach
    </select>
    <br>
    <div class="form-group">
    <label for="exampleInputEmail1">choose Trainer *</label>
    <select name="trainer_id" style="border:1px solid #818182" class="form-control" >
      <option>Select.....</option>
            @foreach($users as $value)
      <option value="{{ $value->id}}">{{ $value->name}} </option>
      @endforeach
    </select>
    
    </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Course From *</label>
    <input type="date" style="border:1px solid #818182" class="form-control" name="form_date" required="">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">To Date *</label>
    <input type="date" style="border:1px solid #818182" class="form-control" name="to_date" required="">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Registration Fees *</label>
     <input type="text" style="border:1px solid #818182" class="form-control" name="reg_fee" required="">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Last date of Registration *</label>
    <input type="date" style="border:1px solid #818182" class="form-control" name="last_date" required="">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Description of File::</label>
    <div class="form-group">
  <textarea name="description" style="border:1px solid #818182" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" required></textarea>
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Venue *</label>
     <input type="text" style="border:1px solid #818182" class="form-control" name="venue" required="">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1" style="color: green;">Choose a file to upload (Max. 1MB):</label>
    <input type="file"  name="images" class="form-control" >
  </div>

  <input type="text" name="user_id" value="{{ CRUDBooster::myId() }}">
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Post Now</button>
</form>
<!-- Default form register -->
                    
                </div>
                
            </div>
        </div>  
    </div>
    <!-- End Section -->
    <br>
    <br>
    <br>
@endsection