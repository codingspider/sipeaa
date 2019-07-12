<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')

@section('content')
<br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@php

        $unread_messages = DB::table('messages')
          ->join('users', 'users.id', '=', 'messages.sender_id')
          ->select('messages.*','users.name as uname', 'users.id as uid' )
          ->where('sent_to_id', CRUDBooster::myId())
          
         ->orderBy('id', 'desc')
          ->get();
        
     
@endphp
<div class="container">
    <div class="col-md-10">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Sender </th>
                <th scope="col">Subject </th>
                <th scope="col">Action </th>
                <th scope="col">Reply</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($unread_messages as $item)
                
              @if($item->notify_status == 0)
              <tr style="color:blue;">
              <th>{{ $item->id }}</th>
              
              <th >{{ $item->uname }}</th>

              <th>{{ $item->uname }}</th>
              
              <th>{{ $item->subject }}</th>
              <th> <button class="btn btn-primary" OnClick="DoAction({{ $item->id }});" >View Message </button> </th>
              <th> <button class="btn btn-success" OnClick="SendAction({{ $item->sender_id }});" >Reply Message </button> </th>
               
              </tr>
              @else 
              <tr >
                  <th>{{ $item->id }}</th>
                  
                  <th >{{ $item->uname }}</th>
    
                  <th>{{ $item->uname }}</th>
                  
                  <th>{{ $item->subject }}</th>
                  <th> <button class="btn btn-primary" OnClick="DoAction({{ $item->id }});" >View Message </button> </th>
                  <th> <button class="btn btn-success" OnClick="SendAction({{ $item->sender_id }});" >Reply Message </button> </th>
                   
                  </tr>
              @endif 

              @endforeach

            </tbody>
          </table>
    </div>

</div>
<script>
function DoAction(id)
{
    $.ajax({
         type: "get",
         url: "/view_message",
         data: "id=" + id,
         success: function(data){
            if(data){
                     $('#myModal').modal('show');
                     $('#subject').text(data.subject);
                     $('#body').text(data.body);
                     $('#created_at').text(data.created_at);
                  }
         }
    });
}

function SendAction(id)
{
  $('#message').modal('show');
  $('#sender_id').val(id);
}
</script>
<!-- view message modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Creted At</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id="subject"></td>
                    <td id="body"></td>
                    <td id="created_at"></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>

<!-- send message modal -->
  <div id="message" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
              <form action="{{ URL::to('/amin/reply/sent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                      <div class="col-md-6">
                      
                          <div class="form-group">
                              <label for="email">
                                 Subject </label>
                              <div class="input-group">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                  </span>
                                  <input style="border:1px solid #818182" name="subject" type="text" class="form-control" id="subject" placeholder="Enter subject" required="required" /></div>
                                  <br>
                                  <label for="attachment">Add A File</label>
                                   <input type="file" name="attachment">
                                </div>

                        
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="message">
                                  Message</label>
                              <textarea style="border:1px solid #818182" name="message" id="message" class="form-control" rows="9" cols="50" required="required"
                                  placeholder="Message"></textarea>
                          </div>
                      </div>
                      <input type="hidden" name="sender_id" id="sender_id">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                              Send Message</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                  
              </form>

          </div>
        
        </div>
    
      </div>
    </div>
@endsection