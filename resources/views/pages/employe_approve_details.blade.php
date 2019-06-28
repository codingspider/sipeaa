<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<div class="container">
 

	<div class="col-md-12">
        <div class="bio-info col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bio-image">
                            <img src="{{ asset('/files/'.$users->images )}}" alt="image" />
                            </div>			
                        </div>
                    </div>	
                </div>
                <div class="col-md-6">
                    <div class="bio-content">
                    <h1>Name: {{ $users->name}}</h1>
                    <h6>Contact Person: {{ $users->contact_person}}</h6>
                    <h6>Contact Person Designation: {{ $users->contact_person_designation}}</h6><h6>Phone : {{ $users->contact_person_mobile}}</h6>
                    <p> Email: {{ $users->contact_person_email}}</p>
                    </div>
                </div>
            </div>	
        </div>

    </div>
</div>

<style>

.portfolio {
  padding:6%;
  text-align:center;
}


.bio-info {
  padding:5%;
  background:#fff;
  box-shadow:0px 0px 4px 0px #b0b3b7;
}

.name {
  font-family:'Charmonman', cursive;
  font-weight:600;
}

.bio-image {
  text-align:center;
}

.bio-image img {
  width:350px;
  height:350px;
  border-radius:50%;
}

.bio-content {
  text-align:left;
}

.bio-content p {
  font-weight:600;
  font-size:30px;
}


</style>

@endsection