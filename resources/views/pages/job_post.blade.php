@extends('layouts.app')
@section('title', 'Job Posts')

@section('content')
    @php
    use Illuminate\Support\Facades\Auth;
    $id = Auth::id();

    $category = DB::table('job_categories')->get();
    $location = DB::table('job_location')->get();
    @endphp


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
<form action="{{ URL::to('/post/jobs/save') }}" method="POST" enctype="multipart/form-data" class="text-center border border-light p-5">
@csrf
    <h1>Post A New Job </h1>
<br>

    <div class="form-row mb-3">
        <div class="col-md-6">
            <!-- First name -->
            <label for="sel1">Job Title *</label>
            <input type="text" name="job_title" class="form-control" placeholder="Job Title " required>
        </div>
        <div class="col-md-6">
            <!-- First name -->
            <label for="sel1">Company Name*</label>
            <input type="text" name="company_name" class="form-control" placeholder="Company name" required>
        </div>
        <div class="col-md-6">
            <!-- Last name -->
            <label for="sel1">Job Position *</label>
            <input type="text" name="job_position" class="form-control" placeholder="Job Position" required>
        </div>
        <div class="col-md-6">
            <!-- Last name -->
            <label for="sel1">No. of Vacancy *</label>
            <input type="text" name="no_vacancy" class="form-control mb-4" placeholder="No. of Vacancies" required>

        </div>
    </div>

   
    <!-- Password -->
    <label for="sel1">Job Details *</label>
    <textarea name="job_details" rows="4" cols="80" placeholder="Describe you job details  here..."></textarea>
    <br>
    <label for="sel1">Job Category *</label>
     <select name="job_category" class="form-control" id="sel1">
         @foreach ($category as $item)
             
     <option value="{{ $item->id }}">{{ $item->category_name }}</option>
    @endforeach

   
  </select>
  <label for="sel1">Job Type *</label>
  <label class="radio-inline"><input type="radio" value="full_time" name="optradio" checked>Full Time </label>
    <label class="radio-inline"><input type="radio" value="part_time" name="optradio">Part Time </label>
    <br>
    <br>
    <label for="sel1">Experience & Other Requirements</label>
    <textarea name="job_experience" rows="4" cols="80" placeholder="Describe you job details  here..."></textarea>
    <br>
    <br>
    <label for="sel1">Job Location *</label>
    <select name="job_location" class="form-control" id="sel1">
        @foreach ($location as $item)
            
    <option value="{{ $item->id }}" >{{ $item->name }}</option>
      @endforeach
     
    </select>
    <br>
    <div class="col-md-6">
            <label for="sel1">Salary Range *</label>
            <!-- Last name -->
            <input type="text" name="salary" class="form-control" placeholder="Salary Range" required>
        </div>
    <div class="col-md-6">
            <label for="sel1">Application Deadline *</label>
            <!-- Last name -->
            <input type="date" name="app_deadline" class="form-control" placeholder="Application Deadline" required>
        </div>

        <label for="sel1">Apply Instructions </label>
    <textarea name="apply_instruction" rows="4" cols="80" placeholder="Describe your Apply Instruction  here..."></textarea>
    <!-- Sign up button -->
    <br>
    <input type="hidden" name="user_id" value="{{ $id }}"> 
    <br>
    <input type="file" name="images">
    <br>
    <br>
    <button class="btn btn-info my-4 btn-block" type="submit">Post Your Job Now</button>

    

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
    
@endsection