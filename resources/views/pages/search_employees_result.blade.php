@extends('layouts.app2')
@section('title', 'All Employess by job category')
@section('content')


<div class="section section-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 res-m-bttm">
                 <div class="row text-center">
                        @foreach ($values as $item)
                     <div class="col-sm-6">
                         <div class="blog-post shadow round">
                         <div class="post-thumb"><a href="{{ URL::to('/job/details/page', $item->id) }}"><img src="{{ URL::asset('/images/user-png-icon-male-user-icon-512.png') }}" height="100" width="100px" alt="post"></a></div>
                             <div class="post-entry">
                                 <div class="post-meta"><span>{{ $item->contact_person }}</span></div>
                                 <h5><a href="{{ URL::to('/job/details/page', $item->id) }}">{{ $item->company_name  }}</a></h5>
                                 <a href="{{ URL::to('/job/details/page', $item->id) }}" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                             </div>
                         </div>
                         <div class="gaps size-3x"></div>
                     </div>
                     @endforeach
                 </div>
                 
             </div>
             <div class="col-md-3 col-md-offset-1">
                 

                     
                 </div>
             </div>
            </div>
        </div>
    </div>

@endsection