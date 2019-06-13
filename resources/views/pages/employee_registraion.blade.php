@extends('layouts.app2')

@section('title', 'Employee Registration')
    
@section('content')
@php
    $data = DB::table('job_categories')->get();
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
<div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="featured-box featured-box-primary text-left mt-2">
                                    <div class="box-content">
                                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a New User </h4>
                                        <form method="POST" action="{{ URL::to('/employee/registration') }}" >
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input  type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required autofocus>
                    
                                                    @if ($errors->has('user_id'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('user_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                                       
                    
                                        
                                           
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <br>
                                            <h4 style="color:green">Company details</h4>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Compnay Name') }}</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control{{ $errors->has('co_name') ? ' is-invalid' : '' }}" name="co_name" value="{{ old('co_name') }}" required>

                            @if ($errors->has('co_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('co_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control{{ $errors->has('contact_person') ? ' is-invalid' : '' }}" name="contact_person" value="{{ old('contact_person') }}" required>

                            @if ($errors->has('contact_person'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact_person') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                    
                                            <div class="form-group row">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Persons phone') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="text" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                        
                                                        @if ($errors->has('phone'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Persons Designation') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="text" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ old('designation') }}" required>
                        
                                                        @if ($errors->has('designation'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('designation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Job Areas  ') }}</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" name="job_areas" data-required="no" data-type="select">

                                                <option value=""> - select -</option>
                            @foreach ($data as $item)
                                
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                                                           
                                                </select>
                                        </div>
                                                </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Description  ') }}</label>
                
                                                <div class="col-md-5">
                                                        <textarea name="job_skill" rows="5" cols="50"></textarea>
                                                </div>
                                                </div>

                                            <br>
                                            <div class="form-group col-lg-6">
                                                    <input type="submit" value="Register Now" class="btn btn-primary btn-modern float-right">
                                                </div>
                                                
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="featured-box featured-box-primary text-left mt-2">
                                    <div class="box-content">
                                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Search</h4>
                                      
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
