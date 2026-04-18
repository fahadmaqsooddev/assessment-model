@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Extra Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Extra Question</li>
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
                <h3 class="card-title">Edit Extra Question</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('updateextraquestion')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label>Question</label>
                      <input type="text" name="question" class="form-control" placeholder="Enter Question" value="{{ old('question', $extraquestion->question) }}">
                      @error('question')
                        <span class="text-danger">{{ $message}}</span>
                      @enderror<br>
                      <label class="mt-3">Feedback</label>
                      <textarea class="form-control" name="feedback" rows="8" cols="10">
                        {!! $extraquestion->feedback !!}
                      </textarea>
                        @error('feedback')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{ $extraquestion->id }}">
                    <label class="mt-3">Choose Type of Question</label>
                    @if($extraquestion->question_type == 'text')
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input range" name="question_type" value="text" checked>Text
                        </label>
                        @error('question_type')
                              <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     @else
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input range" name="question_type" value="range" checked>Range
                        </label>
                      </div>
                      <div class="row mt-3 section">
                          <div class="col-sm-6">
                              <label>Min Range</label>
                              <input type="text" name="min_range" class="form-control" placeholder="Enter Min Range" value="{{ @old('min_range',$extraquestion->min_range)  }}">
                              @error('min_range')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="col-sm-6">
                              <label>Max Range</label>
                              <input type="text" name="max_range" class="form-control" placeholder="Enter Max Range" value="{{ old('max_range', $extraquestion->max_range) }}">
                              @error('max_range')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                      </div>    
                      @endif
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
