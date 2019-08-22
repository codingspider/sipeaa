@extends('layouts.app2')
@section('title', 'Job Edit Page')

@section('content')
    @php
    use Illuminate\Support\Facades\Auth;
    $id = Auth::id();

    $category = DB::table('job_categories')->get();
    $location = DB::table('job_location')->get();
    $blood = DB::table('members')->orderBy('id', 'DESC')->get();

    $job_areas = DB::table('job_categories')->get();
    @endphp


<p class="alert-success text-center">
        <?php
            
            $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        }
            
            ?>
<section class="profil  py-5 ">
        <div class="container">
          <div class="row">
              <div class="col-md-8">
                   <div class="slider">
                       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <form action="{{ URL::to('/post/jobs/update') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                     
                                    <div class="form-row mb-3">
                                        <div class="col-md-6">
                                            <!-- First name -->
                                            <label for="sel1">Job Title *</label>
                                            <input type="text" name="job_title" style="border: 1px solid #000;" class="form-control" placeholder="Job Title " value="{{ $data->title}}">
                                        </div>
                                        <div class="col-md-6">
                                            <!-- First name -->
                                            <label for="sel1">Company Name*</label>
                                            <input type="text" name="company_name" style="border: 1px solid #000;" class="form-control" placeholder="Company name" value="{{ $data->company_name}}">
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Last name -->
                                            <label for="sel1">Job Position *</label>
                                            <input type="text" name="job_position" style="border: 1px solid #000;" class="form-control" placeholder="Job Position" value="{{ $data->job_position}}">
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Last name -->
                                            <label for="sel1">No. of Vacancy *</label>
                                            <input type="text" name="no_vacancy" style="border: 1px solid #000;" class="form-control mb-4" placeholder="No. of Vacancies" value="{{ $data->no_vacancy}}">
                                
                                        </div>
                                    </div>
                                
                                   
                                    <!-- Password -->
                                    <label for="sel1">Job Details *</label>
                                <textarea class="form-control" name="job_details" rows="4" cols="80" style="border: 1px solid #000;" placeholder="Describe you job details  here...">{{ $data->job_details}}</textarea>
                                    <br>
                                    <label for="sel1">Job Category *</label>
                                     <select name="job_category" style="border: 1px solid #000;" class="form-control" id="sel1">
                                         @foreach ($category as $item)
                                             
                                         <option value="{{$item->id}}" {{ $item->id == $data->job_category_id? 'selected' : '' }}>{{$item->category_name}}</option>
                                    @endforeach
                                
                                   
                                  </select>
                                  <label for="sel1">Job Type *</label>
                                  <label class="radio-inline"><input type="radio" value="full_time" name="optradio" checked>Full Time </label>
                                    <label class="radio-inline"><input type="radio" value="part_time" name="optradio">Part Time </label>
                                    <br>
                                    <br>
                                    <label for="sel1">Experience & Other Requirements</label>
                                    <textarea class="form-control" style="border: 1px solid #000;" name="job_experience" rows="4" cols="80" placeholder="Describe you job details  here...">{{ $data->job_experience}}</textarea>
                                    <br>
                                    <br>
                                    <label for="sel1">Job Location *</label>
                                    <select style="border: 1px solid #000;" name="job_location" class="form-control" id="sel1">
                                        @foreach ($location as $item)
                                            
                                        <option value="{{$item->id}}" {{ $item->id == $data->job_location_id? 'selected' : '' }}>{{$item->name}}</option>
                                      @endforeach
                                     
                                    </select>
                                    <br>
                                    <div class="row">
                                            <div class="col">
                                                    <label for="sel1">Salary Range *</label>
                                                    <!-- Last name -->
                                                    <input style="border: 1px solid #000;" type="text" name="salary" class="form-control" placeholder="Salary Range" value="{{ $data->salary}}">
                                                </div>
                                            <div class="col">
                                                    <label for="sel1">Application Deadline *</label>
                                                    <!-- Last name -->
                                                    <input style="border: 1px solid #000;" type="date" name="app_deadline" class="form-control" placeholder="Application Deadline" value="{{ $data->application_deadline}}">
                                                </div>
                                
                                    </div>
                                
                                        <label for="sel1">Apply Instructions </label>
                                    <textarea class="form-control" style="border: 1px solid #000;" name="apply_instruction" rows="4" cols="80" placeholder="Describe your Apply Instruction  here...">{{ $data->application_instruction}}</textarea>
                                    <!-- Sign up button -->
                                    <br>
                                    <input type="hidden" name="id" value="{{ $data->id }}"> 
                                    <br>
                                    <input style="border: 1px solid #000;" type="file" name="images">
                                    <br>
                                    <br>
                                    <button class="btn btn-info my-4 btn-block" type="submit">Post Your Job Now</button>
                                
                                    
                                
                                </form>
                       </div>
                   </div>
        
              </div>
              <div class="col-md-4">
                  <div class="card"></div>
                  <p class="text-center"> Select Blood Group </p>
                  <form method="post" action="{{URL::to('/search/result') }}">
                      @csrf
                  <select id="search" name="blood_group" onchange="this.form.submit()" class="form-control">
              
                        <option selected>Select</option>
                        <option value="A">A+</option>
                        <option value="A">A-</option>
                        <option value="B">B+</option>
                        <option value="B">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB">AB-</option>
                        <option value="O">O</option>
                        <option value="O-">O-</option>
                              </select>
                     </form>
                  <div class="card"></div>
                  <p class="text-center"> Select Job Areas </p>
                  <form method="post" action="{{URL::to('/search/result/job/areas') }}">
                      @csrf
                  <select id="search" name="job_areas" onchange="this.form.submit()" class="form-control">
              
                                <option selected>Select</option>
                                @foreach( $job_areas as $jobs )
                                <option value="{{ $jobs->id }}">{{ $jobs->category_name }}</option>
                                @endforeach
                              </select>
                            </form>
                  </div>
              </div>
          </div>
        </div>
     </section>

     <style>
     
     .profil{
  background: #f9f9f9;
}
.profil .yacht-info__list li {
    width:25%;
}
.olanaklar-kutu{
  background: #fff;
  border-radius: 10px;
  border: 1px solid rgba(0, 0, 0, 0.125);
  overflow: hidden;
  float: left;
  width: 100%;
  margin: 15px 0px;
}
.olanaklar{
  float: left;
  width: 100%;
  position: relative;
  padding: 25px 30px 30px;
}
.margin-top--22{
  margin-top:-22px;
}
.olanaklar-kutu h4{
  color: #FF9800;
}
.yacht-info__list img{
    width:20px;
    padding-right:5px;
}
.yacht-info__list {
    list-style: none;
    padding: 0;
    font-size: 16px;
}
.yacht-info__list li {
    padding: 6px 0;
    font-size: 15px;
    display: table;
    height: 100%;
    line-height: 21px;
    float: left;
    width: 50%;
    margin-bottom: 5px;
}

     </style>
    
@endsection