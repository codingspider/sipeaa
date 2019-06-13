@extends('layouts.app2')

@section('title', 'Members Registration')
    
@section('content')

@php
    $data = DB::table('job_categories')->get();
@endphp


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<div role="main" class="main">

        

        <div class="container">

            <div class="row">
                <div class="col">

                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="featured-box featured-box-primary text-left mt-5">
                                    <div class="box-content">
                                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a New Customer</h4>
                                        <form method="POST" action="{{ URL::to('/member/registration') }}" >
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">First Name</label>
                                                    <input  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name=" first_name" value="{{ old('name') }}" required autofocus>
                                    
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
                                                    <input  type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                    
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
                                                    <input  type="email" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required autofocus>
                                    
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
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    
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
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2"> E-mail Address</label>
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    
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
                                                    <input id="text" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                        
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
                                                    <select name="blood_group" class="form-control" id="sel1">
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                          </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="font-weight-bold text-dark text-2">Year of Admission</label>
                                                        <input id="text" type="text" class="form-control{{ $errors->has('admission_year') ? ' is-invalid' : '' }}" name="admission_year" value="{{ old('admission_year') }}" required>
                                        
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
                                                        <input id="text" type="text" class="form-control{{ $errors->has('passing_year') ? ' is-invalid' : '' }}" name="passing_year" value="{{ old('passing_year') }}" required>
                                        
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
                                                        <input id="text" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" required>
                                        
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
                                                        <input id="text" type="text" class="form-control{{ $errors->has('batch_no') ? ' is-invalid' : '' }}" name="batch_no" value="{{ old('batch_no') }}" required>
                                        
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
                                                        <input id="text" type="text" class="form-control{{ $errors->has('exp_year') ? ' is-invalid' : '' }}" name="exp_year" value="{{ old('exp_year') }}" required>
                            
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
                                                        <select class="form-control" name="job_areas" data-required="no" data-type="select">

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
                                                                <textarea name="job_skill" rows="5" cols="80"></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            
                                            <div class="form-row">
                                                
                                                <div class="form-group col-lg-6">
                                                    <input type="submit" value="Register Now" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                                </div>
                                            </div>
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
