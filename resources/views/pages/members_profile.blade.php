@extends('layouts.app2')
@section('title', 'Members Profile')
@section('content')

@php
    $id = Auth::id();
    $user_details = DB::table('users')
    ->join('members', 'members.users_id', '=', 'users.id')
    ->join('job_categories', 'job_categories.id', '=', 'members.job_area_id')
            ->select('users.*', 'members.*', 'job_categories.category_name as job_cat_name')
            ->where('users.id', $id)
            ->first();

    $job_applies = DB::table('job_applies')
    ->join('jobs', 'jobs.id', '=', 'job_applies.job_id')
            ->select('job_applies.*', 'jobs.*')
            ->where('job_applies.user_id', $id)
            ->get();
@endphp
<div class="container emp-profile">

        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                Kshiti Ghelani
                            </h5>
                            <h6>
                                Web Developer and Designer
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" style="color:blue;" aria-controls="home" aria-selected="true">My CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="home" style="color:blue;" aria-selected="true">Applied Job List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" style="color:blue;" aria-selected="false">View CV</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                <p style="color: #000">Full-name: {{ $user_details->first_name}} {{ $user_details->last_name}}</p>
                    <p style="color: #000">Email : {{ $user_details->email}}</p>
                    <p style="color: #000">Mobile Number: {{ $user_details->phone}}</p>
                    <p style="color: #000">Blood Group: {{ $user_details->blood_group}}</p>
                    <p style="color: #000">Batch Number: {{ $user_details->batch_no}}</p>
                    <p style="color: #000">Admission Year: {{ $user_details->addmission_year}}</p>
                    <p style="color: #000">Passing Year: {{ $user_details->passing_year}}</p>
                    <p style="color: #000">Registration No: {{ $user_details->reg_no}}</p>
                    <p style="color: #000">Job Experience: {{ $user_details->experience_year}}</p>
                    <p style="color: #000">Job Skills: {{ $user_details->job_skill}} </p>
                    <p style="color: #000">Job Areas: {{ $user_details->job_cat_name}}</p>
                    
                    
                </div>
            </div>
            @php
            $id =Auth::id();
            $collection = DB::table('cv')->where('user_id', $id)->get();
        @endphp
            
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    
                     @if(Session::has('message'))
                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
                    @endif
                     @if(Session::has('wrong_msg'))
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('wrong_msg') !!}</em></div>
                    @endif
                        <form action="{{ URL::to('/upload/cv/online') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                                <input type="file" name="upload_file" >
                                <label style="color: red" for="upload_file">File max size: 3mb
                                        File types: pdf
                                        Files allowed: 5</label>
                                <input type="hidden" name="user_id" value="{{$id}}"> 
                                <br>
                                <br>
                                <button class="btn btn-primary" type="submit">Upload CV</button>

                    </form>
                    </div>
                   
                    <br>
                    <br>
                    <div>
                            <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">View Resume </th>
                                        <th scope="col">Download Resume </th>
                                        <th scope="col">Action </th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                            
                                      <tr>
                                        <th scope="row"><a href="{{ asset('files/'.$item->upload_file)}}">Open the pdf!</a></th>
                                        <td style="color:#0062cc"><a href="{{ asset('files/'.$item->upload_file)}}" download="{{$item->upload_file}}">Download </a> </td>
                                        
                                      <td>
                                      <button type="submit" onclick="window.location.href = '{{ URL::to('/delete/cv', $item->id)}}'" class="btn btn-danger" >Delete</button>
                                      </td>
                                       
                                      </tr>
                                      @endforeach
                                     
                                    </tbody>
                                  </table>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Experience</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Hourly Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>10$/hr</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Projects</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>230</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>English Level</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Availability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>6 months</p>
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="profile-tab">
                                
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-info">
                                    <thead>
                                      <tr>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Applied Post</th>
                                        <th scope="col">Expect Salary</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($job_applies as $item)
                                            
                                      <tr>
                                      <td>{{ $item->company_name}}</td>
                                        <td>{{ $item->job_position}}</td>
                                        <td>{{ $item->salary}}</td>
                                      </tr>
                                      @endforeach
                                 
                                 
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
</div>
    <style>
    
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px ;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #000;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #000;
}
    </style>
@endsection