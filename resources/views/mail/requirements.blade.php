<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Section Template</title>
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
    </style>
</head>
<body>

<section class="hero">
    <h1>Seaman Loan Express</h1>
    <img src="{{ asset('images/logo.png') }}" alt="Logo">
</section>

<section class="content">
    <p>Dear <strong>{{ $borrower->personalInformation->lastname }}, {{ $borrower->personalInformation->firstname }}</strong>,</p>
    <p>Thank you for submitting your loan application to [Your Company Name]. We appreciate your interest in our services.</p>
    <p>We understand that tracking the progress of your application is important to you. Therefore, we are pleased to provide you with a unique Reference ID: <strong>{{ $borrower->uuid }}</strong>. This Reference ID will serve as your identifier throughout the application process.</p>

    <p>Rest assured that our team is diligently reviewing your application. We strive to provide you with a decision as promptly as possible.</p>
    <p>If you have any questions or concerns before the interview, please don't hesitate to reach out to us via our official Facebook page: Seaman Loan Express. We're here to assist you every step of the way.
    </p>
    <p>Thank you for choosing Seaman Loan Express for your financial needs. We look forward to potentially assisting you with your loan application.</p>
    <p>Best regards,</p>
    <p>Seaman Loan Express</p>
       
</section>

</body>
</html>
