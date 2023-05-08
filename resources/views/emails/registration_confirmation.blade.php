<!DOCTYPE html>
<html>

<head>
    <title>Registration Confirmation</title>
</head>

<body>
    <h1>Registration Confirmation</h1>
    <p>Dear {{ $name }},</p>
    <p>Your account has beed successfully registered. Here are your registration details:</p>
    <ul>
        <li>Email: {{ $email }}</li>
        <li>Name: {{ $name }}</li>
        <li>Mobile: {{ $mobile }}</li>
    </ul>
    <p>We look forward to seeing you on our platform.</p>
</body>

</html>