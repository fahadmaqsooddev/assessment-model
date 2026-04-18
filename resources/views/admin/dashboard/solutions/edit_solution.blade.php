@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Solution</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Solution</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Solution</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('storesolution')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Solution Name</label>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="text" name="solution_name" class="form-control" placeholder="Enter Solution Name" value="{{ @old('solution_name',$data->solution_name)  }}">
                @error('solution_name')
                <span class="text-danger">{{ $message}}</span>
                @enderror<br>
                <label>Intitial Cost</label>
                <input type="number" name="initial_cost" class="form-control" placeholder="Initial Cost" value="{{ @old('initial_cost',$data->initial_cost)  }}">
                @error('initial_cost')
                <span class="text-danger">{{ $message}}</span>
                @enderror<br>
                <label>Final Cost</label>
                <input type="number" name="final_cost" class="form-control" placeholder="Final Cost" value="{{ $data->final_cost }}">
                @error('final_cost')
                <span class="text-danger">{{ $message}}</span>
                @enderror
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!--/.col (left) -->
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".range").on("click",function(){
      var t=$(this).val();
      if(t=="text"){
        $(".section").hide();
      }else{
        $(".section").show();
      }
    });
  });
</script>
@endsection
