@extends('layouts.app2')

@section('title', 'Contact Us')

@section('content')

<section id="contact">
        @if(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
      <div class="well well-sm">
        <h3><strong>Contact Us</strong></h3>
      </div>
      
      <div class="row">
        <div class="col-md-7">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
  
        <div class="col-md-5">

        <form action="{{ URL::to('send/contact/mail')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" value="" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" value="" placeholder="E-mail">
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="phone" value="" placeholder="Phone">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
            </div>
            <button class="btn btn-success" type="submit" name="button">
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

<style>
/*Font-awesome integration*/
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
/*Google font integration*/
@import url('https://fonts.googleapis.com/css?family=Roboto');

#contact{
    background-color:#f1f1f1;
    font-family: 'Roboto', sans-serif;
}

#contact .well{
    margin-top:30px;
    border-radius:0;
}

#contact .form-control{
    border-radius: 0;
    border:2px solid #1e1e1e;
}

#contact button{
    border-radius:0;
    border:2px solid #1e1e1e;
}

#contact .row{
    margin-bottom:30px;
}

@media (max-width: 768px) { 
    #contact iframe {
        margin-bottom: 15px;
    }
    
}

</style>
@endsection