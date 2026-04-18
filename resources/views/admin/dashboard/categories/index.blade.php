@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Categories</h3>
              <div class="row">
                  <div class="col-md-9 col-sm-8 col-4"></div>
                  <div class="col-md-3 col-sm-4 col-8 text-end">
                      <a href="{{ route('add-category') }}" class="btn btn-primary">Add Category</a>
                  </div>
              </div>

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
                      <th>Category Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($categories)
                      @foreach($categories as $key => $category)
                        <tr>
                           <td>{{ $categories->currentPage() * $categories->perPage() - $categories->perPage() + $key + 1 }}</td>
                          <td>{{ $category->name }}</td>
                          <td><a href="{{ route('edit-category',$category->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                          <td><a href="{{ route('delete-category',$category->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $categories->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
