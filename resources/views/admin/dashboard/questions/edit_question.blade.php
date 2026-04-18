@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Question</li>
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
                <h3 class="card-title">Edit Question</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('updatequestion')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $questiondata->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryname">Select Category</label>
                    <select class="form-control" name="category_id">
                      <option value="" selected disabled>Select One Option</option>
                      @if($categories)
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}"
                            @if(old('category_id', $questiondata->category_id) == $category->id)
                              selected
                            @endif
                            >{{ $category->name }}</option>
                          @endforeach
                      @endif
                    </select>
                    @error('category_id')
                      <span class="text-danger">{{ $message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label>Question</label>
                      <input type="text" name="question" class="form-control" placeholder="Enter Question" value="{{ @old('question',$questiondata->question) }}">
                      @error('question')
                        <span class="text-danger">{{ $message}}</span>
                      @enderror
                  </div>
                  <div class="row mt-3 mb-3">
                    <div class="col-sm-6">
                      <h3>Choices</h3>
                    </div>
                    <div class="col-sm-6">
                      <button type="button" class="btn btn-primary float-right" onclick="addchoices()">Add Choices</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      @php
                        $initialIndex = $choicesdata ? $choicesdata->count() : 0;
                      @endphp
                      @if($choicesdata)
                        @foreach($choicesdata as $key=>$choice)
                          <div class="col-sm-6">
                              <label>Choice</label>
                              <input type="hidden" name="answer_id[]" value="{{ $choice->id }}">
                              <input type="text" name="choices[]" class="form-control" placeholder="Choice" value="{{ $choice->choice_text }}">
                              @error('choices.'.$key+1)
                                <span class="text-danger">{{ $message }}</span>
                              @enderror<br>
                              <label class="mt-3">Recommendation</label>
                              <textarea class="form-control" name="recommendations[]" rows="8" cols="10">{{ $choice->recommendations }}</textarea>
                              @error('recommendations.'.$key+1)
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        @endforeach
                      @endif
                    </div>
                    <div class="row" id="add">
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
function addchoices(){
  var i = @json($initialIndex);;
  var html=`
    <div class="col-sm-6" id="box_${i}">
      <label>Choice</label>
      <input type="text" name="choices2[]" class="form-control" placeholder="Choice">
      @error('choice2.*')
        <span class="text-danger">{{ $message }}</span>
      @enderror<br>
      <label class="mt-3">Recommendation</label>
      <textarea class="form-control" name="recommendations2[]" rows="8" cols="10"></textarea>
      @error('recommendations2.*')
            <span class="text-danger">{{ $message }}</span>
          @enderror
      <button type="button" class="btn btn-primary mt-3" onclick="removefield(${i})">Remove</button>
    </div>
  `;
  var element=document.getElementById("add");
  element.insertAdjacentHTML('beforeend', html);
  i++;
}
function removefield(index){
  if(index){
    var field=document.getElementById("box_"+index);
    field.remove();  
  }
} 
</script>

@endsection
