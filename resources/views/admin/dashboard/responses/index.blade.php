@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Responses</h3>
            </div>
            @if(Session::has('msg'))
              <div class="alert alert-success mt-3">{{ Session::get('msg') }}</div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($responses)
                      @foreach($responses as $key => $response)
                        <tr>
                           <td>{{ $responses->currentPage() * $responses->perPage() - $responses->perPage() + $key + 1 }}</td>
                          <td>{{ $response->user->name }}</td> 
                          <td><a href="{{ url('responsedetail/'.$response->unique_token)}}" class="btn btn-primary">View</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $responses->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
                </div>


              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>

@endsection
