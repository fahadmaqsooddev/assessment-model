<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", "sans-serif";
}
html {
  font-size: 62.5%;
}
body {
  background-image: url('https://img.freepik.com/free-vector/young-woman-wearing-coat-hat-scarf-riding-bicycle-park-fall-foliage-from-wind-is-blowing-autumn-season-cartoon-character-vector-illustration_1150-52716.jpg?t=st=1722097189~exp=1722100789~hmac=b90c8a9ab48e8b7c25b03af18dfb962c070767af0a1cc5d9dcf6145d4364b9cb&w=740') ;
  background-position: center;
  background-size: cover;
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color:grey;
}
.login-form {
  background-color: rgba(255, 255, 255, 0.25);
  backdrop-filter: blur(15px);
  border: 1px solid #fff;
  border-bottom: 1px solid rgba(255, 255, 255, 0.25);
  border-right: 1px solid rgba(255, 255, 255, 0.25);
  border-radius: 20px;
  box-shadow: 0 25px 50px rgba(255, 255, 255, 0.1);
  padding: 4rem;
  width: 40rem;
}
.login-form h2 {
  color: #8f2c24;
  font-size: 3.8rem;
  font-weight: 600;
  margin-bottom: 2.5rem;
  text-align: center;
}
.input-box input {
  background-color: #fff;
  border: none;
  border-radius: 5px;
  color: #8f2c24;
  font-size: 1.6rem;
  margin-bottom: 1.5rem;
  padding: 1.5rem 2rem;
  outline: none;
  width: 100%;
}
.login-form .input-box ::placeholder {
  color: #8f2c24;
}
.input-box .login-btn {
  background:#8f2c24;
  color: #fff;
  cursor: pointer;
  font-weight: 500;
  letter-spacing: 1px;
}
.input-box .login-btn:hover {
  background: #b7544c;
}
/* Media Queries  */
@media (width <= 475px) {
    html {
      font-size: 56.25%;
    }
    .input-box input {
        font-size: 1.8rem;
    }
}
@media (width <= 380px) {
    html {
      font-size: 50%;
    }
    .input-box input {
        font-size: 2rem;
    }
}
@media (width <= 360px) {
    html {
      font-size: 43.75%;
    }
    .input-box input {
        font-size: 2rem;
    }
}
	</style>
</head>
<body>
	 <form action="{{ url('login') }}" method="POST" class="login-form">
    @csrf
     <h2>Admin Login</h2>
     <div class="input-box">
       <input type="email" name="email" placeholder="Email" value="{{ @old('email')}}">
       @error('email')
        <span style="color:red;font-size:18px;margin-bottom:5px;">{{ $message }}</span>
       @enderror
     </div>
     <div class="input-box">
       <input type="password" name="password" placeholder="Password" value="{{ @old('password')}}">
       @error('password')
        <span style="color:red;font-size:18px;margin-bottom:5px;">{{ $message }}</span>
       @enderror
     </div>
       @if(Session::has('msg'))
        <span style="color:red;font-size:18px;margin-bottom:5px;">{{ Session::get('msg') }}</span>
       @endif
     <div class="input-box">
       <input type="submit" value="Login" class="login-btn">
     </div>
 </form>
</body>
</html>