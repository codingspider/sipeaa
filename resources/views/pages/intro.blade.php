@extends('master')

@section('content')

@php

$events = DB::table('events')->get();
    
@endphp
                
			<!-- Banner/Slider -->
			<div id="header" class="banner header-slider">
                <div class="single-slide light row-vm" style="background-image:url(  {{ asset('images/slider-bg.png')}} )">
                        <div class="container">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="animate-bottom delayms5">Dummy Text  <br /><span class="ucap">YOU CAN TRUST</span></h1>
                                        <p class="lead animate-bottom delayms7">Sed ut persp iciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam, eaque ipsa quae ab illo inven tore veri.</p>
                                        <ul class="btns animate-bottom delayms9">
                                            <li><a href="#" class="btn">View more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide light row-vm" style="background-image:url({{ asset('images/Banner-1.png')}})">
                        <div class="container">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 text-center">
                                            <h1 class="animate-bottom delayms5">Dummy Text  <br /><span class="ucap">YOU CAN TRUST</span></h1>
                                        <p class="lead animate-bottom delayms7">Sed ut persp iciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam, eaque ipsa quae ab illo inven tore veri.</p>
                                        <ul class="btns animate-bottom delayms9">
                                            <li><a href="#" class="btn">View more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner/Slider -->
            </header>
            <!-- End Header -->
             
      
               <!--Section -->
               <div class="section section-pad bg-grey">
                   <div class="container">
                       <div class="row row-vm">
                           <div class="col-md-6">
                            <div class="panel panel-primary">
                            
                                <div class="panel-heading">
                        
                                    Events On Calender  
                        
                                </div>
                        
                                <div class="panel-body" >
                        
                                    {{-- {!! $calendar->calendar() !!} --}}
    
                        
                                </div>
                        
                            </div>
                           </div>
                           <div class="col-md-6 col-md-offset-1 ">
                                
                                      
                               
                                
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
    
              
               <!--Section -->
               <div class="section section-pad has-bg light dark-filter">
                   <div class="imagebg has-parallax">
                    <img src="images/calc-bg.jpg" alt="calc-bg">
                </div>
                   <div class="container">
                       <div class="row row-vm">
                           <div class="col-md-5">
                            <div class="text-block">
                                <h2>Currency Calculator</h2>
                                <p>Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint.</p>
                            </div>
                           </div>
                           <div class="col-md-6 col-md-offset-1">
                               <div class="bitcoin-calculator">
                                   <script>
                                    baseUrl = "https://widgets.cryptocompare.com/";
                                    var scripts = document.getElementsByTagName("script");
                                    var embedder = scripts[ scripts.length - 1 ];
                                    (function (){
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if(appName==""){appName="local";}
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var theUrl = baseUrl+'serve/v1/coin/converter?fsym=BTC&tsyms=USD,EUR,CNY,GBP';
                                    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                    })();
                                </script>
                               </div>
                               <a href="#" class="btn">Buy now</a>
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
               
               <!--Section -->
               <div class="section section-pad">
                   <div class="container">
                       <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <h2 class="heading-section">Why choose Us</h2>
                                <p>Sed ut perspi ciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam</p>
                            </div>
                        </div>
                       </div>
                       <div class="gaps size-3x"></div>
                    <div class="row text-center row-vm">
                        <div class="col-md-4 res-m-bttm-lg">
                            <div class="box-alt">
                                <span class="pe pe-7s-server"></span>
                                <h4>Payment Options</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-note"></span>
                                <h4>Legal Compliance</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-airplay"></span>
                                <h4>Cross-Platform Trading</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                        <div class="col-md-4 res-m-bttm-lg">
                            <div class="box-alt">
                                <span class="pe pe-7s-lock"></span>
                                <h4>Strong Security</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt img">
                                <img src="images/square-md-a.png" alt="square">
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-cash"></span>
                                <h4>Competitive Commissions</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-alt">
                                <span class="pe pe-7s-global"></span>
                                <h4>World Coverage</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-graph"></span>
                                <h4>Advanced Reporting</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                            <div class="box-alt">
                                <span class="pe pe-7s-graph1"></span>
                                <h4>Margin Trading</h4>
                                <p>Morbi eget varius risus, ut venenatis libero Pellentesque in porta dui.</p>
                            </div>
                        </div>
                    </div>
                   </div>
               </div>
               <!--End Section -->
               
               <!--Section -->
               <div class="section section-pad bg-grey">
                   <div class="container">
                       <div class="row row-vm">
                           <div class="col-md-6">
                            <div class="trendingview-chart res-m-bttm">
                                <!-- TradingView Widget BEGIN -->
                                <script src="https://s3.tradingview.com/tv.js"></script>
                                <script>
                                new TradingView.widget({
                                    "autosize":true,
                                    "symbol": "NASDAQ:AAPL",
                                    "interval": "60",
                                    "timezone": "Etc/UTC",
                                    "theme": "Light",
                                    "style": "1",
                                    "locale": "en",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "allow_symbol_change": true,
                                    "hideideas": true
                                });
                                </script>
                                <!-- TradingView Widget END -->
                            </div>
                           </div>
                           <div class="col-md-5 col-md-offset-1 ">
                            <div class="text-block">
                                <h2>No Experience? <br/>No worries</h2>
                                <p>Looking to get started in the world of cryptocurrency trading sit amet tristique?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et lorem nec felis finibus laoreet. Nullam id dictum urna. Vestibulum in aliquam tellus, sit amet tristique ipsum. </p>
                                <a href="#" class="btn btn-alt">get started</a>
                            </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
    
               <!--Section -->
               <div class="section section-pad">
                   <div class="container">
                       <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <h2 class="heading-section">What investors say</h2>
                                <p>Sed ut perspi ciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam</p>
                            </div>
                        </div>
                       </div>
                       <div class="gaps size-3x"></div>
                       <div class="row text-center">
                           <div class="col-md-6 col-md-offset-3">
                               <div class="testimonial-carousel has-carousel" data-items="1" data-loop="true" data-dots="true" data-auto="true">
                                   <div class="testimonial-item">
                                       <div class="client-photo circle">
                                           <img src="images/client-a.jpg" alt="client">
                                           <em class="fa fa-quote-right"></em>
                                       </div>
                                       <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</blockquote>
                                       <div class="client-info">
                                           <h6>John Doe</h6>
                                           <span>CEO, Company Name</span>
                                       </div>
                                   </div>
                                   <div class="testimonial-item">
                                       <div class="client-photo circle">
                                           <img src="images/client-a.jpg" alt="client">
                                           <em class="fa fa-quote-right"></em>
                                       </div>
                                       <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</blockquote>
                                       <div class="client-info">
                                           <h6>John Doe</h6>
                                           <span>CEO, Company Name</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
               
               <!-- Section -->
            <div class="section section-pad-sm cta-small light">
                <div class="cta-block">
                    <div class="container">
                        <div class="row mobile-center">
                            <div class="col-md-12">
                                <div class="cta-sameline">
                                    <h3>Open account for free and start trading Bitcoins now!</h3>
                                    <a class="btn btn-outline btn-alt btn-md" href="#">get started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section -->
              
              <!--Section -->
               <div class="section section-pad">
                   <div class="container">
                       <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <h2 class="heading-section">our latest news</h2>
                                <p>Sed ut perspi ciatis unde omnis iste natus error sit volup tatem accusa ntium dolor emque lauda ntium, totam rem aperiam</p>
                            </div>
                        </div>
                       </div>
                       <div class="gaps size-3x"></div>
                       <div class="row text-center">
                           <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 res-m-bttm-lg">
                               <div class="blog-post shadow round">
                                   <div class="post-thumb"><a href="blog-single.html"><img src="images/post-thumb-a.jpg" alt="post"></a></div>
                                   <div class="post-entry">
                                       <div class="post-meta"><span>Posted 03 Dec, 2017</span></div>
                                       <h5><a href="blog-single.html">Working Hard to Keep Pace with very heigh Demand</a></h5>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore.</p>
                                       <a href="blog-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 res-m-bttm-lg">
                               <div class="blog-post shadow round">
                                   <div class="post-thumb"><a href="blog-single.html"><img src="images/post-thumb-b.jpg" alt="post"></a></div>
                                   <div class="post-entry">
                                       <div class="post-meta"><span>Posted 03 Dec, 2017</span></div>
                                       <h5><a href="blog-single.html">Black Friday: Bitcoins the biggest deal on from today</a></h5>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore.</p>
                                       <a href="blog-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 res-m-bttm-lg">
                               <div class="blog-post shadow round">
                                   <div class="post-thumb"><a href="blog-single.html"><img src="images/post-thumb-c.jpg" alt="post"></a></div>
                                   <div class="post-entry">
                                       <div class="post-meta"><span>Posted 03 Dec, 2017</span></div>
                                       <h5><a href="blog-single.html">Introducing our new payment services...</a></h5>
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore.</p>
                                       <a href="blog-single.html" class="btn-icon"><span class="pe pe-7s-angle-right"></span></a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!--End Section -->
              
               <!-- Section -->
            <div class="section section-pad-md bg-grey">
                <div class="container">
                    <div class="content row">
                        <div class="owl-carousel has-carousel no-dots"  data-items="6" data-loop="true" data-dots="false" data-auto="false">
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo1.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo2.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo3.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo4.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo5.png"></div>
                            <div class="logo-item"><img alt="" width="190" height="82" src="images/cl-logo6.png"></div>
                        </div>
    
                    </div>
                </div>	
            </div>
            <!-- End Section -->
@endsection