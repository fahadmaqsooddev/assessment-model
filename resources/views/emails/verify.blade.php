<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
    <style>
        /* Add some basic styling to make the email look better */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ $name }}!</h1>
        <p>Thank you for registering with us. Please verify your email address by clicking the button below:</p>
        
        <a href="{{ $verificationUrl }}" class="button"><span style="color:white">Verify Email Address</span></a>
        
        <p>If you did not create an account, no further action is required.</p>
        <p>Best Regards,<br/>The Team</p>
    </div>
</body>
</html>
