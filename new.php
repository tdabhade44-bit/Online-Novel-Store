
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment Integration</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Razorpay Payment Integration</h1>
    <form action="pay.php" method="POST">
        <input type="hidden" name="amount" value="1000"> <!-- Amount in paisa -->
        <input type="submit" value="Pay Now">
    </form>
</body>
</html>
