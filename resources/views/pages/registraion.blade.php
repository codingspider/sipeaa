@extends('master')

@section('title', 'Members Registration')
    
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
                                                        <h4 style="color:green">Personal Information</h4>
                                                        <img src="{{ asset('images/585e4beacb11b227491c3399.png')}}" width="35" height="35">
                                                    <br>
                                                    <br>
                                                    <br>
                                            
                                    
                                                    <div class="card-body">
                                                    <form method="POST" action="{{ URL::to('/member/registration') }}" >
                                                            @csrf
                                    
                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name=" first_name" value="{{ old('name') }}" required autofocus>
                                    
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input  type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                    
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Id') }}</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input  type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required autofocus>
                                    
                                                                    @if ($errors->has('name'))
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
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>
                                        
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
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>
                                        
                                                                    <div class="col-md-6">
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

                                                                                                                              
                                                                
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <h4 style="color:green">Educational Information</h4>
                                                            <img src="{{ asset('images/15-154390_universities-transparent-education-icon-clipart.png')}}" width="35" height="35">
                                                            <br>
                                                            <br>
                                                            <br>

                                                            <div class="form-group row">
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Year of Admission') }}</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="text" type="text" class="form-control{{ $errors->has('admission_year') ? ' is-invalid' : '' }}" name="admission_year" value="{{ old('admission_year') }}" required>
                                        
                                                                        @if ($errors->has('admission_year'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('admission_year') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            <div class="form-group row">
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Year of Passing') }}</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="text" type="text" class="form-control{{ $errors->has('passing_year') ? ' is-invalid' : '' }}" name="passing_year" value="{{ old('passing_year') }}" required>
                                        
                                                                        @if ($errors->has('passing_year'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('passing_year') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            <div class="form-group row">
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Registration no ') }}</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="text" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" required>
                                        
                                                                        @if ($errors->has('reg_no'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('reg_no') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            <div class="form-group row">
                                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Batch no  ') }}</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="text" type="text" class="form-control{{ $errors->has('batch_no') ? ' is-invalid' : '' }}" name="batch_no" value="{{ old('batch_no') }}" required>
                                        
                                                                        @if ($errors->has('batch_no'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('batch_no') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <br>

                                                                <h4 style="color:green">Career Information</h4>
                                                        <img src="{{ asset('images/briefcase2-512.png')}}" width="35" height="35">
                                                    <br>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Experiece Years  ') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <input id="text" type="text" class="form-control{{ $errors->has('exp_year') ? ' is-invalid' : '' }}" name="exp_year" value="{{ old('exp_year') }}" required>
                            
                                                            @if ($errors->has('exp_year'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('exp_year') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Job Areas  ') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="job_areas" data-required="no" data-type="select">

                                                                <option value=""> - select -</option>
                                            
                                                                    <option value="Accounting/Finance">Accounting/Finance</option>
                                                                            <option value="Bank/ Non-Bank Fin. Institution">Bank/ Non-Bank Fin. Institution</option>
                                                                            <option value="Commercial/Supply Chain">Commercial/Supply Chain</option>
                                                                            <option value="Education/Training">Education/Training</option>
                                                                            <option value="Engineer/Architects">Engineer/Architects</option>
                                                                            <option value="Garments/Textile">Garments/Textile</option>
                                                                            <option value="HR/Org. Development">HR/Org. Development</option>
                                                                            <option value="Gen Mgt/Admin">Gen Mgt/Admin</option>
                                                                            <option value="Design/Creative">Design/Creative</option>
                                                                            <option value="Production/Operation">Production/Operation</option>
                                                                            <option value="Hospitality/ Travel/ Tourism">Hospitality/ Travel/ Tourism</option>
                                                                            <option value="Beauty Care/ Health/ Fitness">Beauty Care/ Health/ Fitness</option>
                                                                            <option value="Electrician/ Construction/ Repair">Electrician/ Construction/ Repair</option>
                                                                            <option value="IT/Telecommunication">IT/Telecommunication</option>
                                                                            <option value="Marketing/Sales">Marketing/Sales</option>
                                                                            <option value="Customer Support/Call Centre">Customer Support/Call Centre</option>
                                                                            <option value="Media/Ad./Event Mgt.">Media/Ad./Event Mgt.</option>
                                                                            <option value="Medical/Pharma">Medical/Pharma</option>
                                                                            <option value="Agro (Plant/Animal/Fisheries)">Agro (Plant/Animal/Fisheries)</option>
                                                                            <option value="NGO/Development">NGO/Development</option>
                                                                            <option value="Research/Consultancy">Research/Consultancy</option>
                                                                            <option value="Secretary/Receptionist">Secretary/Receptionist</option>
                                                                            <option value="Data Entry/Operator/BPO">Data Entry/Operator/BPO</option>
                                                                            <option value="Driving/Motor Technician">Driving/Motor Technician</option>
                                                                            <option value="Security/Support Service">Security/Support Service</option>
                                                                            <option value="Law/Legal">Law/Legal</option>
                                                                            <option value="Retailer">Retailer</option>
                                                                </select>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Job Skills  ') }}</label>
                                
                                                            <div class="col-md-5">
                                                                <textarea name="job_skill" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
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
