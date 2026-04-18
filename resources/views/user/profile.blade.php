@extends('user.layouts.app')
@section('title', 'Responses')
@section('content')
<main class="container my-5 content-area" style="border:1px solid blue">
    <h3>Profile</h3>
    <form action="{{ url('/userprofile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @if(Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            @endif
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $data->email }}" disabled>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Password </label>
                    <input type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Profile Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </div>
    </form>
</main>
@endsection
