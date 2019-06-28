<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<div class="container">


	<div class="col-md-12">
        <div class="bio-info col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bio-image">
                                <img src="{{ asset('/files/'.$users->images)}}" alt="image" />
                            </div>			
                        </div>
                    </div>	
                </div>
                <div class="col-md-6">
                    <div class="bio-content">
                    <h1>Name: {{ $users->first_name}} {{ $users->last_name }}</h1>
                    <h6>Phone {{ $users->phone }}</h6>
                       <h6>Blood Group: {{ $users->blood_group }}</h6><h6>Addmission Year :{{ $users->addmission_year }}</h6>
                       <h6>Passing Year : {{ $users->passing_year }}</h6><h6>Registration No:  {{ $users->last_name }}</h6>
                       <h6>Batch : {{ $users->batch_no }}</h6>
                       <h6>Experience : {{ $users->experience_year }}</h6>
                       <h6>Job Skill : {{ $users->job_skill }}</h6>
                        <p>Email: {{ $users->user_id }}</p>
                        
                    </div>
                </div>
            </div>	
        </div>

    </div>
</div>

<style>

.portfolio {
  padding:6%;
  text-align:center;
}


.bio-info {
  padding:5%;
  background:#fff;
  box-shadow:0px 0px 4px 0px #b0b3b7;
}

.name {
  font-family:'Charmonman', cursive;
  font-weight:600;
}

.bio-image {
  text-align:center;
}

.bio-image img {
  width:350px;
  height:350px;
  border-radius:50%;
}

.bio-content {
  text-align:left;
}

.bio-content p {
  font-weight:600;
  font-size:30px;
}


</style>

@endsection