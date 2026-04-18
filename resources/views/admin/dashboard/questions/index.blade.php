@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Questions</h3>
              <div class="row">
                <div class="col-md-9 col-sm-8 col-4"></div>
                <div class="col-md-3 col-sm-4 col-8 text-end">
                  <a href="{{ route('add-question') }}" class="btn btn-primary text-right">Add Question</a>
                </div>
              </div>
            </div>
            @if(Session::has('msg'))
              <div class="alert alert-success mt-3 p-3">{{ Session::get('msg') }}</div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Question Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($questions)
                      @foreach($questions as $key => $question)
                        <tr>
                           <td>{{ $questions->currentPage() * $questions->perPage() - $questions->perPage() + $key + 1 }}</td>
                          <td>{{ $question->question }}</td>
                          <td><a href="{{ route('edit-question',$question->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                          <td><a href="{{ route('delete-question',$question->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $questions->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
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
