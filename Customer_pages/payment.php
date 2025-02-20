<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/payment.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Payment</title>
</head>

<body>

    <div class="form-container">
        <h2>Payment</h2>
        <form id="payment-form">

            <?php echo "<span style='display:none;'>Room_id : <b id='r_id' >" . $_GET['id'] . "</b></span><br>" ?>
            <?php echo "<span style='display:none;'>Hotel_id : <b id='h_id'>" . $_GET['hid'] . "</b></span>" ?>
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="amount">Family Member</label>
                <input type="number" id="Member" name="amount" value="1" required>
            </div>

            <div class="form-group">
                <label for="amount">Check-in Date</label>
                <input type="Date" id="check-in" name="check-in" required>
            </div>
            <div class="form-group">
                <label for="amount">Check-out Date</label>
                <input type="Date" id="check-out" name="check-out" onchange="funchange();" required>
            </div>

            <div class="form-group" id="card-element">
                <!-- Stripe's Card Element will be inserted here -->
            </div>

            <div>
                <?php echo "Price : <b id='price'>" . $_GET['price'] . "</b>₹"; ?>
                <?php echo "<h3 id='day'></h3>"; ?>
            </div>


            <input type="submit" value="Pay Now">




            <div id="error-message" style="color:red;"></div>
        </form>
    </div>





    <script>
        function funchange() {

            let out = document.getElementById("check-out").value;
            let in1 = document.getElementById("check-in").value;


            let diffrence = new Date(out).getTime() - new Date(in1).getTime();
            let diff_day = diffrence / (1000 * 3600 * 24);

            document.getElementById("day").innerHTML = diff_day + " Day";

            let p = parseInt(document.getElementById("price").innerHTML);

            let total = p * diff_day;
            if (total <= 0) {
                window.location.href = "../index.php";
            } else {
                document.getElementById("price").innerHTML = total;
            }

        }





        var stripe = Stripe('pk_test_51QmtyvE3buiaQKWqUDUQ7t0X4fSZcATX7vwuUG3IKE5aOKTyBcaqeQUGUufz3YtfnTyYatzgi8DhOPS63OCSTQos00mblviQLp'); // Replace with your Stripe Publishable Key
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const submitButton = document.querySelector('input[type="submit"]');
            submitButton.value = "Processing...";
            submitButton.disabled = true; // Disable the button while processing

            const {
                token,
                error
            } = await stripe.createToken(card);
            if (error) {
                document.getElementById('error-message').textContent = error.message;
                submitButton.value = "Pay Now";
                submitButton.disabled = false;
            } else {
                // Collect the form data
                var fullName = document.getElementById('full-name').value;
                var email = document.getElementById('email').value;
                var check_in = document.getElementById('check-in').value;
                var check_out = document.getElementById('check-out').value;
                var Member = document.getElementById('Member').value;
                var p1 = parseInt(document.getElementById("price").innerHTML);
                var r_id = document.getElementById("r_id").innerHTML;
                var h_id = document.getElementById("h_id").innerHTML;


                fetch('charge.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            token: token.id,
                            fullName: fullName,
                            email: email,
                            Member: Member,
                            check_in: check_in,
                            check_out: check_out,
                            p1: p1,
                            r_id: r_id,
                            h_id: h_id
                        })
                    })
                    .then(window.location.href = "../index.php") // Convert response to JSON
                   
            }
        });
    </script>

</body>

</html>