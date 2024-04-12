<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application Interview Invitation</title>
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
    <p>We are pleased to inform you that your loan application has been successfully reviewed, and we would like to invite you for an interview to discuss further details.</p>
    <p>The interview will take place at our office on [Interview Date] at [Interview Time]. Please make sure to bring all the necessary documents mentioned in your application.</p>
    <p>If you have any questions or concerns before the interview, feel free to contact us at [Your Contact Information].</p>
    <p>Thank you for choosing Seaman Loan Express.</p>
    <p>Best regards,</p>
    <p>Ian Fhabi Lofranco</p>
    <p>Loan Specialist</p>
    <p>Seaman Loan Express</p>
</section>

</body>
</html>
