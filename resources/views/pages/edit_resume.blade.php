@extends('layouts.app2')
@section('title', 'Members Profile')
@section('content')


@php
    $id = Auth::id();
   $member_profile = DB::table('users')
    ->join('members', 'members.users_id', '=', 'users.id')
    ->select('users.*', 'members.*')
    ->where('approve', 1)->where('users.id', $id)->first();
@endphp
<br>

<div class="container emp-profile">

<div class="container-fluid">

  <div class="row">
      <div class="col-md-10">
        
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

 <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Peronal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Education/Training</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Eemployment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tabthree-tab" data-toggle="tab" href="#tabthree" role="tab" aria-controls="tabthree" aria-selected="false">Other Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tabfour-tab" data-toggle="tab" href="#tabfour" role="tab" aria-controls="tabfour" aria-selected="false">Photograph</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Personal Details 
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="container">
                        <br />
                        <div align="right">
                          @if($personaldetails)
                         
                       <button class="btn btn-info disabled">Add Personal Details</button>
                        @else
                         <button type="button" name="myModal" data-toggle="modal" data-target="#myModal" class="btn btn-info">Add Personal Details</button>
                       @endif
                                                              
                        </div>

                        <div id="myModal" class="modal fade" role="dialog">
                        @include('modal.personaldetails')
                        </div>
                        <br />
                        <div class="container">
                            @if ($personaldetails == NULL)
                            <h3>Nothing to show</h3>
                            @else 
                             @include('allpage.personal')
                            @endif
                           
                           

                        </div>
                    </div>
      
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Address Details 
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myModaladdress" class="btn btn-info">Add Address Details</button>                                    
                </div>
                <div class="container">
                  
                     @forelse ($address as $element)
                         @include('allpage.address')
                     @empty
                        <h3>You did not added your address. </h3>
                     @endforelse
                       
                 </div>
                <div id="myModaladdress" class="modal fade" role="dialog">
                        @include('modal.addressdetails')
                </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Career And Application Information
              </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myModalcareer" class="btn btn-info pull-right">Add Career Details</button> 
              </div>

                <div class="container">
                      @forelse ($career as $value)
                         @include('allpage.career')
                     @empty
                        <h3>You did not added your career details. </h3>
                     @endforelse
                 </div>
                <div id="myModalcareer" class="modal fade" role="dialog">
                        @include('modal.careerdetails')
                </div>                       
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Prefer Job Categories
              </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#PreferJobs" class="btn btn-info pull-right">Add Prefer Job Details</button> 
                </div>
                <div class="container">
                      @forelse ($prefer_jobs as $prefer_job)
                         @include('allpage.frefer_job')
                     @empty
                        <h3>You did not added your career details. </h3>
                     @endforelse
                 </div>
                <div id="PreferJobs" class="modal fade" role="dialog">
                        @include('modal.prefer_job_details')
                </div>                       
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapstwenty" aria-expanded="false" aria-controls="collapstwenty">
                   Other Relevant Information 
                  </button>
                </h2>
              </div>
              <div id="collapstwenty" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <br>
                <div align="right">
                    <button type="button" name="myModal" data-toggle="modal" data-target="#myModalothers" class="btn btn-info pull-right">Add other relevant Details</button>
                  </div>
                <div class="card-body">
                  
                  <div class="container">
                  
                </div>
                     @forelse ($career_summery as $otherrelavant)
                         @include('allpage.otherrelavant')
                     @empty
                        <h3>You did not added your other relavant details. </h3>
                     @endforelse
                       
                 </div>
                <div id="myModalothers" class="modal fade" role="dialog">
                        @include('modal.otherrelavantdetails')
                </div>
                
              </div>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="accordion" id="accordionExample">
               <br>
               <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#academicDetails" aria-expanded="false" aria-controls="academicDetails">
                   Academic details
                  </button>
                </h2>
              </div>
              <div id="academicDetails" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <br>
                
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myModaltraining" class="btn btn-info">Add Educational Details</button>                                    
                </div>
                <div class="container">
                  
                     @forelse ($education_level as $education)
                         @include('allpage.academic')
                     @empty
                        <h3>You did not added your academic details. </h3>
                     @endforelse
                       
                 </div>
                <div id="myModaltraining" class="modal fade" role="dialog">
                        @include('modal.academicdetails')
                </div>
                </div>
                
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                    Training Summary
                  </button>
                </h2>
              </div>
              <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myModaltraining" class="btn btn-info">Add Training Details</button>                                    
                </div>
                <div class="container">
                  
                     @forelse ($training_title as $training)
                         @include('allpage.training')
                     @empty
                        <h3>You did not added your training details. </h3>
                     @endforelse
                       
                 </div>
                <div id="myModaltraining" class="modal fade" role="dialog">
                        @include('modal.trainingdetails')
                </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                   Professional Qualification
                  </button>
                </h2>
              </div>
              <div id="collapsesix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myCertifica" class="btn btn-info">Add Profesional Qualification Details</button>                            
                </div>
                <br>
                <div class="container">
                  
                     @forelse ($certificate as $certi)
                         @include('allpage.certificate')
                     @empty
                        <h3>You did not added your professional details. </h3>
                     @endforelse
                       
                 </div>
                <div id="myCertifica" class="modal fade" role="dialog">
                        @include('modal.certificatedetails')
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                   Employment History
                  </button>
                </h2>
              </div>
              <div id="collapseseven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#myemployment" class="btn btn-info">Add Employment Details</button>                            
                </div>
                <div class="container">
                  
                     @forelse ($employments as $employment)
                         @include('allpage.employment')
                     @empty
                        <h3>You did not added your academic details. </h3>
                     @endforelse
                       
                 </div>
                <div id="myemployment" class="modal fade" role="dialog">
                        @include('modal.employmentsdetails')
                </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#othersemploymentsdetails" aria-expanded="false" aria-controls="othersemploymentsdetails">
                   Employment History For Retired Army Person
                  </button>
                </h2>
              </div>
              <div id="othersemploymentsdetails" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#othersEmploy" class="btn btn-info">Add Others Employment Details</button>                            
                </div>
                <div class="container">
                  
                     @forelse ($others_employments as $others_employ)
                         @include('allpage.otheremployment')
                     @empty
                        <h3>You did not added your academic details. </h3>
                     @endforelse
                       
                 </div>
                <div id="othersEmploy" class="modal fade" role="dialog">
                        @include('modal.othersemploymentsdetails')
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="tabthree" role="tabpanel" aria-labelledby="tabthree-tab">
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#othersemploymentsdetails" aria-expanded="false" aria-controls="othersemploymentsdetails">
                  Specialization
                  </button>
                </h2>
              </div>
              <div id="othersemploymentsdetails" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#special" class="btn btn-info">Add Specialist </button>                            
                </div>
                <div class="container">
                  
                     @forelse ($specials as $special)
                         @include('allpage.special')
                     @empty
                        <h3>You did not added your academic details. </h3>
                     @endforelse
                       
                 </div>
                <div id="special" class="modal fade" role="dialog">
                        @include('modal.specialsdetails')
                </div>
                </div>
              </div>
            </div>

             <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#languageDetails" aria-expanded="false" aria-controls="languageDetails">
                  Language
                  </button>
                </h2>
              </div>
              <div id="languageDetails" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#Language" class="btn btn-info">Add Specialist </button>                            
                </div>
                <div class="container">
                  
                     @forelse ($languages as $language)
                         @include('allpage.language')
                     @empty
                        <h3>You did not added your academic details. </h3>
                     @endforelse
                       
                 </div>
                <div id="Language" class="modal fade" role="dialog">
                        @include('modal.languagedetails')
                </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Reference" aria-expanded="false" aria-controls="Reference">
                  Reference 
                  </button>
                </h2>
              </div>
              <div id="Reference" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div align="right">     
                <button type="button" name="myModal" data-toggle="modal" data-target="#fsfsffsf" class="btn btn-info">Add Specialist </button>                            
                </div>
                <div class="container">
                  
                     @forelse ($reference as $refer)
                         @include('allpage.reference')
                     @empty
                        <h3>You did not added your reference details. </h3>
                     @endforelse
                       
                 </div>
                <div id="fsfsffsf" class="modal fade" role="dialog">
                        @include('modal.referencedetails')
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="tabfour" role="tabpanel" aria-labelledby="tabfour-tab">
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="true" aria-controls="collapsethirteen">
                   Upload Your Photo 
                  </button>
                </h2>
              </div>
          
              <div id="collapsethirteen" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                 <form action="{{ URL::to('dashboard/photograph/upload')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                        <label for="imageInput">File input</label>
                        <input data-preview="#preview" name="file" type="file" id="imageInput">
                        <img class="col-sm-6" id="preview"  src="">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                     <div class="form-group">
                    <input class="form-control btn btn-success"  type="submit">
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
</div>


<br>

@endsection