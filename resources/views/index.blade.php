<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        .signup-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            backdrop-filter: blur(10px);
        }

        .signup-container .inner-container{
           margin-top:50px;
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .signup-container .form-control {
            background-color: rgba(255, 255, 255, 0.15);
            border: none;
            border-radius: 10px;
            padding: 15px;
            color: #fff;
        }

        .signup-container .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .signup-container .btn-primary {
            background-color: #ff7e5f;
            border: none;
            width: 100%;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .signup-container .btn-primary:hover {
            background-color: #feb47b;
        }

        .signup-container .text-center a {
            color: #ff7e5f;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-container .text-center a:hover {
            color: #feb47b;
        }

        .btn-google, .btn-facebook {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="inner-container">
            <h2>Create Account</h2>
        @if(Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{ @old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="name" value="{{ @old('username') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="{{ @old('password') }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Confirm your password" value="{{ @old('password_confirmation') }}">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Sign Up</button>
            
            <!-- Social Sign Up Buttons -->
            <!-- <div class="d-flex justify-content-between mt-3">
                <a href="{{ url('auth/google') }}" class="btn btn-google btn-primary m-1" target="_blank">
                    <i class="fab fa-google"></i> Google
                </a>
                <a href="#" class="btn btn-facebook btn-primary m-1">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </div> -->

            <div class="text-center">
                <p>Already have an account? <a href="{{ url('userlogin') }}">Log in</a></p>
            </div>
        </form>
        </div>
        
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
