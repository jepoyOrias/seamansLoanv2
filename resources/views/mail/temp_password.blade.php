<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .hero {
            background-color: #f0f0f0;
            text-align: center;
            padding: 100px 0;
        }
        .hero h1 {
            color: #333;
            font-size: 36px;
        }
        .hero img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
        .content {
            padding: 50px 20px;
        }
        /* Responsive styling */
        @media screen and (max-width: 768px) {
            .hero h1 {
                font-size: 24px;
            }
            .hero img {
                width: 80px;
                height: 80px;
            }
        }
        .change-password-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<section class="hero">
    <h1>Welcome to Our Platform!</h1>
    <img src="{{ asset('path-to-your-logo.png') }}" alt="Logo">
</section>

<section class="content">
    <p>Dear <strong>{{ $user->name }}</strong>,</p>
    <p>Welcome to our platform! Here are your login credentials:</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please use these credentials to log in to your account. After logging in, we recommend changing your password to something more secure.</p>
    <p>If you have any questions or need assistance, feel free to contact us.</p>
    <a href="{{ route('home') }}" class="change-password-btn">Change Password</a>
    <p>Thank you,</p>
    <p>The Management Team</p>
</section>

</body>
</html>
