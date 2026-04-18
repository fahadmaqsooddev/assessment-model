<?php 
  use App\Models\Logo;
  $logo=Logo::first();
?>
<!-- Header -->
<header class="header py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <img src="{{ asset('../admin/dist/img/'.$logo->name) }}" alt="Logo" class="header-logo">
        <div class="settings-dropdown">
            <button class="btn btn-primary" type="button">
                Settings
            </button>
            <div class="settings-menu">
                <a href="{{ url('/userprofile') }}">Profile</a>
                <a href="{{ url('/userresponses') }}">Responses</a>
                <a href="{{ url('/extraquestions') }}">Extra Questions</a>
                <a href="{{ url('/userlogout')}}">Logout</a>
            </div>
        </div>
    </div>
</header>