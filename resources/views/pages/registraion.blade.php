@extends('layouts.app2')

@section('title', 'Member Registration')
    
@section('content')
@php
    $data = DB::table('job_categories')->get();

    $job_areas = DB::table('job_categories')->get();
@endphp


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<br>
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
<div role="main" class="main py-4">

        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="featured-box featured-box-primary text-left mt-2">
                                    <div class="box-content">
                                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a New User </h4>
                                        <form method="POST" action="{{ URL::to('/member/registration') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">First Name</label>
                                                    <input  type="text" style="border:1px solid #818182" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name=" first_name" value="{{ old('name') }}" placeholder="enter your first name" required autofocus>
                                    
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Last Name</label>
                                                    <input  type="text" style="border:1px solid #818182" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="enter your last name" required autofocus>
                                    
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">User Id</label>
                                                    <input  type="email" style="border:1px solid #818182" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" placeholder="enter your user email" required autofocus>
                                    
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('user_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Password</label>
                                                    <input id="password" style="border:1px solid #818182" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="enter your password" required>
                                    
                                                                    @if ($errors->has('password'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Confirm Password</label>
                                                    <input id="password-confirm" style="border:1px solid #818182" type="password" class="form-control" name="password_confirmation" placeholder="re-enter your password" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2"> E-mail Address</label>
                                                    <input id="email" style="border:1px solid #818182" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="enter your email id" required>
                                    
                                                                    @if ($errors->has('email'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Phone</label> 
                                                    <input id="text" style="border:1px solid #818182" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"placeholder="enter your phone number" required>
                                        
                                                                        @if ($errors->has('phone'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                                            </span>
                                                                        @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Blood Group</label>
                                                    <select style="border:1px solid #818182" name="blood_group" class="form-control" id="sel1">
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
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Year of Admission</label>
                                                        <input style="border:1px solid #818182" id="text" type="text" class="form-control{{ $errors->has('admission_year') ? ' is-invalid' : '' }}" name="admission_year" value="{{ old('admission_year') }}" placeholder="enter your addmission year" required>
                                        
                                                        @if ($errors->has('admission_year'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('admission_year') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Year of Passing</label>
                                                        <input style="border:1px solid #818182" id="text" type="text" class="form-control{{ $errors->has('passing_year') ? ' is-invalid' : '' }}" name="passing_year" value="{{ old('passing_year') }}" placeholder="enter your passing year" required>
                                        
                                                                        @if ($errors->has('passing_year'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('passing_year') }}</strong>
                                                                            </span>
                                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Registration no</label>
                                                        <input style="border:1px solid #818182" id="text" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" placeholder="enter your registration number" required>
                                        
                                                        @if ($errors->has('reg_no'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('reg_no') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Batch no</label>
                                                        <input style="border:1px solid #818182" id="text" type="text" class="form-control{{ $errors->has('batch_no') ? ' is-invalid' : '' }}" name="batch_no" value="{{ old('batch_no') }}" placeholder="enter your batch number" required>
                                        
                                                                        @if ($errors->has('batch_no'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('batch_no') }}</strong>
                                                                            </span>
                                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Experiece Years</label>
                                                        <input style="border:1px solid #818182" id="text" type="text" class="form-control{{ $errors->has('exp_year') ? ' is-invalid' : '' }}" name="exp_year" value="{{ old('exp_year') }}" placeholder="enter your experience " required>
                            
                                                        @if ($errors->has('exp_year'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('exp_year') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Job Areas </label>
                                                        <select style="border:1px solid #818182" class="form-control" name="job_areas" data-required="no" data-type="select">

                                                                <option value=""> - select -</option>
                                            @foreach ($data as $item)
                                                
                                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                                                           
                                                                </select>
                                                    </div>
                                                </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                            <label class="font-weight-bold text-dark text-2">Job Skills </label>
                                
                                                            <div class="col-md-5">
                                                                <textarea style="border:1px solid #818182" name="job_skill" rows="5" cols="80" placeholder="enter your job skills"></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                   
                                            
                                            <div class="form-row">
                                                
                                                <div class="form-group col-lg-7">
                                                    <input type="submit" value="Register Now" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="featured-box featured-box-primary text-left mt-2">
                                        <div>
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

                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
