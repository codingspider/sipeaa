@extends("layouts.app2")
@section('title', 'Blog Page')
@section("content")
<div class='col-sm-6 blogetc_container'>
        @if(\Auth::check() && \Auth::user()->canManageBlogEtcPosts())
            <div class="text-center">
                    <p class='mb-1'>You are logged in as a blog admin user.
                        <br>

                        <a href='{{route("blogetc.admin.index")}}'
                           class='btn border  btn-outline-primary btn-sm '>

                            <i class="fa fa-cogs" aria-hidden="true"></i>

                            Go To Blog Admin Panel</a>


                    </p>
            </div>
        @endif
</div>
<div class="section section-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 res-m-bttm">
                

                <div class="post post-single">
                        @if(isset($blogetc_category) && $blogetc_category)
                        <h2 class='text-center'>Viewing Category: {{$blogetc_category->category_name}}</h2>
        
                        @if($blogetc_category->category_description)
                            <p class='text-center'>{{$blogetc_category->category_description}}</p>
                        @endif
        
                    @endif
        
        
                    @forelse($posts as $post)
                        @include("blogetc::partials.index_loop")
                    @empty
                        <div class='alert alert-danger'>No posts</div>
                    @endforelse
        
                    <div class='text-center  col-sm-4 mx-auto'>
                        {{$posts->appends( [] )->links()}}
                    </div>
        
        
        
        
                </div>
                
            </div>
            <div class="col-md-3 col-md-offset-1">
                <div class="sidebar-right wgs-box">
                    <div class="wgs-search">
                        <div class="wgs-content">
                            <div class="form-group">
                                    @include("blogetc::sitewide.search_form")
                            </div>
                        </div>
                        <div class="gaps size-1x"></div>
                    </div>
                    <!-- Each Widget -->
                    
                </div>
            </div>
        </div>
    </div>	
</div>
@endsection