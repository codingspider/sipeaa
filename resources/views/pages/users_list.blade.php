<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<head>
        <title>User Data </title> 
            <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
            <div class="col-md-12">
               <table class="table table-bordered col-md-10" id="table">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                     </tr>
                  </thead>
               </table>
            </div>
          <script>
            $(function() {
                  $('#table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ url('index') }}',
                  columns: [
                           { data: 'id', name: 'id' },
                           { data: 'name', name: 'name' },
                           { data: 'email', name: 'email' }
                          
                        ]
                        
               });
            });

           
            </script>
      </body>

@endsection