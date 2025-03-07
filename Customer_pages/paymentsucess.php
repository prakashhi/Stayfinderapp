<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #E0F7FA, #B2EBF2);
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .confirmation {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #00695C;
            font-size: 32px;
            margin: 0 0 20px 0;
        }
        .checkmark {
            color: #26A69A;
            font-size: 60px;
            margin-bottom: 20px;
        }
        .next-btn {
            background-color: #EF5350;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .next-btn:hover {
            background-color: #D81B60;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <div class="checkmark">✔</div>
        <h1>Booking is Successful!</h1>
        <a href="../index.php" class="next-btn">Next</a>
    </div>
</body>
</html>