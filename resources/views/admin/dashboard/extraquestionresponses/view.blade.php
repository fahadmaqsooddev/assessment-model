@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Extra Responses Detail</h3>
              <div class="row">
                <div class="col-sm-8">
                  
                </div>
                <div class="col-sm-4">
                  <a href="{{ url('extradownloadpdf/'.$token) }}" class="btn btn-primary">Download PDF</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if($responses)
                @foreach($responses as $key=>$r)
                  <div class="row">
                    <div class="col-md-12">
                       <h5>Question : {{ $key+1}} {{ $r->question->question }}</h5>
                       <h6>Selected Answer : {{ $r->answer }}</h6>
                    </div>
                  </div>
                @endforeach
              @endif
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
