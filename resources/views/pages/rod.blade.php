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
                                        <form action="/" id="frmSignIn" method="post" class="needs-validation">
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                    <input type="text" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <a class="float-right" href="#">(Lost Password?)</a>
                                                    <label class="font-weight-bold text-dark text-2">Password</label>
                                                    <input type="password" value="" class="form-control form-control-lg" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="rememberme">
                                                        <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="submit" value="Login" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
