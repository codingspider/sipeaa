@extends('layouts.app2')
@section('title', 'Training Posts')

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

                    <!-- Default form register -->
<form action="{{ URL::to('/training/post/success') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <h3 class="text-center">Post A Training </h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Title *</label>
     <input type="text" class="form-control" name="course_title" required="">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">choose category *</label>
    <select name="training_cat" class="form-control" required="">
      <option>Select.....</option>
            @foreach($data as $value)
      <option value="{{ $value->name}}">{{ $value->name}} </option>
      @endforeach
    </select>
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Course From *</label>
    <input type="date" class="form-control" name="form_date" required="">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">To Date *</label>
    <input type="date" class="form-control" name="to_date" required="">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Registration Fees *</label>
     <input type="text" class="form-control" name="reg_fee" required="">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Last date of Registration *</label>
    <input type="date" class="form-control" name="last_date" required="">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Description of File::</label>
    <div class="form-group">
  <textarea name="description" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" required></textarea>
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Venue *</label>
     <input type="text" class="form-control" name="venue" required="">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1" style="color: green;">Choose a file to upload (Max. 1MB):</label>
    <input type="file" name="images" class="form-control" required="">
  </div>

  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Post Now</button>
</form>
<!-- Default form register -->
                    
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                        <div class="wgs-search">
                            <div class="wgs-content">
                                <div class="form-group">
                                    <h3> Search Employees </h3>
                                    
                                        <select class="form-control" id="sel1">
                                                <option value=""> - select -</option>
                                            
                                                <option value="Accounting/Finance">Accounting/Finance</option>
                                                        <option value="Bank/ Non-Bank Fin. Institution">Bank/ Non-Bank Fin. Institution</option>
                                                        
                                              </select>
                                              <button type="button" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="gaps size-1x"></div>
                        </div>
                        <!-- Each Widget -->
                        <div class="wgs-post">
                            <div class="wgs-content">
                                    <div class="form-group">
                                            <h3> Search Jobs  </h3>
                                            
                                                <select class="form-control" id="sel1">
                                                        <option value=""> - select -</option>
                                                    
                                                        <option value="Accounting/Finance">Accounting/Finance</option>
                                                       
                                                      </select>
                                                      <button type="button" class="btn btn-primary">Search</button>
                                        </div>
                            </div>
                            <div class="gaps size-2x"></div>
                        </div>
                        <!-- End Widget -->
                        
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- End Section -->
    <br>
    <br>
    <br>
@endsection