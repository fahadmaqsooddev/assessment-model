@extends('admin.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row mt-3">
           <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ url('categories') }}">Categories</a></h3>
                        <h3><?php echo $categorycount ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ url('questions') }}">Questions</a></h3>
                        <h3><?php echo $questioncount ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card main_card" style="box-shadow: 0px 0px 20px 0px lightgray;border: none;">
                    <div class="card-body text-center">
                        <h3><a href="{{ url('extra-questions') }}">Extra Questions</a></h3>
                        <h3><?php echo $extraquestioncount ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
