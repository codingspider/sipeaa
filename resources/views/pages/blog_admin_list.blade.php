<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
@php
    $admin = DB::table('users')->where('approve', 1)->get();
@endphp
<div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h3 class="text-center">Blog Admin</h3>
</div>
<div class="container">
    <div class="col-md-10">
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID </th>
                        <th scope="col">Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Status </th>
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($admin as $item)
        
                      <tr>
                      <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if($item->admin == 0)
                            <p style="color: blue">Deactivated</p>
                            @else
                            <p style="color: green">Activated</p>
                            @endif
                        </td>
                      <td><button type="submit" onclick="window.location.href = '{{ URL::to('/blog/admin/delete/'. $item->id)}}'" class="btn btn-danger">Cancel</button></td>
                      <td><button type="submit" onclick="window.location.href = '{{ URL::to('/blog/admin/active/'. $item->id)}}'" class="btn btn-success">Active</button></td>
                      </tr>
                    @endforeach
               
                    </tbody>
                  </table>
    </div>

</div>

<div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create New Admin 
              </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Blog Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body col-md-8">
            <form method="POST" action="{{ URL::to('/create/blog/admin') }}">
                @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Name </label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                       
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Password </label>
                              <input type="password" name="password" class="form-control"  >
                            </div>
                            <input type="hidden" name="approve" value="1">
                            <input type="hidden" name="admin" value="1">
            </div>
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>

          </div>
        </div>
      </div>
@endsection