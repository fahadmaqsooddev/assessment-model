@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add Dimension</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Dimension</li>
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
            <h3 class="card-title">Add Dimension</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('storedimension')}}" method="POST">
            @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="categoryname">Select Category</label>
                <select class="form-control" name="category_id">
                  <option value="" selected disabled>Select One Option</option>
                  @if($categories)
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                        {{ $category->name }}
                      </option>
                    @endforeach
                  @endif
                </select>

                @error('category_id')
                <span class="text-danger">{{ $message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Initial Range</label>
                    <input type="text" name="initial_range" class="form-control" placeholder="Enter Initial Range" value="{{ @old('initial_range') }}">
                    @error('initial_range')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <label>Final Range</label>
                    <input type="text" name="final_range" class="form-control" placeholder="Enter Final Range" value="{{ @old('final_range') }}">
                    @error('final_range')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row mt-3 mb-3">
                  <div class="col-sm-6"> 
                    <label>Color :</label>
                    <select class="form-control" name="color">
                      <option value="" selected disabled>Select One Color</option>
                      <option value="Red">Red</option>
                      <option value="Yellow">Yellow</option>
                      <option value="LightGreen">LightGreen</option>
                      <option value="Green">Green</option>
                    </select>
                    @error('color')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <label>Risk Type:</label>
                    <input type="text" name="risk_type" class="form-control" placeholder="Enter Risk Type" value="{{ @old('risk_type') }}">
                     @error('risk_type')
                      <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="8" cols="10" value="@old('description')"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div>
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
<script>

</script>

@endsection
