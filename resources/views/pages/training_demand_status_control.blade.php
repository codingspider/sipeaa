<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<br>
@if(session()->has('success'))
    <div style="color: #000" class="alert alert-info">
        {{ session()->get('success') }}
    </div>
@endif


@if(session()->has('danger'))
    <div style="color:burlywood" class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<br>

<section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Traingin Supply Status</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Trainging Demand Status</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Training Counter</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <br>
                            <div class="col-md-10">
                                        <table class="table">
                                                <thead class="thead-dark">
                                                  <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Demanded by</th>
                                                    <th scope="col">Training Need</th>
                                                    <th scope="col">Demand Date</th>
                                                    <th scope="col">Training Status</th>
                                                    <th scope="col">Change Status</th>
                                                    <th scope="col">Training Assigned</th>
                                                    <th scope="col">Action </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($data as $item)
                                                        <tr>
                                                        <th scope="row">{{ $item->id }}</th>
                                                          <td>demo</td>
                                                          <td>{{ $item->traing_need }}</td>
                                                          <td>{{ $item->demand_date }}</td>
                                                          <td>{{ $item->training_status }}</td>
                                                        <td><form action="{{ URL::to('change/status/update/') }}" method="POST">
                                                      @csrf
                                                      <select style="color:black" onchange="this.form.submit()" name="status" id="status">
                                                              <option value="0">Select---</option>
                                                          <option value="pending">Pending</option>    
                                                          <option value="approved">Approved</option>    
                                                          </select>
                                                          <input type="hidden" name="id" value="{{ $item->id }}">
                                                      </form>
                                                        </td>
                                                        <th><select style="color:#000" name="assign_trainner" id="">
                                                        <option value="">Select--</option>    
                                                        </select></th>
                                                        
                                                        <td><button class="btn btn-danger" type="submit" onclick="window.location = '{{ URL::to('training/demand/delete/'.$item->id ) }}'">Delete</button></td>
                                                </tr>
                                                        @endforeach
                                                </tbody>
                                              </table>
                            
                                </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>   
                            <div class="col-md-11">
                                        <table class="table">
                                                <thead class="thead-dark">
                                                  <tr>
                                                    <th class="col-md-1" scope="col">ID</th>
                                                    <th class="col-md-2" scope="col">Demanded by</th>
                                                    <th class="col-md-2" scope="col">Training Need</th>
                                                    <th class="col-md-4" scope="col">Demand Description</th>
                                                    <th class="col-md-2" scope="col">Demand Date</th>
                                             
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($data as $item)
                                                        <tr>
                                                        <th scope="row">{{ $item->id }}</th>
                                                          <td>demo</td>
                                                          <td>{{ $item->traing_need }}</td>
                                                          <td>{{ $item->description }}</td>
                                                          <td>{{ $item->demand_date }}</td>
                                                        
                                                        
                                                </tr>
                                                        @endforeach
                                                </tbody>
                                              </table>
                            
                                </div>
                            <br>

                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>

                        </div>
                       
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- ./Tabs -->

    <style>
    
    /* Tabs*/


section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 10px;
    text-transform: uppercase;
}
#tabs{
	background: blue;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
    margin: 20px;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: greenyellow;
    font-size: 20px;
    margin: 20px;

}
    </style>
@endsection