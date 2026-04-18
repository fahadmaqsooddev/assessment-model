<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Page</title>
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
        <h2>User Signin</h2>
        @if(Session::has('msg'))
            <div class="alert alert-danger">{{ Session::get('msg') }}</div>
        @endif
        <form action="{{ url('/userlogin') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{ @old('email') }}">
                @error('email')
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
            <button type="submit" class="btn btn-primary btn-sm">Sign In</button>

            <div class="text-center">
                <p>Don't have an account? <a href="{{ url('/') }}">SignUp</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
