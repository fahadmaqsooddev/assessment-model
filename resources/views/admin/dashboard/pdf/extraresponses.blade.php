<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }}</title>
</head>
<body>
	<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5 p-2">
            <div class="card-header">
              <h3 class="card-title mt-2">Extra Responses Detail</h3>
              <h5>Print Date : {{ $date }}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if($responses)
                @foreach($responses as $key=>$r)
                  <div class="row">
                    <div class="col-md-12">
                       <h4>Question : {{ $key+1}} {{ $r->question->question }}</h4>
                       <p><u>Selected Answer</u> : {{ $r->answer }}</p>
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
</body>
</html>