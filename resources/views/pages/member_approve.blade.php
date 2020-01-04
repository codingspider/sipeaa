
@extends('crudbooster::admin_template')
@section('content')

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
    <?php
    $users = DB::table('users')->orderBy('id', 'desc')->where('user_type', 'member')->paginate(10);

    ?>
        <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
         </div>

    <table id="table_id" class="table">

    <p class="alert-success">
        <?php
            
        $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        }
            
            ?></p>
            <div id="res_message"></div>
        <thead>
            <tr>
                <th>Name </th>
                <th>Email</th>
                <th>User Type</th>         
                <th>Registration Number</th> 
                <th>Sipeaa ID </th>    
                <th></th>        
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                
                @foreach ($users as $item)

                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td> 
                <td>{{$item->user_type}}</td> 

                <form action="javascript:void(0)" id="myForm">
                <td><input type="text" id="reg_no" name="reg_no" value="{{ $item->reg_no}}"> </td> 
                <td><input type="text" id="sipeaa_id" name="sipeaa_id" value="{{ $item->sipeaa_id}}"> </td> 
                <input type="hidden" name="id" value="{{ $item->id }}">
                <td><button class="btn btn-primary" id="ajaxSubmit">Submit</button></td> 
                </form>

                @csrf
                @if($item->approve == 1)
                <td><a href="#" class="btn btn-success">Activate</a></td>
                @else
                <td><a href="#" class="btn btn btn-danger">Unactive</a></td>
                
                @endif

                @if($item->approve == 1)
                <td><form action="{{ URL::to('/unactive_user')}}" method="POST">
                    @csrf

                <input type="hidden" name="email" value="{{$item->email}}"> 
                <input type="hidden" name="user_id" value="{{$item->id}}"> 
                <input type="hidden" name="name" value="{{$item->name}}"> 
                <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-up"></i></button>

                </form></td>
                    @else
                <td><form action="{{ URL::to('/active_user')}}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{$item->email}}"> 
                    <input type="hidden" name="user_id" value="{{$item->id}}"> 
                    <input type="hidden" name="name" value="{{$item->name}}"> 
                <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-down"></i></button>
                </form> </td>
                    @endif
                <td><a class="btn btn-info" href="{{ URL::to('/member/profile/details', $item->id)}}"> <i class="fa fa-user"></i></td>

                <td>   
                <form action="{{ URL::to('/user/delete', $item->id)}}" method="post">
                      @csrf
                      
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>     
            </tr>
                    
                @endforeach

        </tbody>
    </table>
</div>

<script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/user/update') }}",
                  method: 'post',
                  data: {
                     reg_no: jQuery('#reg_no').val(),
                     sipeaa_id: jQuery('#sipeaa_id').val(),
                  },
                  success: function(result){
                     console.log(result);
                  }});
               });
            });
</script>
@endsection