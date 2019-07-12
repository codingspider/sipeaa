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
         //->where('notify_status', 0)
         ->orderBy('id', 'desc')
          ->get();
@endphp

<script>
    $(document).ready(function(){
      @foreach($unread_messages as $msg)
      $("#msg{{$msg->id}}").click(function(){
        var mId = $("#mId{{$msg->id}}").val();
        $.ajax({
          type:'get',
          data:'msgId=' + mId,
          url:'{{url('/update/inbox/')}}',
          success:function(response){
            console.log(response);
          }
        });
      });
      @endforeach
    });
    </script>
    

        <div class="container">
            <div class="col-md-12 inboxRow">
                <div class="prod"><h2 align="left">Inbox</h2></div>
                <hr>
            </div>
            <table class="table">
          
                 
              
                <tbody>
                    @foreach($unread_messages as $msg)
                    <input type="hidden" value="{{$msg->id}}" id="mId{{$msg->id}}">
                    <a href="#" data-toggle="collapse"
                    data-target="#d{{$msg->id}}">
   
                    @if($msg->notify_status=="0")
                     <div class="col-md-12 inboxRow" style="color:#2FEB15;" id="msg{{$msg->id}}">
                     @else
                     <div class="col-md-12 inboxRow">
                        @endif
   
                         <div class="col-md-2">
                             <input type="checkbox">
                         </div>
     
                         <div class="col-md-2">
                             <p>{{$msg->uid}}</p>
                         </div>
     
                         <div class="col-md-2">
                             <p>{{$msg->subject}}</p>
                         </div>
     
                         <div class="col-md-2">
                             <p>{{$msg->updated_at }}</p>
                         </div>
                        
                         
     
                       </div>
                   </a>
                     <div class="collapse col-md-8" id="d{{$msg->id}}">
   
                         <div class="inner_msg">
                           <p class="text-center" style="color:brown;">{{$msg->body}}<p>
                           <p class="text-center" style="color:brown;">
                               <button class="btn btn-info btn-block">
                           <a href="#" data-toggle="modal" data-target="#edit-auction-modal" type="button" class="btn btn-sm btn-primary btn-warning" data-item-id="{{$msg->uid }}">Reply</a>
                            </button><p>
                              
                          </div>
                          
   
                     </div>
                     <!-- Modal -->
<div class="modal fade" id="edit-auction-modal" tabindex="-1" role="dialog" aria-labelledby="edit-auction-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit-auction-modal">New Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ URL::to('admin/reply/sent/' )}}" method="POST" id="userForm" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">

                      @foreach($unread_messages as $msg)
                    @endforeach
                    <input type="text" name="users_id[]" value="{{ $msg->sender_id}}">

                    </div>
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
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                        Send Message</button>
                </div>
            </div>
            </form>
        </div>

      </div>
    </div>
  </div>

                    @endforeach
                </tbody>
              </table>
      </div>


@endsection