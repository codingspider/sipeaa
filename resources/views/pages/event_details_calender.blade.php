@extends('layouts.app2')
@section('title', 'Events Details')

@section('content')
    
@foreach ($data as $item)
    
@endforeach
<br>
<br>
<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">

                    <div class="post post-single">
                        <div class="post-thumb">
                        <img alt="" src="{{ URL::asset( $item->images) }}" style="width:500px; height:300;">
                        </div>
                        <div class="post-meta">
                            <span class="pub-date ">Event Date <em class="fa fa-calendar" aria-hidden="true"></em>  {{ $item->start_date }} </span>
                        </div>
                        <div class="post-entry">
                            <h3>{{ $item->title }}</h3>
                            <p> {{ $item->short_description }} </p>
                        </div>
                        <div class="post-entry">
                                <p> {{ $item->description }} </p>
                            </div>
                    </div>
                    
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="sidebar-right wgs-box">
                        <div class="wgs-search">
                            <div class="wgs-content">
                                <div class="form-group">
                                    <h3> Search Employees </h3>
                                    
                                        <select class="form-control" id="sel1">
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
                                              <button type="button" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="gaps size-1x"></div>
                        </div>
                        <!-- Each Widget -->
                        <div class="wgs-post">
                            <div class="wgs-content">
                                    <div class="form-group">
                                            <h3> Search Jobs  </h3>
                                            
                                                <select class="form-control" id="sel1">
                                                        <option value=""> - select -</option>
                                                    
                                                        <option value="Accounting/Finance">Accounting/Finance</option>
                                                        <option value='-1'>&#8211;Select Job category&#8211;</option>
                                                        <option class="level-0" value="2">Accounting/Finance</option>
                                                        <option class="level-0" value="14">Garments/Textile</option>
                                                        <option class="level-0" value="16">Hospitality/ Travel/ Tourism</option>
                                                        <option class="level-0" value="17">HR/Org. Development</option>
                                                            
                                                      </select>
                                                      <button type="button" class="btn btn-primary">Search</button>
                                        </div>
                            </div>
                            <div class="gaps size-2x"></div>
                        </div>
                        <!-- End Widget -->
                        
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <!-- End Section -->
    
@endsection