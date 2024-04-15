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
    <p>Thank you for providing the necessary documents for your loan application. Our team is currently verifying the information provided to ensure a smooth processing of your application.</p>
    <p><strong>You can also use this reference number to check your application status:</strong> {{ $borrower->uuid }}</p>
    <p>We'll keep you updated on the progress. If any additional information is required, we'll reach out promptly.</p>
    <p>Thank you for choosing Seaman Loan Express.</p>
    <p>Best regards,</p>
    <p>Seaman Loan Express</p>
       
</section>

</body>
</html>
