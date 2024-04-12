<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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

        .submit-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <section class="hero">
        <h1>Welcome to Seaman Loan Express!</h1>
        <img src="{{ asset('.././../../public/images/logo.png') }}" alt="Logo">
    </section>
    <section class="content">
        <p>Hello {{ $admin->name }},</p>
        <p>Thank you for signing up with Seaman Loan Express. To complete your registration and gain full access to our platform, please verify your email address by clicking the button below:</p>
        <a href="{{ $verificationUrl }}" class="submit-button">Verify Email Address</a>
        <p>If you did not sign up for an account with us, please ignore this email or contact our support team at [Support Email Address].</p>

        @if (!empty($tempPassword))
            <p>Here are your credentials:</p>
            <p style="font-weight:600">Email: {{ $admin->email }}</p>
            <p style="font-weight:600">Password: {{ $tempPassword }}</p>
        @endif

        <p>Thank you for choosing Seaman Loan Express.</p>
        <p>Best regards,<br>Seaman Loan Express</p>
    </section>
</body>

</html>
