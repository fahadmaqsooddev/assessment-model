@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Users</h3>
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
                      <th>Image</th>
                      <th>User Name</th>
                      <th>User Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($users)
                      @foreach($users as $key => $user)
                        <tr>
                           <td>{{ $users->currentPage() * $users->perPage() - $users->perPage() + $key + 1 }}</td>
                           <td>
                             <img src="{{ $user->image ? asset('user/img/'.$user->image) : 'https://picsum.photos/50/50?random=' . rand() }}" class="rounded-circle img-fluid" style="max-width: 50px; max-height: 50px;">
                           </td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $users->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
