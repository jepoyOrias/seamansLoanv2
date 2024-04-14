<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application For Approval</title>
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
    <h1>Welcome to Our Website</h1>
    <img src="your-logo.png" alt="Logo">
</section>

<section class="content">
    <p>Dear <strong>{{ $borrower->personalInformation->lastname }}, {{ $borrower->personalInformation->firstname }}</strong>,</p>
    <p>Congratulations! Your loan application has been received and is now pending approval. Your financial goals are just a step away!</p>
    <p>Our team is working diligently to review your application. We'll notify you as soon as your loan is approved.</p>
    <p>Thank you for choosing Seaman Loan Express.</p>
    <p>Best regards,</p>
    <p>Seaman Loan Express</p>
</section>

</body>
</html>
