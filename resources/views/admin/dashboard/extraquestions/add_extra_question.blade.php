@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Extra Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Extra Question</li>
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
                <h3 class="card-title">Add Extra Question</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('storeextraquestion')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label>Question</label>
                      <input type="text" name="question" class="form-control" placeholder="Enter Question" value="{{ @old('question') }}">
                      @error('question')
                        <span class="text-danger">{{ $message}}</span>
                      @enderror<br>
                      <label class="mt-3">Feedback</label>
                      <textarea class="form-control" name="feedback" rows="8" cols="10">{{ @old('feedback') }}</textarea>
                        @error('feedback')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <label class="mt-3">Choose Type of Question</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input range" name="question_type" value="text" {{ old('question_type') == 'text' ? 'checked' : '' }}>Text
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input range" name="question_type" value="range" {{ old('question_type') == 'range' ? 'checked' : '' }}>Range
                        </label>
                    </div>
                    @error('question_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  <div class="row mt-3 section" style="display:none;">
                    <div class="col-sm-6">
                        <label>Min Range</label>
                        <input type="number" name="min_range" class="form-control" placeholder="Enter Min Range" value="{{ @old('min_range') }}">
                        @error('min_range')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label>Max Range</label>
                        <input type="number" name="max_range" class="form-control" placeholder="Enter Max Range" value="{{ @old('max_range') }}">
                        @error('max_range')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var section = document.querySelector('.section');
        var questionType = "{{ old('question_type', 'text') }}";
        
        if (questionType === 'range') {
            section.style.display = 'flex';
        }

        document.querySelectorAll('input[name="question_type"]').forEach(function(input) {
            input.addEventListener('change', function() {
                if (this.value === 'range') {
                    section.style.display = 'flex';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
