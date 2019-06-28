<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<br>
@if(session()->has('success'))
    <div style="color: #000" class="alert alert-info">
        {{ session()->get('success') }}
    </div>
@endif


@if(session()->has('danger'))
    <div style="color:burlywood" class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<br>
<div class="container">
    <div class="col-md-12">
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">File ID</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                      <tr>
                      <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->status }}</td>
                      <td><form action="{{ URL::to('library/update/status') }}" method="POST">
                    @csrf
                    <select onchange="this.form.submit()" name="status" id="status">
                            <option value="0">Select---</option>
                        <option value="pending">Pending</option>    
                        <option value="approve">Approved</option>    
                        </select>
                        <input type="hidden" name="id" value="{{ $item->id }}">
                    </form>
                </td>
        <td>
                <button type="submit" onclick="window.location = '{{ URL::to('/delete/library/'.$item->id )}}'" class="btn btn-danger">Delete</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

    </div>
      

</div>
@endsection