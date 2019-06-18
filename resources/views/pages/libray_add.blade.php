@extends('layouts.app2')
@section('title', 'Library Add')

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
<form action="{{ URL::to('/upload/library') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <h3 class="text-center">Add Library </h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Document Type</label>
    <select name="doc_type" class="form-control" required="">
      <option>Book</option>
      <option>Research Paper</option>
      <option>Project Paper </option>
    </select>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description of File::</label>
    <div class="form-group">
  <textarea name="description" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" required></textarea>
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Update Date:</label>
    <input type="date" class="form-control" name="date" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color: green;">Choose a file to upload (Max. 5MB):</label>
    <input type="file" name="images" class="form-control" required="">
  </div>
  <div class="form-check">
    <input type="checkbox" name="agreement" value="agreed" required="">
    <label class="form-check-label" for="exampleCheck1"> I hereby declared that the uploaded contents will not violate any rules or regulation of SIPEAA…</label>
  </div>
  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Upload Now</button>
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