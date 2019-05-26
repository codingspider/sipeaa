@extends('layouts.app')
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
                     
                   

                     
                 </div>
             </div>
            </div>
        </div>
    </div>

@endsection