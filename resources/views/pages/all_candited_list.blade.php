@extends('layouts.app2')

@section('title', 'Application List')

@section('content')
<div class="container">
    <div class="col-md-10">
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Applicant Email</th>
                        <th scope="col">Job Title </th>
                        <th scope="col">Expected Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            
                      <tr>
                      <th scope="row">{{ $item->id }}</th>
                      <th scope="row">{{ $item->email }}</th>
                      <th scope="row">{{ $item->title }}</th>
                      <th scope="row">{{ $item->exp_salary }}</th>
                      
                      </tr>
                      @endforeach
                  
                    </tbody>
                  </table>

    </div>
</div>
@endsection