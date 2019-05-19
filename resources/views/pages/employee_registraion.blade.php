@extends('master')

@section('title', 'Employee Registration')
    
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="editor.js"></script>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
			});
		</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('css/editor.css')}}" type="text/css" rel="stylesheet"/>
	<!--Section -->
    <div class="section section-pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 res-m-bttm">
                     <div class="row text-center">
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
                         <div class="col-sm-6">
                                <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <div class="card">
                                                        <h4 style="color:green">Account Information</h4>
                                                        <img src="{{ asset('images/585e4beacb11b227491c3399.png')}}" width="35" height="35">
                                                    <br>
                                                    <br>
                                                    <br>
                                            
                                    
                                                    <div class="card-body">
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
                                                        <img src="{{ asset('images/585e4beacb11b227491c3399.png')}}" width="35" height="35">
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
                                                                </div>
                                                            <div class="form-group row">
                                                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Description  ') }}</label>
                                
                                                                <div class="col-md-5">
                                                                    <textarea name="description" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="4"></textarea>
                                                                </div>
                                                                </div>

                                                            <br>
                                                       
                                                                
                                                    <button type="submit" class="btn btn-success">Register Now</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                         </div>
                        
                         
                     </div>
                     
                 </div>
                 <div class="col-md-3 col-md-offset-1">
                     <div class="sidebar-right wgs-box">
                         <div class="wgs-search">
                             <div class="wgs-content">
                                 <div class="form-group">
                                     <input type="text" class="form-control"  placeholder="Search...">
                                     <button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                 </div>
                             </div>
                             <div class="gaps size-1x"></div>
                         </div>
                         <!-- Each Widget -->
                         <div class="wgs-post">
                             <h5 class="wgs-title">Recent Blog</h5>
                             <div class="wgs-content">
                                 <div class="wgs-post-single">
                                     <div class="wgs-post-thumb">
                                         <img src="images/post-thumb-sm-a.jpg" alt="post-thumb">
                                     </div>
                                     <div class="wgs-post-entry">
                                         <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                         <span class="wgs-post-meta">December 19, 2017</span>
                                     </div>
                                 </div>
                                 <div class="wgs-post-single">
                                     <div class="wgs-post-thumb">
                                         <img src="images/post-thumb-sm-b.jpg" alt="post-thumb">
                                     </div>
                                     <div class="wgs-post-entry">
                                         <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                         <span class="wgs-post-meta">December 19, 2017</span>
                                     </div>
                                 </div>
                                 <div class="wgs-post-single">
                                     <div class="wgs-post-thumb">
                                         <img src="images/post-thumb-sm-c.jpg" alt="post-thumb">
                                     </div>
                                     <div class="wgs-post-entry">
                                         <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                         <span class="wgs-post-meta">December 19, 2017</span>
                                     </div>
                                 </div>
                                 <div class="wgs-post-single">
                                     <div class="wgs-post-thumb">
                                         <img src="images/post-thumb-sm-d.jpg" alt="post-thumb">
                                     </div>
                                     <div class="wgs-post-entry">
                                         <h6 class="wgs-post-title"><a href="blog-single.html">Working Hard to Keep Pace with Demand </a></h6>
                                         <span class="wgs-post-meta">December 19, 2017</span>
                                     </div>
                                 </div>
                             </div>
                             <div class="gaps size-2x"></div>
                         </div>
                         <!-- End Widget -->
                         
                         <div class="wgs-tags">
                             <h5 class="wgs-title">Tags</h5>
                             <div class="wgs-content">
                                 <ul class="tag-list clearfix">
                                     <li><a href="#">BitCoin</a></li>
                                     <li><a href="#">Excenge</a></li>
                                     <li><a href="#">Trade</a></li>
                                     <li><a href="#">Buy Sell</a></li>
                                     <li><a href="#">Wallet</a></li>
                                     <li><a href="#">Crypto</a></li>
                                 </ul>
                             </div>
                             <div class="gaps size-1x"></div>
                         </div>

                         <div class="wgs-box wgs-contact-info">
                             <div class="wgs-content boxed">
                                 <div class="contact-information">
                                     <div class="contact-entry">
                                         <h6>Crypto<span>Coin</span></h6>
                                         <p>34 south franklin road<br/>santa ana,ca 8975,usa</p>
                                     </div>
                                     <div class="gaps size-1x"></div>
                                     <div class="contact-entry">
                                         <h6>contact number</h6>
                                         <p>phone:  781-123-9865<br/>toll free: 800-123-5689</p>
                                     </div>
                                     <div class="gaps size-1x"></div>
                                     <div class="contact-entry">
                                         <h6>office hours</h6>
                                         <p>monday - friday<br/>8:30am - 5:00pm</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                </div>
            </div>
        </div>
        <!--End Section -->
@endsection
